@extends('layouts.admin')

@section('title', 'Landing Page')

@section('page-title', 'Landing Page')

@section('breadcrumb', 'Landing Page')

@section('content')

@if(session('success'))
    <div class="alert-success">
        <i class="fa-solid fa-circle-check"></i>

        <span>
            {{ session('success') }}
        </span>
    </div>
@endif

@if($errors->any())
    <div class="alert-error">

        <div class="alert-error-title">
            <i class="fa-solid fa-circle-exclamation"></i>
            Periksa kembali data berikut:
        </div>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif


<form
    action="{{ route('admin.landing.update') }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')


    {{-- =====================================================
         HERO
    ====================================================== --}}

    <div class="cms-section">

        <div class="cms-section-header">

            <div>
                <span class="cms-label">
                    BAGIAN 01
                </span>

                <h2>
                    Hero Section
                </h2>

                <p>
                    Konten utama yang tampil pertama kali
                    ketika pengunjung membuka website.
                </p>
            </div>

            <div class="cms-section-icon">
                <i class="fa-solid fa-house"></i>
            </div>

        </div>


        <div class="cms-form-grid">

            <div class="form-group full">

                <label>
                    Judul Hero
                </label>

                <input
                    type="text"
                    name="hero_title"
                    value="{{ old('hero_title', $setting->hero_title) }}"
                    placeholder="Masukkan judul utama..."
                >

            </div>


            <div class="form-group full">

                <label>
                    Deskripsi Hero
                </label>

                <textarea
                    name="hero_description"
                    rows="5"
                    placeholder="Masukkan deskripsi..."
                >{{ old('hero_description', $setting->hero_description) }}</textarea>

            </div>


            <div class="form-group">

                <label>
                    Teks Tombol
                </label>

            </div>


            <div class="form-group">

                <label>
                    URL Tombol
                </label>

                <input
                    type="text"
                    name="hero_button_url"
                    value="{{ old('hero_button_url', $setting->hero_button_url) }}"
                    placeholder="Contoh: #program"
                >

            </div>


            <div class="form-group full">

                <label>
                    Foto Hero
                </label>

                <input
                    type="file"
                    name="hero_image"
                    accept="image/jpeg,image/png,image/webp"
                >

                <small>
                    JPG, PNG atau WEBP. Maksimal 2 MB.
                </small>

                @if($setting->hero_image)

                    <div class="image-preview">

                        <img
                            src="{{ asset('storage/' . $setting->hero_image) }}"
                            alt="Hero"
                        >

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- =====================================================
         ABOUT
    ====================================================== --}}

    <div class="cms-section">

        <div class="cms-section-header">

            <div>
                <span class="cms-label">
                    BAGIAN 02
                </span>

                <h2>
                    Tentang Karang Taruna 801
                </h2>

                <p>
                    Informasi singkat mengenai organisasi.
                </p>
            </div>

            <div class="cms-section-icon">
                <i class="fa-solid fa-users"></i>
            </div>

        </div>


        <div class="cms-form-grid">

            <div class="form-group full">

                <label>
                    Judul
                </label>

                <input
                    type="text"
                    name="about_title"
                    value="{{ old('about_title', $setting->about_title) }}"
                    placeholder="Tentang Karang Taruna"
                >

            </div>


            <div class="form-group full">

                <label>
                    Deskripsi
                </label>

                <textarea
                    name="about_description"
                    rows="6"
                    placeholder="Ceritakan tentang organisasi..."
                >{{ old('about_description', $setting->about_description) }}</textarea>

                <div class="form-group">

                <label>
                    Poin Tentang 1
                </label>

                <input
                    type="text"
                    name="about_point_1"
                    value="{{ old('about_point_1', $setting->about_point_1) }}"
                    placeholder="Contoh: Mendorong kreativitas generasi muda"
                >

            </div>


            <div class="form-group">

                <label>
                    Poin Tentang 2
                </label>

                <input
                    type="text"
                    name="about_point_2"
                    value="{{ old('about_point_2', $setting->about_point_2) }}"
                    placeholder="Contoh: Membangun kepedulian sosial"
                >

            </div>


            <div class="form-group">

                <label>
                    Poin Tentang 3
                </label>

                <input
                    type="text"
                    name="about_point_3"
                    value="{{ old('about_point_3', $setting->about_point_3) }}"
                    placeholder="Contoh: Mengembangkan potensi masyarakat"
                >

            </div>

            </div>


            <div class="form-group full">

                <label>
                    Foto Tentang
                </label>

                <input
                    type="file"
                    name="about_image"
                    accept="image/jpeg,image/png,image/webp"
                >

                <small>
                    JPG, PNG atau WEBP. Maksimal 2 MB.
                </small>

                @if($setting->about_image)

                    <div class="image-preview">

                        <img
                            src="{{ asset('storage/' . $setting->about_image) }}"
                            alt="Tentang"
                        >

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- =====================================================
         VISI MISI
    ====================================================== --}}

    <div class="cms-section">

        <div class="cms-section-header">

            <div>
                <span class="cms-label">
                    BAGIAN 03
                </span>

                <h2>
                    Visi & Misi
                </h2>

                <p>
                    Arah dan tujuan organisasi.
                </p>
            </div>

            <div class="cms-section-icon">
                <i class="fa-solid fa-bullseye"></i>
            </div>

        </div>


        <div class="cms-form-grid">

            <div class="form-group">

                <label>
                    Visi
                </label>

                <textarea
                    name="vision"
                    rows="7"
                    placeholder="Masukkan visi organisasi..."
                >{{ old('vision', $setting->vision) }}</textarea>

            </div>


            <div class="form-group">

                <label>
                    Misi
                </label>

                <textarea
                    name="mission"
                    rows="7"
                    placeholder="Masukkan misi organisasi..."
                >{{ old('mission', $setting->mission) }}</textarea>

            </div>

        </div>

    </div>


    {{-- =====================================================
         STATISTIK
    ====================================================== --}}

    <div class="cms-section">

        <div class="cms-section-header">

            <div>
                <span class="cms-label">
                    BAGIAN 04
                </span>

                <h2>
                    Statistik
                </h2>

                <p>
                    Angka yang ditampilkan pada landing page.
                </p>
            </div>

            <div class="cms-section-icon">
                <i class="fa-solid fa-chart-simple"></i>
            </div>

        </div>


        <div class="cms-form-grid four">

            <div class="form-group">

                <label>
                    Jumlah Anggota
                </label>

                <input
                    type="number"
                    name="stat_members"
                    min="0"
                    value="{{ old('stat_members', $setting->stat_members) }}"
                >

            </div>


            <div class="form-group">

                <label>
                    Jumlah Program
                </label>

                <input
                    type="number"
                    name="stat_programs"
                    min="0"
                    value="{{ old('stat_programs', $setting->stat_programs) }}"
                >

            </div>


            <div class="form-group">

                <label>
                    Jumlah Kegiatan
                </label>

                <input
                    type="number"
                    name="stat_events"
                    min="0"
                    value="{{ old('stat_events', $setting->stat_events) }}"
                >

            </div>


            <div class="form-group">

                <label>
                    Tahun Berdiri
                </label>

                <input
                    type="number"
                    name="stat_years"
                    min="0"
                    value="{{ old('stat_years', $setting->stat_years) }}"
                >

            </div>

        </div>

    </div>


    {{-- =====================================================
         KONTAK
    ====================================================== --}}

    <div class="cms-section">

        <div class="cms-section-header">

            <div>
                <span class="cms-label">
                    BAGIAN 05
                </span>

                <h2>
                    Kontak & Sosial Media
                </h2>

                <p>
                    Informasi yang akan ditampilkan pada website.
                </p>
            </div>

            <div class="cms-section-icon">
                <i class="fa-solid fa-address-book"></i>
            </div>

        </div>


        <div class="cms-form-grid">

            <div class="form-group full">

                <label>
                    Alamat
                </label>

                <textarea
                    name="address"
                    rows="3"
                    placeholder="Alamat sekretariat..."
                >{{ old('address', $setting->address) }}</textarea>

            </div>


            <div class="form-group">

                <label>
                    Nomor Telepon
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $setting->phone) }}"
                    placeholder="08xxxxxxxxxx"
                >

            </div>


            <div class="form-group">

                <label>
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $setting->email) }}"
                    placeholder="email@contoh.com"
                >

            </div>


            <div class="form-group">

                <label>
                    Instagram
                </label>

                <input
                    type="text"
                    name="instagram"
                    value="{{ old('instagram', $setting->instagram) }}"
                    placeholder="https://instagram.com/..."
                >

            </div>


            <div class="form-group">

                <label>
                    TikTok
                </label>

                <input
                    type="text"
                    name="tiktok"
                    value="{{ old('tiktok', $setting->tiktok) }}"
                    placeholder="https://tiktok.com/@username"
                >

            </div>

        </div>

    </div>


    {{-- SAVE BUTTON --}}

    <div class="cms-submit">

        <button type="submit">

            <i class="fa-solid fa-floppy-disk"></i>

            Simpan Perubahan

        </button>

    </div>

</form>

@endsection