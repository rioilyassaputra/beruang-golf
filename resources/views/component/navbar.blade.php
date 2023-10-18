



  <style>
    #cobalogo{
        color: white; font-size: 40px; -webkit-text-stroke-width: 2px; -webkit-text-stroke-color: black;
    }
</style>
<header id="site-header" class="fixed-top nav-fixed">
    <div class="container ">
        <nav class="navbar navbar-expand-lg navbar-dark stroke">
            <h1><a class="navbar-brand" href="index.html">
                <img src="{{asset('')}}landing_page/assets/images/lg.png" alt="" style="margin-left: -8%" width="50" height="50">
                    {{-- SMA<span class="sub-log">Duta</span>Wacana --}}

                </a>
                <h5 class="hny-title" id="cobalogo">PUNCAK GOLF</h5>
            </h1>
  <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
  data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
  aria-label="Toggle navigation">
  <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
  <span class="navbar-toggler-icon fa icon-close fa-times"></span>
  </span>
</button>

<div class="collapse navbar-collapse " id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-lg-auto">
      <li class="nav-item {{request()->routeis('beranda') ? 'active' : ''}}">
        <a class="nav-link" href="/">Beranda</a>
      </li>
      <li class="nav-item {{request()->routeis('tentangkami') ? 'active' : ''}}">
        <a class="nav-link" href="/tentangkami">Tentang Kami</a>
      </li>
      <li class="nav-item {{request()->routeis('kategori') ? 'active' : ''}}">
        <a class="nav-link" href="/kategori">Kategori</a>
      </li>
      <li class="nav-item {{request()->routeis('Berita') ? 'active' : ''}}">
        <a class="nav-link" href="/Berita">Berita&Acara</a>
      </li>
      {{-- <li class="nav-item {{request()->routeis('Reservasi') ? 'active' : ''}}">
        <a class="nav-link" href="/Reservasi">Reservasi</a>
      </li> --}}
      <!-- search button -->
      @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset('') }}admin/assets/img/avatar/avatar-1.png"
                            class="rounded-circle mr-1" height="40px" width="40px">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- <div class="dropdown-title">Logged in 5 min ago</div>
                        <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <a href="features-activities.html" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> Activities
                        </a>
                        <a href="features-settings.html" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> Settings
                        </a> --}}
                        <div class="dropdown-divider"></div>
                        <a href="/logoutuser" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
                    @else
                    <div class="navbar-nav ml-lg-auto">
                    <li class="nav item">
                        <a href="{{route('login')}}" class="btn btn-primary mr-3">Masuk</a>
                    </li>
                        @if (Route::has('register'))
                        <li class="nav item">
                            <a href="/daftar" class="btn btn-outline-primary">Daftar</a>
                        </li>
                        @endif
                    @endauth
                </div>
                </div>
            @endif
      {{-- <center>
        <a href="{{route('login')}}" class="btn btn-primary mr-3">Masuk</a>
    </center>

    <center>
        <a href="/daftar" class="btn btn-outline-primary  mr-0">Register</a>
    </center> --}}

      <!-- //search button -->
    </ul>
  </div>
            <!-- toggle switch for light and dark theme -->

            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">

                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
        </nav>
    </div>
</header>
