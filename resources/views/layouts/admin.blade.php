<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard') - Karang Taruna
    </title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/admin.css') }}">

    @stack('styles')
</head>

<body>

<div class="admin-wrapper">

    {{-- SIDEBAR --}}
    <aside class="admin-sidebar" id="adminSidebar">

        <div class="sidebar-brand">

            <div class="brand-logo">
                KT
            </div>

            <div class="brand-text">
                <strong>Karang Taruna</strong>
                <span>Admin Panel</span>
            </div>

        </div>

        <div class="sidebar-menu">

            <div class="menu-label">
                MENU UTAMA
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                <i class="fa-solid fa-chart-pie"></i>

                <span>Dashboard</span>

            </a>

            <div class="menu-label">
                KONTEN
            </div>

            <a href="{{ route('admin.landing.edit') }}"
            class="sidebar-link {{ request()->routeIs('admin.landing.*') ? 'active' : '' }}">

                <i class="fa-solid fa-house"></i>

                <span>Landing Page</span>

            </a>

            <a href="#"
               class="sidebar-link">

                <i class="fa-solid fa-bullhorn"></i>

                <span>Program</span>

            </a>

            <a href="#"
               class="sidebar-link">

                <i class="fa-regular fa-newspaper"></i>

                <span>Berita</span>

            </a>

            <a href="#"
               class="sidebar-link">

                <i class="fa-regular fa-calendar-days"></i>

                <span>Agenda</span>

            </a>

            <a
                href="{{ route('admin.galeri.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}"
            >
                <i class="fa-regular fa-images"></i>
                <span>Galeri</span>
            </a>

            <a href="#"
               class="sidebar-link">

                <i class="fa-solid fa-users"></i>

                <span>Pengurus</span>

            </a>

        </div>

        {{-- SIDEBAR BOTTOM --}}
        <div class="sidebar-bottom">

            <div class="admin-user">

                <div class="admin-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="admin-user-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>

            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-button">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span>Logout</span>

                </button>

            </form>

        </div>

    </aside>


    {{-- MAIN --}}
    <div class="admin-main">

        {{-- TOP NAVBAR --}}
        <header class="admin-navbar">

            <div class="navbar-left">

                <button type="button"
                        class="sidebar-toggle"
                        id="sidebarToggle">

                    <i class="fa-solid fa-bars"></i>

                </button>

                <div>

                    <span class="navbar-small">
                        Karang Taruna
                    </span>

                    <h1>
                        @yield('page-title', 'Dashboard')
                    </h1>

                </div>

            </div>

            <div class="navbar-right">

                <a href="{{ url('/') }}"
                   target="_blank"
                   class="view-website">

                    <i class="fa-solid fa-arrow-up-right-from-square"></i>

                    <span>Lihat Website</span>

                </a>

                <div class="navbar-avatar">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

            </div>

        </header>


        {{-- BREADCRUMB --}}
        <div class="admin-breadcrumb">

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <i class="fa-solid fa-chevron-right"></i>

            <span>
                @yield('breadcrumb', 'Dashboard')
            </span>

        </div>


        {{-- CONTENT --}}
        <main class="admin-content">

            @yield('content')

        </main>

    </div>

</div>


<script>
    const sidebar = document.getElementById('adminSidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function () {
            sidebar.classList.toggle('show');
        });
    }
</script>

@stack('scripts')

</body>
</html>