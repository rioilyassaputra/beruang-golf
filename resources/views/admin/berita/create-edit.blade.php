@extends('admin.layout.main')
@section('title', 'Berita')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4>Tambah berita</h4>
            </div>
            <div class="card-body p-0">
                <form action="{{ Request()->routeIs('berita.edit') ? route('berita.update', $beritum->id) : route('berita.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Request()->routeIs('berita.edit'))
                        @method('put')
                    @endif
                    <div class="form-group mx-3">
                        <label>gambar</label>
                        <div class="form-group">

                            {{-- <img class="img-Preview img-fluit mb-3 col-sm-5"> --}}
                            @if($beritum->gambar)
                            <img src="{{asset('admin/berita/'. $beritum->gambar)}}" class="img-Preview img-fluit mb-3 col-sm-5">
                            @else
                            <img class="img-Preview img-fluit mb-3 col-sm-5">
                            @endif
                            <input src="{{asset('admin/'. $beritum->gambar)}}" type="file" id="gambar" class="form-control" name="gambar" onchange="previewImage()">
                        </div>

                    </div>
                    <div class="form-group mx-3">
                        <label for="" class="form-label">Judul</label>
                        <input type="text" id="judul" value="{{ old('judul', $beritum->judul) }}" class="form-control @error('judul') is-invalid @enderror" name="judul"
                            id="">
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
                        <textarea rows="3" cols="3" id="Deskripsi" name="Deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('Deskripsi', @$beritum->Deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <button class="btn btn-primary mx-3 mb-3" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector("#judul");
           const slug = document.querySelector("#slug");

           title.addEventListener("keyup", function() {
               let preslug = title.value;
               preslug = preslug.replace(/ /g,"-");
               slug.value = preslug.toLowerCase();
           });



       </script>
{{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
$(function() {
    $('#Deskripsi').ckeditor({
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
});
</script>
    <script>
       CKEDITOR.replace( 'Deskripsi' );
       CKEDITOR.config.autoParagraph = false;
    </script>

@endsection
