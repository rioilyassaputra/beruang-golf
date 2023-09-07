@extends('admin.layout.main')
@section('title', 'paket')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4>Tambah paket</h4>
            </div>
            <div class="card-body p-0">
                <form action="{{ Request()->routeIs('paket.edit') ? route('paket.update', $paket->id) : route('paket.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Request()->routeIs('paket.edit'))
                        @method('put')
                    @endif
                    <div class="row mx-3">

                        <div class="form-group col-sm-6">
                            <label>gambar</label>
                            @if($paket->gambar)
                            <img src="{{asset('admin/paket/'. $paket->gambar)}}" class="img-Preview img-fluit mb-3 col-sm-5">
                            @else
                            <img class="img-Preview img-fluit mb-3 col-sm-5">
                            @endif
                            <input src="{{asset('admin/'. $paket->gambar)}}" type="file" id="gambar" class="form-control" name="gambar" onchange="previewImage()">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="" class="form-label">Nama Paket</label>
                            <input type="text" value="{{ old('nama', $paket->nama) }}" class="form-control" name="nama"
                                id="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Pilih Lapangan</label>
                            <select name="id_lapangan"
                            class="form-control @error('id_lapangan')
                                is-invalid
                            @enderror"
                            id="id_lapangan">
                            @foreach ($lapangan as $lp)
                                @if (old('id_lapangan', $lp->id) == $lp->id)
                                    <option value="{{ $lp->id }}" selected>{{ $lp->nama }}
                                    </option>
                                @else
                                    <option value="{{ $lp->id }}">{{ $lp->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="" class="form-label">Jumlah Pemain</label>
                            <input type="number" value="{{ old('jumlah_pemain', $paket->jumlah_pemain) }}" class="form-control" name="jumlah_pemain"
                                id="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="" class="form-label">jam mulai</label>
                            <input type="time" value="{{ old('jam_mulai', $paket->jam_mulai) }}" class="form-control" name="jam_mulai"
                                id="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="" class="form-label">Jam selesai</label>
                            <input type="time" value="{{ old('jam_selesai', $paket->jam_selesai) }}" class="form-control" name="jam_selesai"
                            id="">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="" class="form-label">Harga Paket</label>
                            <input type="number" value="{{ old('harga', $paket->harga) }}" class="form-control" name="harga"
                                id="">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Deskripsi</label>
                            <textarea rows="3" cols="3" name="deskripsi" class="form-control">{{ old('deskripsi', @$paket->deskripsi) }}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary mx-3 mb-3" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>

@endsection
