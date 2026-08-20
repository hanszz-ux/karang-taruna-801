@extends('layouts.landing')

@section('title', 'Karang Taruna')

@section('content')

{{-- =====================================================
     NAVBAR
====================================================== --}}

<header class="landing-navbar" id="navbar">

    <div class="landing-container navbar-inner">

        <a href="{{ route('home') }}" class="landing-brand">

            <div class="brand-logo">
                <img
                    src="{{ asset('images/logo-katar.png') }}"
                    alt="Logo Karang Taruna"
                >
            </div>

            <div class="brand-name">
                <strong>Karang Taruna</strong>
                <span>Generasi Muda Bergerak</span>
            </div>

        </a>


        <nav class="landing-nav">

            <a href="#home">Home</a>

            <a href="#tentang">Tentang</a>

            <a href="#visi-misi">Visi & Misi</a>

            <a href="#program">Program</a>

            <a href="#berita">Berita</a>

            <a href="#galeri">Galeri</a>

            <a href="#kontak">Kontak</a>

        </nav>


        <a
            href="{{ route('login') }}"
            class="admin-login"
        >

            <i class="fa-solid fa-lock"></i>

            Login Admin

        </a>


        <button
            type="button"
            class="mobile-menu-button"
            id="mobileMenuButton"
            aria-label="Buka menu"
            aria-expanded="false"
        >
            <span></span>
        </button>

    </div>


    <div class="mobile-nav" id="mobileNav">

        <a href="#home">Home</a>

        <a href="#tentang">Tentang</a>

        <a href="#visi-misi">Visi & Misi</a>

        <a href="#program">Program</a>

        <a href="#berita">Berita</a>

        <a href="#galeri">Galeri</a>

        <a href="#kontak">Kontak</a>

        <a href="{{ route('login') }}">
            Login Admin
        </a>

    </div>

</header>


{{-- =====================================================
     HERO
====================================================== --}}

<section
    class="hero-section"
    id="home"
>

    <div class="hero-background">

        @if($setting?->hero_image)

            <img
                src="{{ asset('storage/' . $setting->hero_image) }}"
                alt="Karang Taruna"
            >

        @endif

    </div>

    <div class="hero-overlay"></div>


    {{-- =================================================
         LOGO KARANG TARUNA
    ================================================== --}}

    <div class="hero-logo-decoration">

        <img
            src="{{ asset('images/logo-katar.png') }}"
            alt="Logo Karang Taruna"
        >

    </div>


    <div class="landing-container hero-content">

        <div class="hero-text reveal hero-reveal">

            <span class="hero-eyebrow">

                WELCOME TO

            </span>


            <h1>

                {{ $setting?->hero_title
                    ?? 'KARANG TARUNA 801'
                }}

            </h1>


            <p>

                {{ $setting?->hero_description
                    ?? 'Wadah generasi muda untuk berkarya, berkontribusi, dan membangun masyarakat.'
                }}

            </p>

        </div>

    </div>

</section>


{{-- =====================================================
     STATISTIK
====================================================== --}}

<section class="stats-section">

    <div class="landing-container">

        <div class="stats-wrapper reveal">

            <div class="public-stat reveal-child">

                <div class="public-stat-icon">

                    <i class="fa-solid fa-users"></i>

                </div>

                <div>

                    <strong
                        class="stat-number"
                        data-target="{{ $setting?->stat_members ?? 0 }}"
                    >
                        0+
                    </strong>

                    <span>
                        Anggota
                    </span>

                </div>

            </div>


            <div class="public-stat reveal-child">

                <div class="public-stat-icon">

                    <i class="fa-solid fa-bullhorn"></i>

                </div>

                <div>

                    <strong
                        class="stat-number"
                        data-target="{{ $setting?->stat_programs ?? 0 }}"
                    >
                        0+
                    </strong>

                    <span>
                        Program
                    </span>

                </div>

            </div>


            <div class="public-stat reveal-child">

                <div class="public-stat-icon">

                    <i class="fa-regular fa-calendar-check"></i>

                </div>

                <div>

                    <strong
                        class="stat-number"
                        data-target="{{ $setting?->stat_events ?? 0 }}"
                    >
                        0+
                    </strong>

                    <span>
                        Kegiatan
                    </span>

                </div>

            </div>


            <div class="public-stat reveal-child">

                <div class="public-stat-icon">

                    <i class="fa-solid fa-award"></i>

                </div>

                <div>

                    <strong
                        class="stat-number"
                        data-target="{{ $setting?->stat_years ?? 0 }}"
                    >
                        0
                    </strong>

                    <span>
                        Tahun Berdiri
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     TENTANG
====================================================== --}}

