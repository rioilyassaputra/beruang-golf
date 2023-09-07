@extends('admin.layout.main')
@section('title', 'Reservasi')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4>Tambah Reservasi</h4>
            </div>
            <div class="card-body p-0">
                <form action="{{ Request()->routeIs('reservasi.edit') ? route('reservasi.update', $reservasi->id) : route('reservasi.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Request()->routeIs('reservasi.edit'))
                        @method('put')
                    @endif
                    <div class="row mx-3">
                        <div class="form-group col-sm-6">
                            <label for="" class="form-label">Nama </label>
                            <input type="text" value="{{ old('nama', $reservasi->nama) }}" class="form-control" name="nama"
                                id="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Pilih paket</label>
                            <select name="id_paket"
                            class="form-control @error('id_paket')
                                is-invalid
                            @enderror"
                            id="paket">
                            <option value="" selected>--pilih paket--
                            </option>
                            @foreach ($paket as $pkt)
                                @if (old('id_paket', $pkt->id) == $pkt->id)
                                    <option value="{{ $pkt->id }}" >{{ $pkt->nama }}
                                    </option>
                                @else
                                    <option value="{{ $pkt->id }}">{{ $pkt->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                        <div class="col-12" id="jam">
                            @foreach ($paket as $item)
                                <div id="{{ $item->id }}" class="col-lg-12 col-md-6">
                                    <div class="card card-body shadow h-100">
                                        <div class="d-flex align-items-start">
                                            {{-- <img class="img-fluid flex-shrink-0" src="{{ asset('masyarakat/img/icon-7.png') }}" alt=""> --}}
                                            <div class="ps-4">
                                                <h5 class="mb-3">{{ $item->nama }}</h5>
                                                <span>{{ $item->jam_mulai }}</span>
                                                <span>{{ $item->jam_selesai }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if (Request()->routeIs('reservasi.edit'))
                        <div class="form-group col-sm-6">
                            <label for="" class="form-label">Harga</label>
                            <input type="number" value="{{ old('harga', $reservasi->harga) }}" class="form-control" name="harga"
                                id="">
                        </div>
                        @endif
                        <div class="form-group col-sm-6">
                            <label for="" class="form-label">no Telepon</label>
                            <input type="number" value="{{ old('no_telp', $reservasi->no_telp) }}" class="form-control" name="no_telp"
                                id="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="" class="form-label">tanggal reservasi</label>
                            <input type="date" value="{{ old('tanggal', $reservasi->tanggal) }}" class="form-control" name="tanggal"
                                id="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="" class="form-label">email</label>
                            <input type="email" value="{{ old('email', $reservasi->email) }}" class="form-control" name="email"
                                id="">
                        </div>
                    </div>
                    <button class="btn btn-primary mx-3 mb-3" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
{{-- @push('js') --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
    // $('#paket').hide();
    $('#label_paket').hide();
    $('#jam').hide();
});

// $("#paket").change(function() {
//     @foreach ($paket as $item)
//         if ($(this).val() == "{{ $item->id }}") {
//             $('#{{ $item->id }}').show();
//         } else {
//             $('#{{ $item->id }}').hide();
//         }
//     @endforeach

//     // // Menyembunyikan elemen dengan id "jam" saat memilih paket
//     $('#jam').hide();
// });

$("#paket").change(function() {
    // Mendapatkan nilai yang dipilih dari dropdown paket
    var selectedPaket = $(this).val();

    @foreach ($paket as $item)
        if (selectedPaket == "{{ $item->id }}") {
            $('#{{ $item->id }}').show();
        } else {
            $('#{{ $item->id }}').hide();
        }
    @endforeach

    // Menampilkan elemen dengan id "jam" jika paket tertentu dipilih
    if (selectedPaket == "{{ $item->id }}") { // Gantilah "paketTertentu" dengan nilai paket yang sesuai
        $('#jam').show();
    } else {
        $('#jam').hide();
    }
});







    </script>
{{-- @endpush --}}

@endsection
