@extends('admin.layout.main')
@section('title', 'Pelatih')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4>Tambah Pelatih</h4>
            </div>
            <div class="card-body p-0">
                <form action="{{ Request()->routeIs('pelatih.edit') ? route('pelatih.update', $pelatih->id) : route('pelatih.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Request()->routeIs('pelatih.edit'))
                        @method('put')
                    @endif
                    <div class="form-group mx-3">
                        <label>gambar</label>
                        @if($pelatih->gambar)
                        <img src="{{asset('admin/pelatih/'. $pelatih->gambar)}}" class="img-Preview img-fluit mb-3 col-sm-5">
                        @else
                        <img class="img-Preview img-fluit mb-3 col-sm-5">
                        @endif
                        <input src="{{asset('admin/'. $pelatih->gambar)}}" type="file" id="gambar" class="form-control" name="gambar" onchange="previewImage()">
                    </div>
                    <div class="form-group mx-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" value="{{ old('nama', $pelatih->nama) }}" class="form-control" name="nama"
                            id="">
                    </div>
                    <div class="form-group mx-3">
                        <label>Deskripsi</label>
                        <textarea rows="3" cols="3" name="deskripsi" class="form-control">{{ old('deskripsi', @$pelatih->deskripsi) }}</textarea>
                    </div>
                    <button class="btn btn-primary mx-3 mb-3" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>

@endsection