<section
    class="about-section public-section"
    id="tentang"
>

    <div class="landing-container about-grid">

        <div class="about-image-wrapper reveal reveal-left">

            @if($setting?->about_image)

                <img
                    src="{{ asset('storage/' . $setting->about_image) }}"
                    alt="Tentang Karang Taruna"
                    class="about-image"
                >

            @else

                <div class="about-placeholder">

                    <i class="fa-solid fa-users"></i>

                </div>

            @endif


            <div class="about-badge">

                <strong>
                    {{ $setting?->stat_years ?? 0 }}
                </strong>

                <span>
                    Tahun<br>
                    Berkontribusi
                </span>

            </div>

        </div>


        <div class="about-content reveal reveal-right">

            <span class="section-eyebrow">
                TENTANG KAMI
            </span>


            <h2>

                {{ $setting?->about_title
                    ?? 'Tentang Karang Taruna'
                }}

            </h2>


            <p>

                {{ $setting?->about_description
                    ?? 'Karang Taruna merupakan organisasi kepemudaan yang bergerak dalam bidang sosial dan pemberdayaan masyarakat.'
                }}

            </p>


            <div class="about-points stagger-group">

                @if($setting?->about_point_1)

                    <div class="stagger-item">

                        <i class="fa-solid fa-circle-check"></i>

                        <span>
                            {{ $setting->about_point_1 }}
                        </span>

                    </div>

                @endif


                @if($setting?->about_point_2)

                    <div class="stagger-item">

                        <i class="fa-solid fa-circle-check"></i>

                        <span>
                            {{ $setting->about_point_2 }}
                        </span>

                    </div>

                @endif


                @if($setting?->about_point_3)

                    <div class="stagger-item">

                        <i class="fa-solid fa-circle-check"></i>

                        <span>
                            {{ $setting->about_point_3 }}
                        </span>

                    </div>

                @endif

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     VISI MISI
====================================================== --}}

<section
    class="vision-section"
    id="visi-misi"
>

    <div class="landing-container">

        <div class="section-heading centered">

            <span class="section-eyebrow">
                ARAH ORGANISASI
            </span>

            <h2>
                Visi & Misi
            </h2>

            <p>
                Komitmen kami untuk menciptakan pemuda
                yang aktif, kreatif, dan berdampak.
            </p>

        </div>


        <div class="vision-grid reveal">

            <div class="vision-card reveal-child">

                <div class="vision-icon">

                    <i class="fa-solid fa-eye"></i>

                </div>

                <span>
                    VISI
                </span>

                <p>

                    {{ $setting?->vision
                        ?? 'Mewujudkan generasi muda yang aktif, kreatif, mandiri, dan peduli terhadap masyarakat.'
                    }}

                </p>

            </div>


            <div class="vision-card reveal-child">

                <div class="vision-icon">

                    <i class="fa-solid fa-bullseye"></i>

                </div>

                <span>
                    MISI
                </span>

                <p>

                    {{ $setting?->mission
                        ?? 'Mengembangkan potensi pemuda melalui kegiatan sosial, pendidikan, olahraga, kewirausahaan, dan kegiatan kemasyarakatan.'
                    }}

                </p>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     PROGRAM
====================================================== --}}

<section
    class="program-section public-section"
    id="program"
