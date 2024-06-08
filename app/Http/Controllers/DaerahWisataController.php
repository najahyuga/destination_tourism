<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaerahWisata;
use Illuminate\Support\Facades\Log;
use Exception;

class DaerahWisataController extends Controller
{
    public function index()
    {
        try {
            $daerahWisata = DaerahWisata::all();
            return view('admin.daerahWisata.index', compact('daerahWisata'));
        } catch (Exception $e) {
            Log::error('Error fetching daerah wisata data: ' . $e->getMessage());
            return redirect()->route('daerahWisata.index')->with('error', 'Terjadi kesalahan saat mengambil data.');
        }
    }

    public function create()
    {
        return view('admin.daerahWisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_dw' => 'required|string|max:255',
        ]);

        try {
            DaerahWisata::create($request->all());
            Log::info('Daerah wisata created successfully: ' . $request->input('name_dw'));
            return redirect()->route('daerahWisata.index')->with('success', 'Data daerah wisata berhasil ditambahkan.');
        } catch (Exception $e) {
            Log::error('Error creating daerah wisata: ' . $e->getMessage());
            return redirect()->route('daerahWisata.create')->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    public function show(string $id)
    {
        try {
            $daerahWisata = DaerahWisata::findOrFail($id);
            return view('admin.daerahWisata.show', compact('daerahWisata'));
        } catch (Exception $e) {
            Log::error('Error displaying daerah wisata data: ' . $e->getMessage());
            return redirect()->route('daerahWisata.index')->with('error', 'Terjadi kesalahan saat menampilkan data.');
        }
    }

    public function edit(string $id)
    {
        try {
            $daerahWisata = DaerahWisata::findOrFail($id);
            return view('admin.daerahWisata.edit', compact('daerahWisata'));
        } catch (Exception $e) {
            Log::error('Error loading daerah wisata data for editing: ' . $e->getMessage());
            return redirect()->route('daerahWisata.index')->with('error', 'Terjadi kesalahan saat memuat data untuk diedit.');
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_dw' => 'required|string|max:255',
        ]);

        try {
            $daerahWisata = DaerahWisata::findOrFail($id);
            $daerahWisata->update($request->all());
            Log::info('Daerah wisata updated successfully: ' . $request->input('name_dw'));
            return redirect()->route('daerahWisata.index')->with('success', 'Data daerah wisata berhasil diperbarui.');
        } catch (Exception $e) {
            Log::error('Error updating daerah wisata: ' . $e->getMessage());
            return redirect()->route('daerahWisata.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    // Method destroy
    public function destroy(string $id)
    {
        try {
            $daerahWisata = DaerahWisata::findOrFail($id);
            $daerahWisata->delete();
            Log::info('Daerah wisata deleted successfully: ' . $daerahWisata->name_dw);
            return redirect()->route('daerahWisata.index')->with('success', 'Data daerah wisata berhasil dihapus.');
        } catch (Exception $e) {
            Log::error('Error deleting daerah wisata: ' . $e->getMessage());
            return redirect()->route('daerahWisata.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
