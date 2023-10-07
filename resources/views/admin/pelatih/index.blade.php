@extends('admin.layout.main')
@section('title', 'Pelatih')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data pelatih</h4>
                    <a href="{{ route('pelatih.create') }}" class="btn btn-success ml-auto">+ Tambah</a>
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
                                @foreach ($pelatih as $pl)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td> <img src="{{ url('/admin/pelatih/' . @$pl->gambar) }}" ></td>
                                        <td>{{ $pl->nama }}</td>
                                        <td>{!! $pl->deskripsi !!}</td>
                                        <td>
                                            <form action="{{ route('pelatih.destroy', $pl->id) }}" method="post">
                                                <a href="{{ route('pelatih.edit', $pl->id) }}"
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
