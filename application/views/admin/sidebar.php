<ul class="navbar-nav bg-pastel sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-globe-asia"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><b>SIWI</b> KODE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?=$page == 'home' ? 'active' : ''?>">
        <a class="nav-link" href="<?=base_url('admin/home')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dasbor</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola
    </div>

    <li class="nav-item <?=$page == 'wisata' && (isset($jenis) && $jenis == 'rekreasi') ? 'active' : ''?>">
        <a class="nav-link" href="<?=base_url('admin/home/wisata')?>">
            <i class="fas fa-fw fa-suitcase"></i>
            <span>Wisata Rekreasi</span></a>
    </li>

    <li class="nav-item <?=$page == 'wisata' && (isset($jenis) && $jenis == 'kuliner') ? 'active' : ''?>">
        <a class="nav-link" href="<?=base_url('admin/home/wisata/kuliner')?>">
            <i class="fas fa-fw fa-utensils"></i>
            <span>Wisata Kuliner</span></a>
    </li>

    <li class="nav-item <?=$page == 'testimoni' ? 'active' : ''?>">
        <a class="nav-link" href="<?=base_url('admin/home/testimoni')?>">
            <i class="fas fa-fw fa-feather-alt"></i>
            <span>Testimoni</span></a>
    </li>

    <?php if($this->session->userdata('user')->role == 'superadmin'): ?>
    <!-- Nav Item - Charts -->
    <li class="nav-item <?=$page == 'users' ? 'active' : ''?>">
        <a class="nav-link" href="<?=base_url('admin/home/users')?>">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
    </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>