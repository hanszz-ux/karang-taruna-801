<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'berita' => Berita::count(),
            'program' => Program::count(),
            'agenda' => Agenda::count(),
            'galeri' => Galeri::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}