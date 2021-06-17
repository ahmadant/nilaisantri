<ul class="nav">
    <li class="nav-item active">
        <a href="<?php echo e(route('home')); ?>">
            <i class="la la-dashboard"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('santri.index')); ?>">
            <i class="la la-table"></i>
            <p>Santri</p>
            <span class="badge badge-count"><?php echo e(App\Santri::count()); ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('kategori.index')); ?>">
            <i class="la la-keyboard-o"></i>
            <p>Kategori</p>
            <span class="badge badge-count"><?php echo e(App\Kategori::count()); ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('penilaian.index')); ?>">
            <i class="la la-th"></i>
            <p>Penilaian</p>
            <span class="badge badge-count"><?php echo e(App\Penilaian::count()); ?></span>
        </a>
    </li>
</ul>