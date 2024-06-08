<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KategoriWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $kategoriWisata = Kategori::all();
            return view('admin.kategori.index', compact('kategoriWisata'));
        } catch (Exception $e) {
            Log::error('Error fetching kategori wisata data: ' . $e->getMessage());
            return redirect()->route('kategoriWisata.index')->with('error', 'Terjadi kesalahan saat mengambil data.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Kategori::create($request->all());
            return redirect()->route('kategoriWisata.index')->with('success', 'Kategori wisata berhasil ditambahkan.');
        } catch (Exception $e) {
            Log::error('Error creating kategori wisata: ' . $e->getMessage());
            return redirect()->route('kategoriWisata.create')->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $kategoriWisata = Kategori::findOrFail($id);
            return view('admin.kategori.show', compact('kategoriWisata'));
        } catch (Exception $e) {
            Log::error('Error displaying kategori wisata data: ' . $e->getMessage());
            return redirect()->route('kategoriWisata.index')->with('error', 'Terjadi kesalahan saat menampilkan data.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $kategoriWisata = Kategori::findOrFail($id);
            return view('admin.kategori.edit', compact('kategoriWisata'));
        } catch (Exception $e) {
            Log::error('Error loading kategori wisata data for editing: ' . $e->getMessage());
            return redirect()->route('kategoriWisata.index')->with('error', 'Terjadi kesalahan saat memuat data untuk diedit.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $kategoriWisata = Kategori::findOrFail($id);
            $kategoriWisata->update($request->all());
            return redirect()->route('kategoriWisata.index')->with('success', 'Kategori wisata berhasil diperbarui.');
        } catch (Exception $e) {
            Log::error('Error updating kategori wisata: ' . $e->getMessage());
            return redirect()->route('kategoriWisata.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kategoriWisata = Kategori::findOrFail($id);
            $kategoriWisata->delete();
            return redirect()->route('kategoriWisata.index')->with('success', 'Kategori wisata berhasil dihapus.');
        } catch (Exception $e) {
            Log::error('Error deleting kategori wisata: ' . $e->getMessage());
            return redirect()->route('kategoriWisata.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
