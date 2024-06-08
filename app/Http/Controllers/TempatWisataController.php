<?php

namespace App\Http\Controllers;

use App\Models\DaerahWisata;
use App\Models\Kategori;
use App\Models\TempatWisata;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TempatWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tempatWisata = TempatWisata::all();
            return view('admin.tempatWisata.index', compact('tempatWisata'));
        } catch (Exception $e) {
            Log::error('Error fetching tempat wisata data: ' . $e->getMessage());
            return redirect()->route('tempatWisata.index')->with('error', 'Terjadi kesalahan saat mengambil data.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $daerahWisata = DaerahWisata::all();
            $kategoriWisata = Kategori::all();
            return view('admin.tempatWisata.create', ['daerahWisata' => $daerahWisata, 'kategoriWisata' => $kategoriWisata]);
        } catch (\Throwable $th) {
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_tw' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image_tw' => 'required|image|max:10240', // max 10MB
            'daerah_wisata_id' => 'required|exists:daerah_wisata,id',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        try {
            // Upload new image
            $file = $request->file('image_tw');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);

            // Prepare data for saving
            $requestData = $request->all();
            $requestData['image_tw'] = $fileName;

            // Save data to database
            TempatWisata::create($requestData);

            return redirect()->route('tempatWisata.index')->with('success', 'Tempat wisata berhasil ditambahkan.');
        } catch (Exception $e) {
            Log::error('Error creating tempat wisata: ' . $e->getMessage());
            return redirect()->route('tempatWisata.create')->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $tempatWisata = TempatWisata::findOrFail($id);
            return view('admin.tempatWisata.show', compact('tempatWisata'));
        } catch (Exception $e) {
            Log::error('Error fetching tempat wisata data: ' . $e->getMessage());
            return redirect()->route('tempatWisata.index')->with('error', 'Terjadi kesalahan saat mengambil data.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $daerahWisata = DaerahWisata::all();
            $kategoriWisata = Kategori::all();
            $tempatWisata = TempatWisata::findOrFail($id);
            return view('admin.tempatWisata.edit', compact('tempatWisata', 'daerahWisata', 'kategoriWisata'));
        } catch (Exception $e) {
            Log::error('Error loading tempat wisata data for editing: ' . $e->getMessage());
            return redirect()->route('tempatWisata.index')->with('error', 'Terjadi kesalahan saat memuat data untuk diedit.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_tw' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image_tw' => 'required|image|max:10240', // max 10MB
            'daerah_wisata_id' => 'required|exists:daerah_wisata,id',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        try {
            $tempatWisata = TempatWisata::findOrFail($id);
            if ($request->hasFile('image_tw')) {

                $imageName = $request->file('image_tw');
                $imageName->getClientOriginalName();
                $imageName->storeAs('public/images', $imageName->getClientOriginalName());

                if ($tempatWisata->image_tw) {
                    Storage::delete('public/images/' . $tempatWisata->image_tw);
                }

                $tempatWisata->image_tw = $imageName;
            }
            $tempatWisata->update($request->all());
            return redirect()->route('tempatWisata.index')->with('success', 'Tempat wisata berhasil diperbarui.');
        } catch (Exception $e) {
            Log::error('Error updating tempat wisata: ' . $e->getMessage());
            return redirect()->route('tempatWisata.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $tempatWisata = TempatWisata::findOrFail($id);
            $tempatWisata->delete();
            return redirect()->route('tempatWisata.index')->with('success', 'Tempat wisata berhasil dihapus.');
        } catch (Exception $e) {
            Log::error('Error deleting tempat wisata: ' . $e->getMessage());
            return redirect()->route('tempatWisata.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
