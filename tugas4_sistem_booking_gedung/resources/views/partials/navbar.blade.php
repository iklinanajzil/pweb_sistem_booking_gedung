<header class="navbar">
    <div class="logo">
        <img src="{{ asset('img/logo-unej.png') }}" alt="Logo UNEJ">
        <div class="brand-text">
            <span class="main-title">SISTEM BOOKING</span>
            <span class="sub-title">RUANGAN DAN GEDUNG</span>
        </div>
    </div>
    <nav class="nav-menu">
        <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ route('gedung.index') }}" class="{{ request()->is('gedung*') ? 'active' : '' }}">Daftar Gedung</a></li>
            <li><a href="{{ route('prosedur') }}" class="{{ request()->is('prosedur') ? 'active' : '' }}">Prosedur</a></li>
            <li><a href="{{ route('riwayat.index') }}">Riwayat</a></li>
        </ul>
    </nav>
</header>
