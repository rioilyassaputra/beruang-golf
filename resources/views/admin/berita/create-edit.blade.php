@extends('admin.layout.main')
@section('title', 'Berita')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4>Tambah berita</h4>
            </div>
            <div class="card-body p-0">
                <form action="{{ Request()->routeIs('berita.edit') ? route('berita.update', $berita->id) : route('berita.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Request()->routeIs('berita.edit'))
                        @method('put')
                    @endif
                    <div class="form-group mx-3">
                        <label>gambar</label>
                        <input type="file" name="gambar" class="form-control" >
                    </div>
                    <div class="form-group mx-3">
                        <label for="" class="form-label">Judul</label>
                        <input type="text" value="{{ old('judul', $berita->judul) }}" class="form-control" name="judul"
                            id="">
                    </div>
                    <div class="form-group mx-3">
                        <label>Deskripsi</label>
                        <textarea rows="3" cols="3" name="Deskripsi" class="form-control">{{ old('Deskripsi', @$berita->Deskripsi) }}</textarea>
                    </div>
                    <button class="btn btn-primary mx-3 mb-3" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>

@endsection
