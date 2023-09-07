@extends('admin.layout.main')
@section('title', 'Berita')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Berita</h4>
                    <a href="{{ route('berita.create') }}" class="btn btn-success ml-auto">+ Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    {{-- <th>Deskripsi</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($berita as $bt)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td> <img src="{{ url('/admin/berita/' . @$bt->gambar) }}" width="auto" height="150px" ></td>
                                        <td>{!! $bt->judul !!}</td>
                                        {{-- <td>{{ Str::limit($bt->Deskripsi,50) }}</td> --}}
                                        <td>
                                            <form action="{{ route('berita.destroy', $bt->id) }}"  method="post">
                                                <a href="{{ route('berita.edit', $bt->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ route('berita.show', $bt->id) }}"
                                                    class="btn btn-warning">show</a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" id="delete" class="btn btn-danger">Delete</button>
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
