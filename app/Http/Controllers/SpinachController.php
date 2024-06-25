<?php

namespace App\Http\Controllers;

use App\Models\Spinach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class SpinachController extends Controller
{
    public function index()
    {
        $spinaches = Spinach::all();
        return view('pages.plant.spinach-index', [
            'spinaches' => $spinaches,
        ]);
    }

    public function create()
    {
        return view('pages.plant.spinach-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'height' => 'required',
            'temperature' => 'required',
            'ph' => 'required',
            'file' => 'required',
        ]);

        try {
            $filename = hash('sha256', time() . '-' . $request->file->getClientOriginalName()) . '.jpg';

            $request->file('file')->storeAs('public/spinach', $filename);

            DB::transaction(function () use ($request, $filename) {
                Spinach::create([
                    'uuid' => Uuid::uuid4(),
                    'height' => $request->height,
                    'temperature' => $request->temperature,
                    'ph' => $request->ph,
                    'filename' => $filename,
                    'date_input' => now()->toDateString(),
                    'time_input' => now()->format('H:i:s')
                ]);
            });

            return redirect()->route('plant.spinach.index')->with('success', 'Berhasil menambahkan data pertumbuhan');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal menambahkan data pertumbuhan bayam: ' . $e->getMessage());
        }
    }

    public function edit(string $uuid)
    {
        try {
            $spinach = Spinach::where('uuid', $uuid)->first();

            return view('pages.plant.spinach-edit', [
                'spinach' => $spinach
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal mendapatkan data: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $spinach = Spinach::where('uuid', $request->uuid)->first();
            
            if ($request->file != null) {
                DB::transaction(function () use ($spinach, $request) {
                    if (Storage::exists('/public/spinach/' . $spinach->filename)) {
                        Storage::delete('/public/spinach/' . $spinach->filename);
                    }

                    $filename = hash('sha256', $request->file->getClientOriginalName()) . '.jpg';
                    $request->file('file')->storeAs('public/spinach', $filename);
        
                    Db::transaction(function () use ($spinach, $request, $filename) {
                        $spinach->update([
                            'height' => $request->height,
                            'temperature' => $request->temperature,
                            'ph' => $request->ph,
                            'filename' => $filename,
                        ]);
                    });
                });
                return redirect()->route('plant.spinach.index')->with('success', 'Berhasil mengubah data');
            } 

            DB::transaction(function () use ($spinach, $request) {
                $spinach->update([
                    'height' => $request->height,
                    'temperature' => $request->temperature,
                    'ph' => $request->ph,
                ]);
            });

            return redirect()->route('plant.spinach.index')->with('success', 'Berhasil mengubah data');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal mengedit dokumen: ' . $e->getMessage());
        }
    }

    public function destroy(string $uuid)
    {
        try {
            $spinach = Spinach::where('uuid', $uuid)->first();
            
            DB::transaction(function () use ($spinach) {
                if (Storage::exists('/public/spinach/' . $spinach->filename)) {
                    Storage::delete('/public/spinach/' . $spinach->filename);
                }
                
                $spinach->delete();
            });

            return redirect()->route('plant.spinach.index')->with('success', 'Berhasil menghapus data');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
