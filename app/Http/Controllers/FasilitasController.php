<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\TempatWisata;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $fasilitas = Fasilitas::all();
            return view('admin.fasilitas.index', compact('fasilitas'));
        } catch (Exception $e) {
            Log::error('Error fetching data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengambil data.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $tempatWisata = TempatWisata::all();
            return view('admin.fasilitas.create', compact('tempatWisata'));
        } catch (Exception $e) {
            Log::error('Error fetching data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengambil data.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi'         => 'required|string',
            'tempat_wisata_id'  => 'required|exists:tempat_wisata,id',
        ]);

        try {
            Fasilitas::create($request->all());
            return redirect()->route('fasilitasWisata.index')->with('success', 'Fasilitas berhasil ditambahkan.');
        } catch (Exception $e) {
            Log::error('Error creating data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        try {
            $fasilitas = Fasilitas::findOrFail($id);
            return view('admin.fasilitas.show', compact('fasilitas'));
        } catch (Exception $e) {
            Log::error('Error fetching data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengambil data.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        try {
            $tempatWisata = TempatWisata::all();
            $fasilitas = Fasilitas::findOrFail($id);
            return view('admin.fasilitas.edit', compact('fasilitas', 'tempatWisata'));
        } catch (Exception $e) {
            Log::error('Error fetching data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengambil data.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'deskripsi'         => 'required|string',
            'tempat_wisata_id'  => 'required|exists:tempat_wisata,id',
        ]);

        try {
            $fasilitas = Fasilitas::findOrFail($id);
            $fasilitas->update($request->all());
            return redirect()->route('fasilitasWisata.index')->with('success', 'Fasilitas berhasil diperbarui.');
        } catch (Exception $e) {
            Log::error('Error updating data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $fasilitas = Fasilitas::findOrFail($id);
            $fasilitas->delete();
            return redirect()->route('fasilitasWisata.index')->with('success', 'Fasilitas berhasil dihapus.');
        } catch (Exception $e) {
            Log::error('Error deleting data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
