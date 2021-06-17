<ul class="nav">
    <li class="nav-item active">
        <a href="{{ route('home') }}">
            <i class="la la-dashboard"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('santri.index') }}">
            <i class="la la-table"></i>
            <p>Santri</p>
            <span class="badge badge-count">{{ App\Santri::count() }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('kategori.index') }}">
            <i class="la la-keyboard-o"></i>
            <p>Kategori</p>
            <span class="badge badge-count">{{ App\Kategori::count() }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('penilaian.index') }}">
            <i class="la la-th"></i>
            <p>Penilaian</p>
            <span class="badge badge-count">{{ App\Penilaian::count() }}</span>
        </a>
    </li>
</ul>