@extends('admin.layout.main')
@section('title', 'Reservasi')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Reservasi</h4>
                    <a href="{{ route('reservasi.create') }}" class="btn btn-success ml-auto">+ Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Paket</th>
                                    <th>No Reservasi</th>
                                    <th>Tanggal</th>
                                    {{-- <th>Email</th> --}}
                                    <th>Status</th>
                                    {{-- <th>No Wa</th> --}}
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $rsv)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $rsv->nama }}</td>
                                        <td>{{ @$rsv->paket->nama }}</td>
                                        <td>{{ @$rsv->no_reservasi }}</td>
                                        <td>{{ @$rsv->tanggal }}</td>
                                        {{-- <td>{{ @$rsv->email }}</td> --}}
                                        <td>{{ $rsv->status }}</td>
                                        {{-- <td>{{ @$rsv->no_telp }}</td> --}}
                                        <td>Rp.{{ number_format($rsv->harga,0,',','.') }}</td>
                                        <td>
                                            @if ($rsv->status == 'pending')
                                            <button data-target="#create" data-toggle="modal" data-id={{ $rsv->id }}
                                            class="d-none d-sm-inline-block btn btn-sm btn-primary rounded-button shadow-sm">
                                            konfirmasi</button>
                                            @endif
                                            <form action="{{ route('reservasi.destroy', $rsv->id) }}" method="post">
                                                      <a href="https://wa.me/{{ @$rsv->no_telp }}"
                                                        class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></a>
                                                      <a href="{{route('pdf', $rsv->id)}}"
                                                        class="btn btn-danger">PDF</a>
                                                        <a href="{{ route('reservasi.edit', $rsv->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                @csrf
                                                @method('delete')
                                                <button id="delete" type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade " id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title label-hitam" id="exampleModalLabel">Upload Bukti Transaksi</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <Form action="{{ route('reservasi.confirm', $rsv->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{$rsv->id}}" id="reservasi_id">
                <div class="form-group">
                    <label class="label-hitam">Bukti Transaksi</label>
                    <input type="file" class="form-control-file" name="bukti_pembayaran">
                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
        </Form>
    </div>
</div>
</div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- modal --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


@endsection
