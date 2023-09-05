@extends('admin.layout.main')
@section('title', 'Lapangan')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Lapangan</h4>
                    <a href="{{ route('lapangan.create') }}" class="btn btn-success ml-auto">+ Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lapangan as $lp)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td> <img src="{{ url('/admin/lapangan/' . @$lp->gambar) }}" width="250px" height="250px"></td>
                                        <td>{{ $lp->nama }}</td>
                                        <td>{{ $lp->deskripsi }}</td>
                                        <td>
                                            <form action="{{ route('lapangan.destroy', $lp->id) }}" method="post">
                                                <a href="{{ route('lapangan.edit', $lp->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
