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
    <title>Beruang Emas Golf</title>
    <!-- google-fonts -->
    <link
      href="{{asset('')}}//fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link
      href="{{asset('')}}//fonts.googleapis.com/css2?family=Halant:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="{{asset('')}}//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!-- //google-fonts -->
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="{{asset('')}}landing_page/assets/css/style-starter.css" />
  </head>

  <body>
    <!--header-->
    @include('component.navbar')
    <!-- //header -->

    <!-- inner banner -->

    <!-- //inner banner -->

    <!-- about section -->
    <section class="w3l-wecome-content-6">
		<!-- /content-6-section -->
		<div class="ab-content-6-mian py-5">
			<div class="container py-lg-5">
					<div class="welcome-grids row">
						<div class="col-lg-6 mb-lg-0 mb-5">
                            <h3 class="title-style text-center mb-2 pl-4">{{ $pelatih->nama }}</h3>


                                {!!str_replace("&Amp;Nbsp;", " ", $pelatih->deskripsi)!!} <br>
						</div>
						<div class="col-lg-5 welcome-image">
                            <img
                                src="{{url('/admin/pelatih/' . @$pelatih->gambar)}}"
                                alt="" height="400px" width="550px"
                                class="radius-image"
                              /><br><br>
						</div>
					</div>
			</div>
		</div>
		{{-- </div> --}}

	</section>


















    <!-- //about section -->

    <!-- team section -->

    <!-- //team section -->

    <!-- skills section -->

    <!-- //skills section -->

    <!-- middle -->

    <!-- //middle -->

    <!-- testimonial section -->

    <!-- //testimonial section -->

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
</html>
