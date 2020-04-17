<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100"
id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/') }}">
            KETIKAN </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            @hasrole('admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.edit.profil', $user->id) }}">
                    Ubah Profil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.auth.index') }}">
                    Data User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.aduan.index') }}">
                    Data Aduan
                </a>
            </li>
            @endhasrole
            @hasrole('petugas')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('petugas.edit.profil', $user->id) }}">
                    Ubah Profil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('petugas.aduan.index') }}">
                    Data Aduan
                </a>
            </li>
            @endhasrole
            @hasrole('masyarakat')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('masyarakat.edit.profil', $user->id) }}">
                    Ubah Profil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('masyarakat.aduan.index_semua') }}">
                    Semua Aduan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('masyarakat.aduan.index_saya') }}">
                    Aduan Saya
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('masyarakat.aduan.index') }}">
                    Tulis Aduan
                </a>
            </li>
            @endhasrole
            @guest
            <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                Login
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
                Register
            </a>
            </li>
            @else
            <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </li>
            @endguest
        </ul>
        </div>
    </div>
</nav>