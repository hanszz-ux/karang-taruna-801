@extends('layouts.admin')

@section('title', 'Galeri')

@section('breadcrumb', 'Galeri')

@section('content')

<div class="galeri-page">

    {{-- HEADER --}}
    <div class="galeri-header">

        <div>
            <h2 class="galeri-title">
                Galeri
            </h2>

            <p class="galeri-subtitle">
                Kelola foto kegiatan Karang Taruna.
            </p>
        </div>

    </div>


    {{-- ALERT --}}
    @if(session('success'))

        <div class="galeri-alert success">
            <i class="fa-solid fa-circle-check"></i>

            <span>
                {{ session('success') }}
            </span>
        </div>

    @endif


    @if($errors->any())

        <div class="galeri-alert error">

            <i class="fa-solid fa-circle-exclamation"></i>

            <div>

                @foreach($errors->all() as $error)

                    <div>
                        {{ $error }}
                    </div>

                @endforeach

            </div>

        </div>

    @endif


    {{-- UPLOAD --}}
    <div class="galeri-card">

        <div class="galeri-card-header">

            <div>

                <h3>
                    Tambah Foto
                </h3>

                <p>
                    Upload beberapa foto sekaligus.
                </p>

            </div>

        </div>


        <form
            action="{{ route('admin.galeri.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="galeri-form-grid">

                {{-- FOTO --}}
                <div class="galeri-field full">

                    <label>
                        Foto Kegiatan
                    </label>

                    <div class="upload-box">

                        <input
                            type="file"
                            name="images[]"
                            id="images"
                            accept="image/jpeg,image/png,image/webp"
                            multiple
                            required
                        >

                        <label
                            for="images"
                            class="upload-content"
                        >

                            <div class="upload-icon">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </div>

                            <strong>
                                Pilih Foto
                            </strong>

                            <span>
                                Bisa memilih banyak foto sekaligus
                            </span>

                            <small>
                                JPG, PNG, WEBP · Maksimal 4 MB/foto
                            </small>

                        </label>

                    </div>

                    <div
                        id="selected-files"
                        class="selected-files"
                    ></div>

                </div>


                {{-- JUDUL --}}
                <div class="galeri-field">

                    <label for="title">
                        Judul Foto
                    </label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        placeholder="Contoh: Bakti Sosial Karang Taruna"
                    >

                </div>


                {{-- KATEGORI --}}
                <div class="galeri-field">

                    <label for="category">
                        Album
                    </label>

                    <input
                        type="text"
                        name="category"
                        id="category"
                        value="{{ old('category') }}"
                        placeholder="Contoh: Sosial"
                    >

                </div>


                {{-- DESKRIPSI --}}
                <div class="galeri-field full">

                    <label for="description">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        placeholder="Deskripsi kegiatan..."
                    >{{ old('description') }}</textarea>

                </div>

            </div>


            <div class="galeri-form-footer">

                <button
                    type="submit"
                    class="galeri-btn-primary"
                >
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    Upload Foto
                </button>

            </div>

        </form>

    </div>


    {{-- DAFTAR FOTO --}}
    <div class="galeri-card">

        <div class="galeri-card-header">

            <div>

                <h3>
                    Foto Galeri
                </h3>

                <p>
                    {{ $galeris->count() }} foto tersimpan.
                </p>

            </div>

        </div>


        @if($galeris->count())

            <div class="galeri-grid">

                @foreach($galeris as $galeri)

                    <div class="galeri-item">

                        <div class="galeri-image">

                            <img
                                src="{{ asset('storage/' . $galeri->image) }}"
                                alt="{{ $galeri->title ?? 'Galeri Karang Taruna' }}"
                            >

                        </div>


                        <div class="galeri-info">

                            <h4>
                                {{ $galeri->title ?: 'Tanpa Judul' }}
                            </h4>

                            @if($galeri->category)

                                <span class="galeri-category">
                                    {{ $galeri->category }}
                                </span>

                            @endif

                        </div>


                        <div class="galeri-actions">

                            <form
                                action="{{ route('admin.galeri.destroy', $galeri) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="galeri-delete"
                                    title="Hapus"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="galeri-empty">

                <i class="fa-regular fa-images"></i>

                <h4>
                    Belum ada foto
                </h4>

                <p>
                    Upload foto kegiatan pertama lo di atas.
                </p>

            </div>

        @endif

    </div>

</div>


<style>

.galeri-page {
    max-width: 1400px;
    margin: 0 auto;
}

.galeri-header {
    margin-bottom: 25px;
}

.galeri-title {
    margin: 0;
    font-size: 28px;
    font-weight: 750;
    color: #172033;
}

.galeri-subtitle {
    margin: 6px 0 0;
    color: #64748b;
    font-size: 14px;
}

.galeri-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    margin-bottom: 25px;
    overflow: hidden;
}

.galeri-card-header {
    padding: 22px 25px;
    border-bottom: 1px solid #edf0f2;
}

.galeri-card-header h3 {
    margin: 0;
    color: #172033;
    font-size: 18px;
    font-weight: 700;
}

