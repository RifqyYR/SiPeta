<?php

namespace App\Http\Controllers;

use App\Models\Onion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class OnionController extends Controller
{
    public function index()
    {
        $onions = Onion::all();
        return view('pages.plant.onion-index', [
            'onions' => $onions
        ]);
    }

    public function create()
    {
        return view('pages.plant.onion-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'height' => 'required',
            'file' => 'required',
        ]);

        try {
            $filename = hash('sha256', time() . '-' . $request->file->getClientOriginalName()) . '.jpg';

            $request->file('file')->storeAs('public/onion', $filename);

            DB::transaction(function () use ($request, $filename) {
                Onion::create([
                    'uuid' => Uuid::uuid4(),
                    'height' => $request->height,
                    'filename' => $filename,
                    'date_input' => now()->toDateString(),
                    'time_input' => now()->format('H:i:s')
                ]);
            });

            return redirect()->route('plant.onion.index')->with('success', 'Berhasil menambahkan data pertumbuhan');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal menambahkan data pertumbuhan bawang: ' . $e->getMessage());
        }
    }

    public function edit(string $uuid)
    {
        try {
            $onion = Onion::where('uuid', $uuid)->first();

            return view('pages.plant.onion-edit', [
                'onion' => $onion
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
            $onion = Onion::where('uuid', $request->uuid)->first();
            
            if ($request->file != null) {
                DB::transaction(function () use ($onion, $request) {
                    if (Storage::exists('/public/onion/' . $onion->filename)) {
                        Storage::delete('/public/onion/' . $onion->filename);
                    }

                    $filename = hash('sha256', $request->file->getClientOriginalName()) . '.jpg';
                    $request->file('file')->storeAs('public/onion', $filename);
        
                    Db::transaction(function () use ($onion, $request, $filename) {
                        $onion->update([
                            'height' => $request->height,
                            'filename' => $filename,
                        ]);
                    });
                });
                return redirect()->route('plant.onion.index')->with('success', 'Berhasil mengubah data');
            } 

            DB::transaction(function () use ($onion, $request) {
                $onion->update([
                    'height' => $request->height,
                ]);
            });

            return redirect()->route('plant.onion.index')->with('success', 'Berhasil mengubah data');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal mengedit dokumen: ' . $e->getMessage());
        }
    }

    public function destroy(string $uuid)
    {
        try {
            $onion = Onion::where('uuid', $uuid)->first();
            
            DB::transaction(function () use ($onion) {
                if (Storage::exists('/public/onion/' . $onion->filename)) {
                    Storage::delete('/public/onion/' . $onion->filename);
                }
                
                $onion->delete();
            });

            return redirect()->route('plant.onion.index')->with('success', 'Berhasil menghapus data');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
