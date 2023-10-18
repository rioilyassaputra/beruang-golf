
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Masuk</title>
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
        <h1>Masukkan Akun Kamu</h1>
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-hotair">
                    <div class="content-wthree">
                        <h2>Masuk</h2>
                        <form action="/loginuser" method="post">
                            @csrf
                            <input type="email" class="email" name="email" placeholder="User Email" required="" autofocus>
                            <input type="password" class="password" name="password" placeholder="User Password" required="" autofocus>
                            <button class="btn" type="submit">Masuk</button>
                        </form>

                        <p class="account">Belum Punya Akun? <a href="/daftar">Daftar</a></p>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="{{asset('')}}login/images/1.png" alt="" class="img-fluid">
                        </div>
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
