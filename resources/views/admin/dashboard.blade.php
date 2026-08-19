@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('breadcrumb', 'Dashboard')

@section('content')

<div class="dashboard-welcome">

    <div>
        <span class="welcome-label">
            ADMIN PANEL
        </span>

        <h2>
            Selamat datang, {{ auth()->user()->name }} 👋
        </h2>

        <p>
            Kelola seluruh konten website Karang Taruna
            melalui dashboard ini.
        </p>
    </div>

</div>


<div class="stats-grid">

    {{-- BERITA --}}
    <div class="stat-card">

        <div class="stat-icon green">
            <i class="fa-regular fa-newspaper"></i>
        </div>

        <div class="stat-info">

            <span>
                Total Berita
            </span>

            <strong>
                {{ $stats['berita'] }}
            </strong>

        </div>

    </div>


    {{-- PROGRAM --}}
    <div class="stat-card">

        <div class="stat-icon blue">
            <i class="fa-solid fa-bullhorn"></i>
        </div>

        <div class="stat-info">

            <span>
                Total Program
            </span>

            <strong>
                {{ $stats['program'] }}
            </strong>

        </div>

    </div>


    {{-- AGENDA --}}
    <div class="stat-card">

        <div class="stat-icon orange">
            <i class="fa-regular fa-calendar-days"></i>
        </div>

        <div class="stat-info">

            <span>
                Total Agenda
            </span>

            <strong>
                {{ $stats['agenda'] }}
            </strong>

        </div>

    </div>


    {{-- GALERI --}}
    <div class="stat-card">

        <div class="stat-icon purple">
            <i class="fa-regular fa-images"></i>
        </div>

        <div class="stat-info">

            <span>
                Total Galeri
            </span>

            <strong>
                {{ $stats['galeri'] }}
            </strong>

        </div>

    </div>

</div>


<div class="dashboard-grid">

    {{-- QUICK ACTION --}}
    <div class="dashboard-card">

        <div class="card-header">

            <div>
                <h3>Akses Cepat</h3>

                <p>
                    Kelola konten website dengan cepat.
                </p>
            </div>

        </div>


        <div class="quick-actions">

            <a href="{{ route('admin.landing.edit') }}" class="quick-action">

                <div class="quick-icon">
                    <i class="fa-solid fa-house"></i>
                </div>

                <div>
                    <strong>Landing Page</strong>

                    <span>
                        Kelola tampilan utama website
                    </span>
                </div>

            </a>


            <a href="#" class="quick-action">

                <div class="quick-icon">
                    <i class="fa-regular fa-newspaper"></i>
                </div>

                <div>
                    <strong>Tambah Berita</strong>

                    <span>
                        Publikasikan berita terbaru
                    </span>
                </div>

            </a>


            <a href="#" class="quick-action">

                <div class="quick-icon">
                    <i class="fa-regular fa-images"></i>
                </div>

                <div>
                    <strong>Tambah Galeri</strong>

                    <span>
                        Upload dokumentasi kegiatan
                    </span>
                </div>

            </a>

        </div>

    </div>


    {{-- INFO --}}
    <div class="dashboard-card">

        <div class="card-header">

            <div>
                <h3>Status Website</h3>

                <p>
                    Informasi sistem saat ini.
                </p>
            </div>

            <span class="status-badge">
                <span></span>
                Online
            </span>

        </div>


        <div class="system-info">

            <div class="system-row">

                <span>Website</span>

                <strong>
                    Karang Taruna
                </strong>

            </div>

            <div class="system-row">

                <span>Administrator</span>

                <strong>
                    {{ auth()->user()->name }}
                </strong>

            </div>

            <div class="system-row">

                <span>Role</span>

                <strong>
                    {{ ucfirst(auth()->user()->role) }}
                </strong>

            </div>

            <div class="system-row">

                <span>Status</span>

                <strong class="online-text">
                    Aktif
                </strong>

            </div>

        </div>

    </div>

</div>

@endsection