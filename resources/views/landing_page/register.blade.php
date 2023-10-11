
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Daftar</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Report Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="{{asset('')}}login/css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <link rel="stylesheet" href="{{asset('')}}login/css/font-awesome.min.css" type="text/css" media="all">

</head>

<body>

    <!-- form section start -->
    <section class="w3l-hotair-form">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var toast = Swal.mixin({
        toast: true,
        title: 'General Title',
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
</script>
@if ($message = Session::get('success'))
    <script type="text/javascript">
        toast.fire({
            animation: true,
            title: 'Sukses',
            text: '{{ $message }}',
            icon: 'success'
        });
    </script>
@endif
@if ($message = Session::get('error'))
    <script type="text/javascript">
        Swal.fire(
            'Error',
            '{{ $message }}',
            'error'
        )
    </script>
@endif
@if ($message = Session::get('failed'))
    <script type="text/javascript">
        Swal.fire(
            'Error',
            '{{ $message }}',
            'error'
        )
    </script>
@endif
@if ($message = Session::get('warning'))
    <script type="text/javascript">
        toast.fire({
            animation: true,
            title: 'Warning',
            text: '{{ $message }}',
            icon: 'warning'
        });
    </script>
@endif

        <h1>Daftar akun baru</h1>
        <div class="container">
            <!-- /form -->

            <div class="workinghny-form-grid">
                <div class="main-hotair">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="{{asset('')}}login/images/1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Daftar</h2>
                        <form action="{{route('user.daftar')}}" method="post">
                            @csrf
                            @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                            <input type="text" class="text @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Nama" required="" autofocus>
                            @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                            <input type="email" class="email @error('email') is-invalid @enderror" name="email" placeholder="Masukkan Email" required="" autofocus>
                            @error('password')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                            <input type="password" class="password @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password" required="" autofocus>
                            <button class="btn" type="submit">Daftar</button>
                        </form>

                        <p class="account">Sudah Punya Akun? <a href="/masuk">Masuk</a></p>
                    </div>

                </div>
            </div>
            <!-- //form -->
        </div>
        <!-- copyright-->
        {{-- <div class="copyright text-center">
            <p class="copy-footer-29">© 2021 Report Login Form. All rights reserved | Design by <a
                        href="https://w3layouts.com">W3layouts</a></p>
        </div> --}}
        <!-- //copyright-->
    </section>
    <!-- //form section start -->
</body>

</html>