>

    <div class="landing-container">

        <div class="section-heading">

            <div>

                <span class="section-eyebrow">
                    PROGRAM KAMI
                </span>

                <h2>
                    Bergerak Melalui Aksi
                </h2>

            </div>

            <p>
                Berbagai program untuk mendorong
                potensi pemuda dan masyarakat.
            </p>

        </div>


        @if($programs->count())

            <div class="program-grid reveal">

                @foreach($programs as $program)

                    <article class="program-card reveal-child">

                        <div class="program-image">

                            @if($program->image)

                                <img
                                    src="{{ asset('storage/' . $program->image) }}"
                                    alt="{{ $program->title }}"
                                >

                            @else

                                <div class="program-placeholder">

                                    <i class="fa-solid fa-bullhorn"></i>

                                </div>

                            @endif

                        </div>


                        <div class="program-body">

                            <h3>
                                {{ $program->title }}
                            </h3>

                            <p>
                                {{ Str::limit($program->description, 130) }}
                            </p>

                            <span class="program-link">

                                Selengkapnya

                                <i class="fa-solid fa-arrow-right"></i>

                            </span>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="empty-public">

                <i class="fa-solid fa-layer-group"></i>

                <p>
                    Program kegiatan akan segera hadir.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =====================================================
     BERITA
====================================================== --}}

<section
    class="news-section public-section"
    id="berita"
>

    <div class="landing-container">

        <div class="section-heading">

            <div>

                <span class="section-eyebrow">
                    BERITA TERBARU
                </span>

                <h2>
                    Kabar & Cerita Kami
                </h2>

            </div>

        </div>


        @if($beritas->count())

            <div class="news-grid reveal">

                @foreach($beritas as $berita)

                    <article class="news-card reveal-child">

                        <div class="news-image">

                            @if($berita->image)

                                <img
                                    src="{{ asset('storage/' . $berita->image) }}"
                                    alt="{{ $berita->title }}"
                                >

                            @else

                                <div class="news-placeholder">

                                    <i class="fa-regular fa-newspaper"></i>

                                </div>

                            @endif

                        </div>


                        <div class="news-body">

                            @if($berita->category)

                                <span class="news-category">
                                    {{ $berita->category }}
                                </span>

                            @endif


                            <h3>
                                {{ $berita->title }}
                            </h3>


                            <p>

                                {{ Str::limit(
                                    $berita->excerpt ?: $berita->content,
                                    120
                                ) }}

                            </p>


                            <div class="news-date">

                                <i class="fa-regular fa-calendar"></i>

                                {{ optional($berita->published_at)->format('d M Y') }}

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="empty-public">

                <i class="fa-regular fa-newspaper"></i>

                <p>
                    Belum ada berita yang dipublikasikan.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =====================================================
     GALERI
====================================================== --}}

<section
    class="gallery-section public-section"
    id="galeri"
>

    <div class="landing-container">

        {{-- HEADER --}}
        <div class="gallery-heading reveal">

            <div>

                <span class="section-eyebrow">
                    GALERI
                </span>

                <h2>
                    Momen Kebersamaan
                </h2>

            </div>

        </div>


        {{-- ALBUM --}}
        @if(isset($galleryGroups) && $galleryGroups->count())

            <div class="gallery-album-grid">

                @foreach($galleryGroups as $index => $group)

                    @php
                        $photos = $group['photos'];
                        $cover = $group['cover'];
                    @endphp

                    <article
                        class="gallery-album reveal-child"
                        data-gallery-index="{{ $index }}"
                        tabindex="0"
                        role="button"
                        aria-label="Buka album {{ $group['title'] }}"
                    >

                        <div class="gallery-album-image">

                            <img
                                src="{{ asset('storage/' . $cover->image) }}"
                                alt="{{ $group['title'] }}"
                            >

                            <div class="gallery-album-overlay"></div>


                            {{-- FRAME ANIMATION --}}
                            <div class="gallery-frame">

                                <span class="frame-top"></span>
                                <span class="frame-right"></span>
                                <span class="frame-bottom"></span>
                                <span class="frame-left"></span>

                            </div>


                            {{-- CONTENT --}}
                            <div class="gallery-album-content">

                                <span class="gallery-album-count">

                                    <i class="fa-regular fa-images"></i>

                                    {{ $group['count'] }}
                                    {{ $group['count'] == 1 ? 'Foto' : 'Foto' }}

                                </span>


                                <h3>
                                    {{ $group['title'] }}
                                </h3>


                                <span class="gallery-album-link">

                                    Lihat Galeri

                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>

                                </span>

                            </div>

                        </div>

                    </article>


                    {{-- DATA FOTO UNTUK MODAL --}}
                    @php
                        $galleryPhotos = $photos->map(function ($photo) {
                            return [
                                'src' => asset('storage/' . $photo->image),
                                'title' => $photo->title,
                                'description' => $photo->description,
                            ];
                        })->values();
                    @endphp

