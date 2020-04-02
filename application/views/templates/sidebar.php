 <!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
    <img src="<?= base_url('assets/') ?>/img/default.jpg" class="card-img" alt="">
    </div>
    <ul class="list-unstyled components">
    <li class="active">
        <a href="<?= base_url() ?>"><i class="fas fa-tachometer-alt mr-2"></i>Profile</a>
    </li>
    <li>
        <a href="<?= base_url('karyawan') ?>"><i class="fas fa-user mr-2"></i>Karyawan</a>
    </li>
    <li>
        <a href="<?= base_url('jabatan') ?>"><i class="fas fa-user mr-2"></i>Jabatan</a>
    </li>
    <li>
        <a href="<?= base_url('aturan_gaji') ?>"><i class="fas fa-edit mr-2"></i>Aturan Gaji</a>
    </li>
    <li>    
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-money-bill mr-2"></i> Gaji</a>
        <ul class="collapse list-unstyled" id="pageSubmenu">
        <li>
            <a href="<?= base_url('gaji') ?>"><i class="fas fa-money-check-alt mr-2"></i>Penggajian</a>
            <a href="<?= base_url('gaji/laporan') ?>"><i class="fas fa-folder-open mr-2"></i>Laporan</a>
        </li>
        </ul>
    </li>

    <!-- <li>
        
    </li> -->
    <ul class="list-unstyled CTAs">
    <li>
        <a href="#" class="logout">Logout <i class="fas fa-sign-out-alt"></i> </a>
    </li>
    </ul>
</nav>