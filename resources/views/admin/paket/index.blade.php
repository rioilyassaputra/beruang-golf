@extends('admin.layout.main')
@section('title', 'Paket')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Paket</h4>
                    <a href="{{ route('paket.create') }}" class="btn btn-success ml-auto">+ Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Lapangan</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paket as $pkt)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td> <img src="{{ url('/admin/paket/' . @$pkt->gambar) }}" width="150px" height="150px"></td>
                                        <td>{{ $pkt->nama }}</td>
                                        <td>{{ @$pkt->lapangan->nama }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('H:i:s',$pkt->jam_mulai)->format('h:i A') }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('H:i:s',$pkt->jam_selesai)->format('h:i A') }}</td>
                                        <td>Rp.{{ number_format($pkt->harga,0,',','.') }}</td>
                                        <td>
                                            <form action="{{ route('paket.destroy', $pkt->id) }}" method="post">
                                                <a href="{{ route('paket.edit', $pkt->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                @csrf
                                                @method('delete')
                                                <button id="delete" type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
