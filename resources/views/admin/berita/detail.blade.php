@extends('admin.layout.main')
@section('title', 'Berita')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4>Tambah berita</h4>
            </div>
            <div class="card-body p-0">
                    @if (Request()->routeIs('berita.edit'))
                        @method('put')
                    @endif
                    <div class="form-group mx-3">
                        <label>gambar</label>
                        <div class="form-group">

                            <img class="img-fluit mb-3 col-sm-5" src="{{ url('/admin/berita/' . @$beritum->gambar) }}">

                        </div>

                    </div>
                    <div class="form-group mx-3">
                        <label for="" class="form-label">Judul</label>
                        <input type="text" id="judul" value="{{ old('judul', $beritum->judul) }}" class="form-control @error('judul') is-invalid @enderror" name="judul"
                            id="" readonly>
                            @error('judul')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mx-3">
                        <label class="font-weight-bold">slug</label>
                        <input type="text" id="slug"  class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug',$beritum->slug) }}" placeholder="Masukkan slug Post" disable readonly>

                        <!-- error message untuk title -->
                        @error('slug')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mx-3">
                        <label>Deskripsi</label>
                        <textarea rows="3" cols="3" name="Deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" readonly>{{ old('Deskripsi', @$beritum->Deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <a class="btn btn-danger mx-3 mb-3" href="{{route('berita.index')}}">Kembali</a>
            </div>
        </div>
    </div>



@endsection