<script>
    window.galleryAlbums = window.galleryAlbums || [];

    window.galleryAlbums[{{ $index }}] = {
        title: @json($group['title']),
        photos: @json($galleryPhotos)
    };
</script>

                @endforeach

            </div>

        @else

            <div class="empty-public">

                <i class="fa-regular fa-images"></i>

                <p>
                    Dokumentasi kegiatan akan segera hadir.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =====================================================
     GALLERY LIGHTBOX
====================================================== --}}

<div
    class="gallery-lightbox"
    id="galleryLightbox"
    aria-hidden="true"
>

    {{-- CLOSE --}}

    <button
        type="button"
        class="gallery-lightbox-close"
        onclick="closeGallery()"
        aria-label="Tutup galeri"
    >
        <i class="fa-solid fa-xmark"></i>
    </button>


    {{-- VIEWER --}}

    <div class="gallery-viewer">


        {{-- AREA FOTO --}}

        <div class="gallery-image-stage">


            {{-- PREVIOUS --}}

            <button
                type="button"
                class="gallery-nav gallery-nav-prev"
                onclick="galleryPrevious()"
                aria-label="Foto sebelumnya"
            >
                <i class="fa-solid fa-chevron-left"></i>
            </button>


            {{-- FOTO --}}

            <img
                id="galleryLightboxImage"
                src=""
                alt="Foto Galeri Karang Taruna"
            >


            {{-- NEXT --}}

            <button
                type="button"
                class="gallery-nav gallery-nav-next"
                onclick="galleryNext()"
                aria-label="Foto berikutnya"
            >
                <i class="fa-solid fa-chevron-right"></i>
            </button>

        </div>


        {{-- INFO --}}

        <div class="gallery-lightbox-info">

            <div>

                <span
                    id="galleryLightboxAlbum"
                    class="gallery-lightbox-album"
                ></span>

                <h3
                    id="galleryLightboxTitle"
                ></h3>

            </div>


            <span
                id="galleryLightboxCounter"
                class="gallery-lightbox-counter"
            ></span>

        </div>


        {{-- DOTS --}}

        <div
            class="gallery-dots"
            id="galleryDots"
        ></div>

    </div>

</div>

{{-- =====================================================
     KONTAK / CTA
====================================================== --}}

<section class="cta-section" id="kontak">

    <div class="landing-container">

        <div class="cta-header reveal">

            <span class="section-eyebrow">
                MARI BERKONTRIBUSI
            </span>

            <h2>
                Bersama Kita Bisa<br>
                Membuat Perubahan.
            </h2>

            <p>
                Mari bergerak bersama untuk menciptakan
                lingkungan yang lebih baik bagi generasi
                mendatang.
            </p>

        </div>


        <div class="contact-main-grid reveal">

            {{-- ================================
                 ALAMAT
            ================================= --}}

            <div class="contact-main-card">

                <div class="contact-main-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <div class="contact-main-content">

                    <span>
                        ALAMAT
                    </span>

                    <h3>
                        Sekretariat Karang Taruna
                    </h3>

                    @if($setting?->address)

                        <p>
                            {{ $setting->address }}
                        </p>

                    @else

                        <p>
                            Alamat sekretariat belum tersedia.
                        </p>

                    @endif

                </div>

            </div>

        </div>


        {{-- ================================
             SOCIAL MEDIA
        ================================= --}}

        <div class="contact-social-wrapper reveal">

            <div class="contact-social-heading">

                <span>
                    TERHUBUNG DENGAN KAMI
                </span>

                <p>
                    Ikuti aktivitas dan informasi terbaru
                    Karang Taruna 801.
                </p>

            </div>


            <div class="contact-social-list">

                {{-- EMAIL --}}

                @if($setting?->email)

                    <a
                        href="mailto:{{ $setting->email }}"
                        class="contact-social-item"
                    >

                        <span class="contact-social-icon">
                            <i class="fa-regular fa-envelope"></i>
                        </span>

                        <span class="contact-social-text">
                            <strong>Email</strong>

                            <small>
                                {{ $setting->email }}
                            </small>
                        </span>

                        <i class="fa-solid fa-arrow-up-right-from-square contact-social-arrow"></i>

                    </a>

                @endif


                {{-- INSTAGRAM --}}

                @if($setting?->instagram)

                    <a
                        href="{{ $setting->instagram }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="contact-social-item"
                    >

                        <span class="contact-social-icon">
                            <i class="fa-brands fa-instagram"></i>
                        </span>

                        <span class="contact-social-text">
                            <strong>Instagram</strong>
                            <small>
                                Ikuti Instagram kami
                            </small>
                        </span>

                        <i class="fa-solid fa-arrow-up-right-from-square contact-social-arrow"></i>

                    </a>

                @endif


                {{-- TIKTOK --}}

                @if($setting?->tiktok)

                    <a
                        href="{{ $setting->tiktok }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="contact-social-item"
                    >

                        <span class="contact-social-icon">
                            <i class="fa-brands fa-tiktok"></i>
                        </span>

                        <span class="contact-social-text">
                            <strong>TikTok</strong>
                            <small>
                                Ikuti TikTok kami
                            </small>
                        </span>

                        <i class="fa-solid fa-arrow-up-right-from-square contact-social-arrow"></i>

                    </a>

                @endif

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     FOOTER
====================================================== --}}

