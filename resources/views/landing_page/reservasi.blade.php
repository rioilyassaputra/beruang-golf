<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Puncak Golf</title>
    <!-- google-fonts -->
    <link
      href="//fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link
      href="//fonts.googleapis.com/css2?family=Halant:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!-- //google-fonts -->
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="landing_page/assets/css/style-starter.css" />
  </head>

  <body>
    <!--header-->
    @include('component.navbar')
    <!-- //header -->

    <!-- inner banner -->


    <div class="inner-banner">
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

      <section class="w3l-breadcrumb py-5">
        <div class="container py-lg-5 py-sm-4 mt-5">
          <h4 class="inner-text-title font-weight-bold mb-2">Reservasi</h4>
          <ul class="breadcrumbs-custom-path">
            <li><a href="/">Beranda</a></li>
            <li class="active">
              <span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>
              Reservasi
            </li>
          </ul>
        </div>
      </section>
    </div>
    <!-- //inner banner -->

    <!-- contact -->
    <section class="w3l-contact-info-main py-5" id="contact">

      <div class="container py-md-5 py-4">
        <div
          class="title-main text-center mx-auto mb-4"
          style="max-width: 700px"
        >
          <h3 class="title-style">Reservasi</h3>
          {{-- <p class="sub-title mt-2">
            Cum doctus civibus efficiantur in imperdiet deterruisset. Cras
            efficitur, metus gravida suscipit cursus, dui diam pre lorem id
            lectus.
          </p> --}}
        </div>
        <div class="contact-w3pvt-form mt-5 pt-lg-4">
          <form
            method="post"
            class="w3layouts-contact-fm"
            action="{{route('reservasi.user')}}"
          >
          @csrf
          <div class="form-group">
            <label for="">Nama Lengkap*</label>
            <input type="text" class="form-control form-control-user  @error('nama') is-invalid @enderror" value="{{ old('nama') }}" name="nama" placeholder="Nama" required>
            @error('nama')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="">Tanggal Reservasi*</label>
            <input type="date" class="form-control form-control-user  @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" name="tanggal" placeholder="Tanggal Reservasi" required>
            @error('tanggal')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="">Paket*</label>
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
                                <b>Jam Main</b> <br>
                                <span>{{ \Carbon\Carbon::createFromFormat('H:i:s',$item->jam_mulai)->format('h:i A') }}</span> -
                                <span>{{ \Carbon\Carbon::createFromFormat('H:i:s',$item->jam_selesai)->format('h:i A') }}</span> <br>
                                <b>Maksimal Pemain</b> <br>
                                <span>{{ $item->jumlah_pemain }}</span> <br>
                                <b>Harga</b> <br>
                                <span>{{ number_format($item->harga,0,',','.') }}</span> <br>
                                <b>deskripsi</b> <br>
                                <span>{!!str_replace("&Amp;Nbsp;", " ",  $item->deskripsi) !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <label for="">No Wa*</label>
            <input type="number" class="form-control form-control-user  @error('no_telp') is-invalid @enderror" name="no_telp" placeholder="No hp" required>
            @error('no_telp')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="">Gmail*</label>
            <input type="email" class="form-control form-control-user  @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
            @error('email')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        </div>
            </div>
            <div class="form-group-2 mt-3 text-right">
              <button type="submit" class="btn btn-style">Kirim</button>
            </div><br>
          </form>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126926.93493599749!2d106.785304888349!3d-6.201995866825545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f2bdb4c39073%3A0xfc11427db9e1642d!2sRoyale%20Jakarta%20Golf%20Club!5e0!3m2!1sid!2sid!4v1693886128234!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
    <!-- //contact -->

    <!-- footer -->
    <section class="footer-17">
        <div class="footer17-sub pt-5">
          <div class="container py-md-5 py-4">
            <!-- <div class="text-center mb-4">
              <a class="footer-logo" href="index.html">Aquarium</a>
            </div> -->
            <!-- <form
              action="#url"
              method="GET"
              class="rightside-form m-auto"
              style="max-width: 500px"
            >
              <input
                type="email"
                class="form-control"
                name="email"
                placeholder="Enter your email"
              />
              <button class="btn" type="submit">Subscribe</button>
            </form> -->
            <div class="row footer17-top mt-5 pt-md-5 pt-sm-4">
              <div class="col-md-3 col-6">
                <div class="footer17-top-left">
                  <h6>Kontak Kami</h6>
                  <ul>
                    <li><a href="contact.html">Jl. Raya Halim Tiga, Halim Perdanakusuma Semarang Utara</a></li>
                    <li><a href="#work">HP/WA: +62811 988 8801 </a></li>
                    <li><a href="#aquarium">RSVP: +6221 2936 2015</a></li>
                    <li><a href="#questions">Email: info@BeruangEmas.com</a></li>
                    <li><a href="#info">www.royalejakarta.com</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="footer17-top-left">
                  <h6>Jam Operasional</h6>
                  <ul>
                    <li><a href="">Senin-Rabu: 07:00 – 19:30</a></li>
                    <li><a href="">Kamis-jumat: 06:30 – 20:00</a></li>
                    <li><a href="">Sabtu: 06:00 – 20:30</a></li>
                    <li><a href="">Minggu: 06:00 – 21:00</a></li>

                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-6 mt-md-0 mt-4">
                <div class="footer17-top-left">
                  <h6>Header</h6>
                  <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="/kategori">Kategori</a></li>
                    <li><a href="/tentangkami">Tentang Kami</a></li>
                    <li><a href="/Berita">Berita</a></li>
                    <li><a href="/reservasi">Reservasi</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-6 mt-md-0 mt-4">
                <div class="footer17-top-left border-0">
                  <h6>Media Sosial</h6>
                  <ul>
                    <li><a href="#url">
                        <span class="fa fa-facebook-f">PuncakGOLF</span>
                    </a></li>
                    <li><a href="#url">
                        <span class="fa fa-twitter">PuncakGOLF</span>
                    </a></li>
                    <li><a href="#url">
                        <span class="fa fa-instagram">PuncakGOLF</span>
                    </a></li>
                    <li><a href="#url"></a></li>
                    <li><a href="#url"></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="copyright text-center">
            <div class="container">
              <p class="copy-footer-29">
                © 2021 Aquarium. All rights reserved | Designed by
                <a href="https://w3layouts.com" target="_blank">W3layouts</a>
              </p>
            </div>
          </div> --}}
        </div>
      </section>
    <!-- //footer -->

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      <span class="fa fa-level-up" aria-hidden="true"></span>
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function () {
        scrollFunction();
      };

      function scrollFunction() {
        if (
          document.body.scrollTop > 20 ||
          document.documentElement.scrollTop > 20
        ) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    <script src="landing_page/assets/js/jquery-3.3.1.min.js"></script>
    <!-- //common jquery plugin -->

    <!-- theme switch js (light and dark)-->
    <script src="landing_page/assets/js/theme-change.js"></script>
    <script>
      function autoType(elementClass, typingSpeed) {
        var thhis = $(elementClass);
        thhis.css({
          position: "relative",
          display: "inline-block",
        });
        thhis.prepend(
          '<div class="cursor" style="right: initial; left:0;"></div>'
        );
        thhis = thhis.find(".text-js");
        var text = thhis.text().trim().split("");
        var amntOfChars = text.length;
        var newString = "";
        thhis.text("|");
        setTimeout(function () {
          thhis.css("opacity", 1);
          thhis.prev().removeAttr("style");
          thhis.text("");
          for (var i = 0; i < amntOfChars; i++) {
            (function (i, char) {
              setTimeout(function () {
                newString += char;
                thhis.text(newString);
              }, i * typingSpeed);
            })(i + 1, text[i]);
          }
        }, 1500);
      }

      $(document).ready(function () {
        // Now to start autoTyping just call the autoType function with the
        // class of outer div
        // The second paramter is the speed between each letter is typed.
        autoType(".type-js", 200);
      });
    </script>
    <!-- //theme switch js (light and dark)-->

    <!-- MENU-JS -->
    <script>
      $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
          $("#site-header").addClass("nav-fixed");
        } else {
          $("#site-header").removeClass("nav-fixed");
        }
      });

      //Main navigation Active Class Add Remove
      $(".navbar-toggler").on("click", function () {
        $("header").toggleClass("active");
      });
      $(document).on("ready", function () {
        if ($(window).width() > 991) {
          $("header").removeClass("active");
        }
        $(window).on("resize", function () {
          if ($(window).width() > 991) {
            $("header").removeClass("active");
          }
        });
      });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
      $(function () {
        $(".navbar-toggler").click(function () {
          $("body").toggleClass("noscroll");
        });
      });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!--bootstrap-->
    <script src="landing_page/assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap-->
    <!-- //Js scripts -->
  </body>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
    // $('#paket').hide();
    $('#label_paket').hide();
    // $('#jam').hide();
    @foreach ($paket as $item)
            $('#{{ $item->id }}').hide()
        @endforeach
});

$("#paket").change(function() {
    @foreach ($paket as $item)
        if ($(this).val() == "{{ $item->id }}") {
            $('#{{ $item->id }}').show();
        } else {
            $('#{{ $item->id }}').hide();
        }
    @endforeach

});

    </script>
</html>
