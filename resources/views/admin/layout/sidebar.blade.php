<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Beruang Golf</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BG</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Admin</li>
            {{-- <li class="{{ request()->routeis('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li> --}}
            {{-- <li
                class="dropdown {{ request()->routeis('role.*', 'users.*', 'klasifikasi.*', 'sifat-surat.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i>
                    <span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeis('role.*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('role.index') }}">Role</a></li>
                    <li class="{{ request()->routeis('users.*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('users.index') }}">Pengguna</a></li>
                    <li class="{{ request()->routeis('klasifikasi.*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('klasifikasi.index') }}">klasifikasi</a></li>
                    <li class="{{ request()->routeis('sifat-surat.*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('sifat-surat.index') }}">sifat surat</a></li>
                </ul>
            </li> --}}
            <li class="menu-header">Menu</li>
            <li class="{{ request()->routeis('lapangan.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('lapangan.index') }}"><i class="fas fa-fire"></i><span>Lapangan</span></a>
            </li>
            <li class="{{ request()->routeis('pelatih.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pelatih.index') }}"><i class="fas fa-fire"></i><span>Pelatih</span></a>
            </li>
            <li class="{{ request()->routeis('berita.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('berita.index') }}"><i class="fas fa-fire"></i><span>Berita</span></a>
            </li>
            {{-- <li
                class="dropdown {{ request()->routeis('incoming-mail.*', 'outgoing-mail.*', 'position.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i> <span>Transaksi
                        Surat</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeis('incoming-mail.*', 'position.*') ? 'active' : '' }}"><a
                            class="nav-link" href="{{ route('incoming-mail.index') }}">Surat Masuk</a></li>
                    <li class="{{ request()->routeis('outgoing-mail.*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('outgoing-mail.index') }}">Surat Keluar</a></li>
                </ul>
            </li>
            <li class="menu-header">Buku</li>
            <li class="dropdown {{ request()->routeis('buku-masuk', 'buku-keluar') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i> <span>Buku
                        Agenda</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeis('buku-masuk') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('buku-masuk') }}">Surat Masuk</a></li>
                    <li class="{{ request()->routeis('buku-keluar') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('buku-keluar') }}">Surat Keluar</a></li>
                </ul>
            </li>
            <li class="menu-header">Galeri File</li>
            <li class="dropdown {{ request()->routeis('galeri.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i> <span>galeri
                        file</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeis('galeri.masuk') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('galeri.masuk') }}">Surat Masuk</a></li>
                    <li class="{{ request()->routeis('galeri.keluar') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('galeri.keluar') }}">Surat Keluar</a></li> --}}
                </ul>
    </aside>
</div>
