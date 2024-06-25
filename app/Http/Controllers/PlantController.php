<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PlantController extends Controller
{
    public function spinachIndex()
    {
        return view('pages.plant.spinach-index');
    }

    public function storeSpinach()
    {
        try {
            Plant::create([
                'uuid' => Uuid::uuid4(),
                'plant_type' => 'spinach'
            ]);

            return redirect()->route('plant.spinach.index')->with('success', 'Berhasil menambahkan tanaman bayam baru');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal menambah tanaman bayam: ' . $e->getMessage());
        }
    }
}
