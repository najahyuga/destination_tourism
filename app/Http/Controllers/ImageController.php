<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\TempatWisata;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $images = Image::all();
            return view('admin.multipleImage.index', compact('images'));
        } catch (Exception $e) {
            Log::error('Error fetching images data: ' . $e->getMessage());
            return redirect()->route('imageWisata.index')->with('error', 'Terjadi kesalahan saat mengambil data.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $tempatWisata = TempatWisata::all();
            return view('admin.multipleImage.create', compact('tempatWisata'));
        } catch (Exception $e) {
            Log::error('Error fetching tempat wisata data: ' . $e->getMessage());
            return redirect()->route('imageWisata.create')->with('error', 'Terjadi kesalahan saat mengambil data tempat wisata.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'             => 'required|image|max:10240', // max 10MB
            'image_satu'        => 'nullable|image|max:10240',
            'image_dua'         => 'nullable|image|max:10240',
            'tempat_wisata_id'  => 'nullable|exists:tempat_wisata,id',
        ]);

        try {
            $imagePath      = null;
            $imageSatuPath  = null;
            $imageDuaPath   = null;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $imagePath = $file->storeAs('public/images', $fileName);
            }

            if ($request->hasFile('image_satu')) {
                $file = $request->file('image_satu');
                $fileName = $file->getClientOriginalName();
                $imageSatuPath = $file->storeAs('public/images', $fileName);
            }

            if ($request->hasFile('image_dua')) {
                $file = $request->file('image_dua');
                $fileName = $file->getClientOriginalName();
                $imageDuaPath = $file->storeAs('public/images', $fileName);
            }

            Image::create([
                'image'             => basename($imagePath),
                'image_satu'        => $imageSatuPath ? basename($imageSatuPath) : null,
                'image_dua'         => $imageDuaPath ? basename($imageDuaPath) : null,
                'tempat_wisata_id'  => $request->tempat_wisata_id,
            ]);

            return redirect()->route('imageWisata.index')->with('success', 'Gambar berhasil ditambahkan.');
        } catch (Exception $e) {
            Log::error('Error creating image: ' . $e->getMessage());
            return redirect()->route('imageWisata.create')->with('error', 'Terjadi kesalahan saat menambahkan gambar.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $image = Image::findOrFail($id);
            return view('admin.multipleImage.show', compact('image'));
        } catch (Exception $e) {
            Log::error('Error fetching image data: ' . $e->getMessage());
            return redirect()->route('imageWisata.index')->with('error', 'Terjadi kesalahan saat mengambil data gambar.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $image = Image::findOrFail($id);
            $tempatWisata = TempatWisata::all();
            return view('admin.multipleImage.edit', compact('image', 'tempatWisata'));
        } catch (Exception $e) {
            Log::error('Error fetching image data: ' . $e->getMessage());
            return redirect()->route('imageWisata.index')->with('error', 'Terjadi kesalahan saat mengambil data gambar.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image'             => 'nullable|image|max:10240', // max 10MB
            'image_satu'        => 'nullable|image|max:10240',
            'image_dua'         => 'nullable|image|max:10240',
            'tempat_wisata_id'  => 'nullable|exists:tempat_wisata,id',
        ]);

        try {
            $image = Image::findOrFail($id);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $imagePath = $file->storeAs('public/images', $fileName);
                $image->image = basename($imagePath);
            }

            if ($request->hasFile('image_satu')) {
                $file = $request->file('image_satu');
                $fileName = $file->getClientOriginalName();
                $imagePathSatu = $file->storeAs('public/images', $fileName);
                $image->image_satu = basename($imagePathSatu);
            }

            if ($request->hasFile('image_dua')) {
                $file = $request->file('image_dua');
                $fileName = $file->getClientOriginalName();
                $imagePathDua = $file->storeAs('public/images', $fileName);
                $image->image_dua = basename($imagePathDua);
            }

            $image->tempat_wisata_id = $request->tempat_wisata_id;
            $image->save();

            return redirect()->route('imageWisata.index')->with('success', 'Gambar berhasil diperbarui.');
        } catch (Exception $e) {
            Log::error('Error updating image: ' . $e->getMessage());
            return redirect()->route('imageWisata.edit', $id)->with('error', 'Terjadi kesalahan saat memperbarui gambar.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $image = Image::findOrFail($id);
            $image->delete();
            return redirect()->route('imageWisata.index')->with('success', 'Gambar berhasil dihapus.');
        } catch (Exception $e) {
            Log::error('Error deleting image: ' . $e->getMessage());
            return redirect()->route('imageWisata.index')->with('error', 'Terjadi kesalahan saat menghapus gambar.');
        }
    }
}