.galeri-card-header p {
    margin: 5px 0 0;
    color: #64748b;
    font-size: 13px;
}

.galeri-form-grid {
    padding: 25px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.galeri-field {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.galeri-field.full {
    grid-column: 1 / -1;
}

.galeri-field label {
    font-size: 13px;
    font-weight: 650;
    color: #334155;
}

.galeri-field input,
.galeri-field textarea {
    width: 100%;
    border: 1px solid #dbe2e8;
    border-radius: 10px;
    padding: 12px 14px;
    font-size: 14px;
    outline: none;
    transition: 0.2s;
    box-sizing: border-box;
}

.galeri-field input:focus,
.galeri-field textarea:focus {
    border-color: #0d9f5b;
    box-shadow: 0 0 0 3px rgba(13, 159, 91, 0.08);
}

.upload-box {
    border: 2px dashed #cbd5e1;
    border-radius: 15px;
    min-height: 190px;
    position: relative;
    transition: 0.2s;
}

.upload-box:hover {
    border-color: #0d9f5b;
    background: #f8fffb;
}

.upload-box input {
    position: absolute;
    opacity: 0;
    width: 1px;
    height: 1px;
}

.upload-content {
    min-height: 190px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    text-align: center;
}

.upload-icon {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #eaf8f0;
    color: #0d9f5b;
    font-size: 22px;
    margin-bottom: 12px;
}

.upload-content strong {
    color: #172033;
    font-size: 15px;
}

.upload-content span {
    margin-top: 5px;
    color: #64748b;
    font-size: 13px;
}

.upload-content small {
    margin-top: 5px;
    color: #94a3b8;
    font-size: 11px;
}

.selected-files {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 12px;
}

.selected-file {
    padding: 7px 10px;
    background: #f1f5f9;
    border-radius: 7px;
    font-size: 12px;
    color: #475569;
}

.galeri-form-footer {
    padding: 18px 25px;
    background: #fafafa;
    border-top: 1px solid #edf0f2;
    display: flex;
    justify-content: flex-end;
}

.galeri-btn-primary {
    border: 0;
    background: #0d9f5b;
    color: white;
    border-radius: 10px;
    padding: 11px 18px;
    font-size: 14px;
    font-weight: 650;
    cursor: pointer;
}

.galeri-btn-primary:hover {
    background: #087f47;
}

.galeri-alert {
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 20px;
    display: flex;
    gap: 10px;
    align-items: center;
    font-size: 14px;
}

.galeri-alert.success {
    background: #ecfdf5;
    color: #047857;
}

.galeri-alert.error {
    background: #fef2f2;
    color: #b91c1c;
    align-items: flex-start;
}

.galeri-grid {
    padding: 25px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
}

.galeri-item {
    position: relative;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    overflow: hidden;
    background: white;
}

.galeri-image {
    width: 100%;
    height: 210px;
    overflow: hidden;
    background: #f1f5f9;
}

.galeri-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
}

.galeri-item:hover .galeri-image img {
    transform: scale(1.05);
}

.galeri-info {
    padding: 13px;
    padding-right: 45px;
}

.galeri-info h4 {
    margin: 0;
    font-size: 14px;
    color: #172033;
}

.galeri-category {
    display: inline-block;
    margin-top: 7px;
    font-size: 11px;
    background: #eaf8f0;
    color: #087f47;
    padding: 4px 8px;
    border-radius: 20px;
}

.galeri-actions {
    position: absolute;
    right: 10px;
    bottom: 12px;
}

.galeri-delete {
    width: 32px;
    height: 32px;
    border: 0;
    border-radius: 8px;
    background: #fef2f2;
    color: #dc2626;
    cursor: pointer;
}

.galeri-delete:hover {
    background: #fee2e2;
}

.galeri-empty {
    padding: 70px 20px;
    text-align: center;
    color: #64748b;
}

.galeri-empty i {
    font-size: 45px;
    color: #cbd5e1;
}

.galeri-empty h4 {
    margin: 15px 0 5px;
    color: #334155;
}

.galeri-empty p {
    margin: 0;
    font-size: 13px;
}

@media (max-width: 1100px) {

    .galeri-grid {
        grid-template-columns: repeat(3, 1fr);
    }

}

@media (max-width: 800px) {

    .galeri-form-grid {
        grid-template-columns: 1fr;
    }

    .galeri-field.full {
        grid-column: auto;
    }

    .galeri-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media (max-width: 500px) {

    .galeri-grid {
        grid-template-columns: 1fr;
    }

}

</style>


<script>

const imageInput = document.getElementById('images');
const selectedFiles = document.getElementById('selected-files');

if (imageInput) {

    imageInput.addEventListener('change', function () {

        selectedFiles.innerHTML = '';

        const files = Array.from(this.files);

        if (!files.length) {
            return;
        }

        files.forEach(function (file) {

            const item = document.createElement('div');

            item.className = 'selected-file';

            item.innerHTML =
                '<i class="fa-regular fa-image"></i> ' +
                file.name;

            selectedFiles.appendChild(item);

        });

    });

}

</script>

@endsection