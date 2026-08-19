<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Menampilkan semua galeri.
     */
    public function index()
    {
        $galeris = Galeri::orderBy('sort_order')
            ->orderBy('id')
            ->get();

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

        $lastOrder = (int) Galeri::max('sort_order');

        foreach ($request->file('images') as $image) {

            $lastOrder++;

            $path = $image->store(
                'galeri',
                'public'
            );

            Galeri::create([
                'title' => $validated['title'] ?? null,
                'image' => $path,
                'category' => $validated['category'] ?? null,
                'description' => $validated['description'] ?? null,
                'sort_order' => $lastOrder,
                'is_cover' => false,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Jika belum ada cover, foto pertama otomatis menjadi cover
        |--------------------------------------------------------------------------
        */

        if (!Galeri::where('is_cover', true)->exists()) {

            $first = Galeri::orderBy('sort_order')
                ->first();

            if ($first) {
                $first->update([
                    'is_cover' => true,
                ]);
            }
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
     * Menyimpan urutan foto.
     */
    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'order' => [
                'required',
                'array',
                'min:1',
            ],

            'order.*' => [
                'integer',
                'exists:galeris,id',
            ],
        ]);

        DB::transaction(function () use ($validated) {

            foreach ($validated['order'] as $position => $id) {

                Galeri::where('id', $id)
                    ->update([
                        'sort_order' => $position + 1,
                    ]);
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Urutan galeri berhasil disimpan.',
        ]);
    }


    /**
     * Menjadikan foto sebagai cover.
     */
    public function setCover(Galeri $galeri)
    {
        DB::transaction(function () use ($galeri) {

            Galeri::where('is_cover', true)
                ->update([
                    'is_cover' => false,
                ]);

            $galeri->update([
                'is_cover' => true,
            ]);
        });

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Foto berhasil dijadikan cover galeri.'
            );
    }


    /**
     * Menghapus foto.
     */
    public function destroy(Galeri $galeri)
    {
        if ($galeri->image) {

            Storage::disk('public')
                ->delete($galeri->image);
        }

        $wasCover = $galeri->is_cover;

        $galeri->delete();

        /*
        |--------------------------------------------------------------------------
        | Kalau cover dihapus, otomatis pilih foto pertama
        |--------------------------------------------------------------------------
        */

        if ($wasCover) {

            $newCover = Galeri::orderBy('sort_order')
                ->first();

            if ($newCover) {

                $newCover->update([
                    'is_cover' => true,
                ]);
            }
        }

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Foto berhasil dihapus.'
            );
    }
}