<footer class="landing-footer">

    <div class="landing-container footer-inner">

        <div class="footer-copy">
            © {{ date('Y') }} Karang Taruna 801.
            All rights reserved.
        </div>

    </div>

</footer>

@push('scripts')

<script>

    const navbar = document.getElementById('navbar');

    const mobileButton =
        document.getElementById('mobileMenuButton');

    const mobileNav =
        document.getElementById('mobileNav');


    window.addEventListener('scroll', function () {

        if (window.scrollY > 20) {

            navbar.classList.add('scrolled');

        } else {

            navbar.classList.remove('scrolled');

        }

    });


    if (mobileButton && mobileNav) {

        mobileButton.addEventListener('click', function () {

            const isOpen =
                mobileButton.classList.toggle('active');

            mobileNav.classList.toggle('active');

            mobileButton.setAttribute(
                'aria-expanded',
                isOpen ? 'true' : 'false'
            );

            mobileButton.setAttribute(
                'aria-label',
                isOpen ? 'Tutup menu' : 'Buka menu'
            );

        });

    }


    document.querySelectorAll('.mobile-nav a')
        .forEach(function (link) {

        link.addEventListener('click', function () {

            mobileNav.classList.remove('active');

            mobileButton.classList.remove('active');

            mobileButton.setAttribute(
                'aria-expanded',
                'false'
            );

            mobileButton.setAttribute(
                'aria-label',
                'Buka menu'
            );

        });

    });

    /* =========================================================
        SCROLL REVEAL
        ========================================================= */

        const revealElements = document.querySelectorAll(
            '.reveal, .reveal-child, .stagger-item'
        );

        if ('IntersectionObserver' in window) {

            const revealObserver = new IntersectionObserver(
                function (entries, observer) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            entry.target.classList.add('is-visible');

                            observer.unobserve(entry.target);

                        }

                    });

                },
                {
                    threshold: 0.12,
                    rootMargin: '0px 0px -40px 0px'
                }
            );


            revealElements.forEach(function (element) {

                revealObserver.observe(element);

            });

        } else {

            revealElements.forEach(function (element) {

                element.classList.add('is-visible');

            });

        }

        /* =========================================================
        STATISTICS COUNTER
        ========================================================= */

        const statNumbers = document.querySelectorAll('.stat-number');

        function animateCounter(element) {

            const target = Number(
                element.dataset.target || 0
            );

            const duration = 1400;

            const startTime = performance.now();


            function updateCounter(currentTime) {

                const elapsed =
                    currentTime - startTime;

                const progress =
                    Math.min(elapsed / duration, 1);


                /*
                * Ease out
                */
                const eased =
                    1 - Math.pow(1 - progress, 3);


                const currentValue =
                    Math.floor(target * eased);


                const suffix =
                    element.textContent.trim().endsWith('+')
                        ? '+'
                        : '';


                element.textContent =
                    currentValue + suffix;


                if (progress < 1) {

                    requestAnimationFrame(updateCounter);

                } else {

                    element.textContent =
                        target + suffix;

                }

            }


            requestAnimationFrame(updateCounter);
        }


        if ('IntersectionObserver' in window) {

            const counterObserver =
                new IntersectionObserver(
                    function (entries, observer) {

                        entries.forEach(function (entry) {

                            if (entry.isIntersecting) {

                                animateCounter(entry.target);

                                observer.unobserve(entry.target);

                            }

                        });

                    },
                    {
                        threshold: 0.7
                    }
                );


            statNumbers.forEach(function (number) {

                counterObserver.observe(number);

            });

        } else {

            statNumbers.forEach(function (number) {

                const target =
                    Number(number.dataset.target || 0);

                number.textContent =
                    target +
                    (
                        number.textContent.trim().endsWith('+')
                            ? '+'
                            : ''
                    );

            });

        }

        /* =========================================================
        GALLERY ALBUM / LIGHTBOX
        ========================================================= */

        let currentGalleryAlbum = [];
        let currentGalleryIndex = 0;


        /*
        |--------------------------------------------------------------------------
        | ELEMENT LIGHTBOX
        |--------------------------------------------------------------------------
        */

        const galleryLightbox =
            document.getElementById('galleryLightbox');

        const galleryLightboxImage =
            document.getElementById('galleryLightboxImage');

        const galleryLightboxAlbum =
            document.getElementById('galleryLightboxAlbum');

        const galleryLightboxTitle =
            document.getElementById('galleryLightboxTitle');

        const galleryLightboxCounter =
            document.getElementById('galleryLightboxCounter');


        /*
        |--------------------------------------------------------------------------
        | OPEN ALBUM
        |--------------------------------------------------------------------------
        */

        function openGalleryAlbum(albumIndex) {

            console.log('Gallery album clicked:', albumIndex);


            if (
                !window.galleryAlbums ||
                !window.galleryAlbums[albumIndex]
            ) {

                console.error(
                    'Data album tidak ditemukan:',
                    albumIndex
                );

                return;
            }


            const album =
                window.galleryAlbums[albumIndex];


            if (
                !album.photos ||
                !album.photos.length
            ) {

                console.error(
                    'Album tidak memiliki foto:',
                    album
                );

                return;
            }


            currentGalleryAlbum =
                album.photos;

            currentGalleryIndex = 0;


            /*
            |--------------------------------------------------------------------------
            | SET ALBUM TITLE
            |--------------------------------------------------------------------------
            */

            if (galleryLightboxAlbum) {

                galleryLightboxAlbum.textContent =
                    album.title || 'Galeri';

            }


            /*
            |--------------------------------------------------------------------------
            | OPEN LIGHTBOX
            |--------------------------------------------------------------------------
            */

            if (galleryLightbox) {

                galleryLightbox.classList.add('is-open');

                galleryLightbox.setAttribute(
                    'aria-hidden',
                    'false'
                );

            }


            /*
            |--------------------------------------------------------------------------
            | LOCK BODY SCROLL
            |--------------------------------------------------------------------------
            */

            document.body.style.overflow = 'hidden';


            /*
            |--------------------------------------------------------------------------
            | SHOW FIRST PHOTO
            |--------------------------------------------------------------------------
            */

            showGalleryPhoto('next');

        }


        /*
        |--------------------------------------------------------------------------
        | SHOW PHOTO
        |--------------------------------------------------------------------------
        */

        function showGalleryPhoto(direction = 'next') {

            if (
                !currentGalleryAlbum ||
                !currentGalleryAlbum.length ||
                !galleryLightboxImage
            ) {
                return;
            }

            const photo =
                currentGalleryAlbum[currentGalleryIndex];

            if (!photo) {
                return;
            }

            const image = galleryLightboxImage;

            /*
            |--------------------------------------------------------------------------
            | Reset animation
            |--------------------------------------------------------------------------
            */

            image.classList.remove(
                'gallery-photo-enter-next',
                'gallery-photo-enter-prev'
            );

            /*
            |--------------------------------------------------------------------------
            | Force browser reflow
            |--------------------------------------------------------------------------
            */

            void image.offsetWidth;

            /*
            |--------------------------------------------------------------------------
            | Set image
            |--------------------------------------------------------------------------
            */

            image.src = photo.src;

            image.alt =
                photo.title ||
                'Foto Galeri Karang Taruna';

            /*
            |--------------------------------------------------------------------------
            | Update information
            |--------------------------------------------------------------------------
            */

            if (galleryLightboxTitle) {

                galleryLightboxTitle.textContent =
                    photo.title ||
                    'Dokumentasi Kegiatan';

            }

            if (galleryLightboxCounter) {

                galleryLightboxCounter.textContent =
                    `${currentGalleryIndex + 1} / ${currentGalleryAlbum.length}`;

            }

            /*
            |--------------------------------------------------------------------------
            | Apply direction
            |--------------------------------------------------------------------------
            */

            image.classList.add(
                direction === 'prev'
                    ? 'gallery-photo-enter-prev'
                    : 'gallery-photo-enter-next'
            );

        }

        /*
        |--------------------------------------------------------------------------
        | NEXT PHOTO
        |--------------------------------------------------------------------------
        */
        function galleryNext() {

            if (
                !currentGalleryAlbum ||
                !currentGalleryAlbum.length
            ) {
                return;
            }


            currentGalleryIndex =
                (
                    currentGalleryIndex + 1
                ) %
                currentGalleryAlbum.length;


            showGalleryPhoto('next');

        }

        /*
        |--------------------------------------------------------------------------
        | PREVIOUS PHOTO
        |--------------------------------------------------------------------------
        */

        function galleryPrevious() {

            if (
                !currentGalleryAlbum ||
                !currentGalleryAlbum.length
            ) {
                return;
            }


            currentGalleryIndex =
                (
                    currentGalleryIndex -
                    1 +
                    currentGalleryAlbum.length
                ) %
                currentGalleryAlbum.length;


            showGalleryPhoto('prev');

        }

        /*
        |--------------------------------------------------------------------------
        | CLOSE GALLERY
        |--------------------------------------------------------------------------
        */

        function closeGallery() {

            if (!galleryLightbox) {
                return;
            }


            galleryLightbox.classList.remove(
                'is-open'
            );


            galleryLightbox.setAttribute(
                'aria-hidden',
                'true'
            );


            document.body.style.overflow = '';


            currentGalleryAlbum = [];

            currentGalleryIndex = 0;

        }


        /*
        |--------------------------------------------------------------------------
        | CLICK ALBUM
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'DOMContentLoaded',
            function () {

                const galleryAlbums =
                    document.querySelectorAll(
                        '.gallery-album[data-gallery-index]'
                    );


                galleryAlbums.forEach(
                    function (album) {

                        album.addEventListener(
                            'click',
                            function () {

                                const index =
                                    Number(
                                        this.dataset.galleryIndex
                                    );


                                openGalleryAlbum(index);

                            }
                        );


                        /*
                        |--------------------------------------------------------------------------
                        | KEYBOARD ACCESSIBILITY
                        |--------------------------------------------------------------------------
                        */

                        album.addEventListener(
                            'keydown',
                            function (event) {

                                if (
                                    event.key === 'Enter' ||
                                    event.key === ' '
                                ) {

                                    event.preventDefault();


                                    const index =
                                        Number(
                                            this.dataset.galleryIndex
                                        );


                                    openGalleryAlbum(index);

                                }

                            }
                        );

                    }
                );

            }
        );


        /*
        |--------------------------------------------------------------------------
        | CLICK OUTSIDE IMAGE = CLOSE
        |--------------------------------------------------------------------------
        */

        if (galleryLightbox) {

            galleryLightbox.addEventListener(
                'click',
                function (event) {

                    if (
                        event.target ===
                        galleryLightbox
                    ) {

                        closeGallery();

                    }

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | KEYBOARD NAVIGATION
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    !galleryLightbox ||
                    !galleryLightbox.classList.contains(
                        'is-open'
                    )
                ) {

                    return;

                }

                if (
                    event.key === 'Escape'
                ) {

                    closeGallery();

                }

                if (
                    event.key === 'ArrowRight'
                ) {

                    galleryNext();

                }

                if (
                    event.key === 'ArrowLeft'
                ) {

                    galleryPrevious();

                }

            }
        );

</script>

@endpush

@endsection