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
    <title>
      Aquarium - Animals Category Responsive Website Template - Services :
      W3Layouts
    </title>
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
      <div class="w3l-breadcrumb py-5">
        <div class="container py-lg-5 py-sm-4 mt-5">
          <h4 class="inner-text-title font-weight-bold mb-2">Kategori</h4>
          <ul class="breadcrumbs-custom-path">
            <li><a href="/">Beranda</a></li>
            <li class="active">
              <span class="fa fa-chevron-right mx-2" aria-hidden="true"></span
              >Kategori
            </li>
          </ul>
        </div>
      </div>
    </div><br><br>
    <!-- //inner banner -->

    <!-- services section -->
<div class="w3l-grids-block-5 pb-5">
        <div class="container">
            <div class="title-main text-center mx-auto mb-4" style="max-width:700px;">
                <h3 class="title-style">Pilih Paket Golf yang Kamu</h3>
                <p class="sub-title mt-2">Pilih paket yang kamu inginkan dan nikmati suasana olahraga bersama teman dan keluarga.</p>
            </div>
            <div class="row mt-sm-5 pt-lg-2 justify-content-center">
                @foreach ($paket as $pkt)

                <div class="col-lg-4 col-sm-6  mt-lg-0 mt-4">
                    <div class=" grids5-info">

                        <a href="#blog">  <img
                            src="{{url('/admin/paket/' . @$pkt->gambar)}}"
                            alt="" height="300px" width="250px"
                            class="radius-image"
                          /></a>
                        <div class="blog-info">
                            <h5>Feb 20, 2021</h5>
                            <h4><a href="#blog">{{$pkt->nama}}</a></h4>
                            {!!str_replace("&Amp;Nbsp;", " ",  Str::limit($pkt->deskripsi,51)) !!} <br>
                            <a class="btn btn-style mt-4" href="{{route('kategori.detail', $pkt->id)}}">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <section class="w3l-services-6 py-5"> --}}
      {{-- <div class="container py-md-5 py-4">
        @foreach ($paket as $pk)
        <div
          class="title-main text-center mx-auto mb-5 pb-lg-4 pb-2"
          style="max-width: 700px"
        >
          <h3 class="title-style">Kategori Paket</h3>
        </div>
        <div class="row text-center mt-5 pt-5">
          <div class="col-lg-4 col-md-6 grids-feature">
            <div class="area-box">
                <img
                src="{{url('/admin/paket/' . @$pk->gambar)}}"
                alt="" height="150px" width="300px"
                class="radius-image"
              />
              <h4>
                <a href="#feature" class="title-head mt-4">{{$pk->nama}}</a>
              </h4>
              <b class="mt-3">Lapangan</b>
              <p >
                {{$pk->lapangan->nama}} <br>
                <p >
                    <b>Jumlah Pemain</b><br>
                    {{$pk->jumlah_pemain}}<br>
                </p>
                <b class="mt-3">Deskripsi Paket</b>
            </p>
             {!!str_replace("&Amp;Nbsp;", " ", $pk->deskripsi)!!} <br>

                <b>jam oprasional</b><br>
                <p>

                    {{\Carbon\Carbon::createFromFormat('H:i:s',$pk->jam_mulai)->format('h:i')}} -
                    {{\Carbon\Carbon::createFromFormat('H:i:s',$pk->jam_selesai)->format('h:i')}}
                </p>
                <b>Harga</b><br>
                   Rp.{{number_format($pk->harga,0,',','.')}} <br>
                <br> --}}


              {{-- </p><br><br> --}}
              {{-- <a href="#url" class="more btn btn-style mt-4">Read More </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- //bottom-grids-->

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
                    <li><a href="">Mon-Wed: 6:00am – 8:00pm</a></li>
                    <li><a href="">Thurs-Fri: 6:30am – 7:30pm</a></li>
                    <li><a href="">Sat: 7:00am – 9:00pm</a></li>
                    <li><a href="">Sun: 8:00am – 8:00pm</a></li>

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
                          <span class="fa fa-facebook-f"></span>
                      </a></li>
                      <li><a href="#url">
                          <span class="fa fa-twitter"></span>
                      </a></li>
                      <li><a href="#url">
                          <span class="fa fa-instagram"></span>
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
</html>
