<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Menampilkan semua galeri.
     */
    public function index()
    {
        $galeris = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeris'));
    }

    /**
     * Menyimpan banyak foto sekaligus.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'images' => [
                'required',
                'array',
                'min:1',
                'max:20',
            ],

            'images.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'category' => [
                'nullable',
                'string',
                'max:100',
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ]);

        foreach ($request->file('images') as $image) {

            $path = $image->store('galeri', 'public');

            Galeri::create([
                'title' => $validated['title'] ?? null,
                'image' => $path,
                'category' => $validated['category'] ?? null,
                'description' => $validated['description'] ?? null,
            ]);
        }

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                count($request->file('images')) .
                ' foto berhasil ditambahkan ke galeri.'
            );
    }

    /**
     * Menghapus foto.
     */
    public function destroy(Galeri $galeri)
    {
        if ($galeri->image) {
            Storage::disk('public')->delete($galeri->image);
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Foto berhasil dihapus.');
    }
}