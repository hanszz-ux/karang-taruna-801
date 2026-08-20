<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\LandingSetting;
use App\Models\Program;

class LandingController extends Controller
{
    public function index()
    {
        $setting = LandingSetting::first();

        $programs = Program::where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        $beritas = Berita::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        $agendas = Agenda::where('is_active', true)
            ->whereDate('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->take(3)
            ->get();

        $galeris = Galeri::orderBy('category')
            ->orderByDesc('is_cover')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $galleryGroups = $galeris
            ->groupBy(function ($galeri) {
                return $galeri->category ?: 'Lainnya';
            })
            ->map(function ($items, $category) {
                return [
                    'title' => $category,
                    'count' => $items->count(),
                    'cover' => $items->first(),
                    'photos' => $items->values(),
                ];
            })
            ->values();

        return view('landing.index', [
            'setting' => $setting,
            'programs' => $programs,
            'beritas' => $beritas,
            'agendas' => $agendas,
            'galeris' => $galeris,
            'galleryGroups' => $galleryGroups,
        ]);
    }
}