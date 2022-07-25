        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home'); ?>">
                <div class="sidebar-brand-icon">
                    <img width="50px" height="50px" src="<?= base_url() ?>assets/img/smansa.png" />
                </div>
                <div class="sidebar-brand-text mx-3">Siskul SmansaGo</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if ($this->session->userdata('akses') == 'admin') : ?>
                <div class="sidebar-heading">
                    <font color="white"> Administrator</font>
                </div>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses') == 'pembina') : ?>
                <div class="sidebar-heading">
                    <font color="white">Pembina Ekstrakurikuler</font>
                </div>
            <?php endif; ?>
            <?php if ($this->session->userdata('akses') == 'ketua') : ?>
                <div class="sidebar-heading">
                    <font color="white"> Ketua Ekstrakurikuler</font>
                </div>
            <?php endif; ?>
            <?php if ($this->session->userdata('akses') == 'anggota') : ?>
                <div class="sidebar-heading">
                    <font color="white"> Siswa/Anggota</font>
                </div>
            <?php endif; ?>
            <?php if ($this->session->userdata('akses') == 'admin' or $this->session->userdata('akses') == 'pembina' or $this->session->userdata('akses') == 'anggota') : ?>
                <!-- Nav Item - Dashboard -->

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('home'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if ($this->session->userdata('akses') == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/Jurusan'); ?>">
                        <i class="fas fa-fw fa-university"></i>
                        <span>Data Jurusan</span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses') == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data User</span>
                    </a>
                    <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <!-- header
                                <h6 class="collapse-header">Custom Utilities:</h6> -->
                            <a class="collapse-item" href="<?= base_url('Admin/Datapembina'); ?>">Data Pembina Ekskul</a>
                            <a class="collapse-item" href="<?= base_url('Admin/Dataanggota/siswa'); ?>">Data Seluruh Siswa</a>
                            <!--<a class="collapse-item" href="<?= base_url('Admin/Dataanggota'); ?>">Data Siswa (Anggota)</a>
                            <a class="collapse-item" href="<?= base_url('Admin/Dataanggota/getketua'); ?>">Data Ketua Ekskul</a>
            -->

                        </div>
                    </div>
                </li>
            <?php endif; ?>


            <?php if ($this->session->userdata('akses') == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/Dataekskul'); ?>">
                        <i class="fas fa-fw fa-futbol"></i>
                        <span>Ekstrakurikuler</span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses') == 'pembina') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Pembina/P_dataekskul'); ?>">
                        <i class="fas fa-fw fa-futbol"></i>
                        <span>Ekstrakurikuler</span></a>
                </li>
            <?php endif; ?>



            <?php if ($this->session->userdata('akses') == 'anggota') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Siswa/Registrasi'); ?>">
                        <i class="fas fa-fw fa-futbol"></i>
                        <span>My Ekstrakurikuler</span></a>
                </li>
            <?php endif; ?>
            <?php if ($this->session->userdata('akses') == 'anggota') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Siswa/C_siswa'); ?>">
                        <i class="fas fa-fw fa-calendar"></i>
                        <span>Jadwal Kegiatan</span></a>
                </li>
            <?php endif; ?>
            <?php if ($this->session->userdata('akses') == 'anggota') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Siswa/C_siswa/prestasi'); ?>">
                        <i class="fas fa-fw fa-trophy"></i>
                        <span>Data Prestasi</span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses') == 'pembina') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Pembina/P_dataanggota/tampilsiswa'); ?>">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Data Seluruh Siswa</span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses') == 'pembina') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Pembina/P_pendaftaran'); ?>">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Pendaftaran Anggota</span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses') == 'pembina') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Pembina/P_dataanggota'); ?>">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Anggota Ekstrakurikuler</span></a>
                </li>
            <?php endif; ?>



            <!-- Heading -->
            <!-- tulisan diatas menu
                <div class="sidebar-heading">
                    Interface
                </div> -->

            <?php if ($this->session->userdata('akses') == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/ambil_ekskul'); ?>">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Anggota Ekstrakurikuler</span></a>
                </li>
            <?php endif; ?>
            <?php if ($this->session->userdata('akses') == 'ketua') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('ketua/ambil_ekskul'); ?>">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Anggota Ekstrakurikuler</span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses') == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/jadwal/'); ?>">
                        <i class="fas fa-fw fa-calendar"></i>
                        <span>Jadwal Kegiatan</span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses') == 'pembina') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Pembina/P_jadwal/'); ?>">
                        <i class="fas fa-fw fa-calendar"></i>
                        <span>Jadwal Kegiatan</span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses') == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/C_prestasi'); ?>">
                        <i class="fas fa-fw fa-trophy"></i>
                        <span>Data Prestasi</span></a>
                </li>
            <?php endif; ?>
            <?php if ($this->session->userdata('akses') == 'pembina') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Pembina/P_prestasi'); ?>">
                        <i class="fas fa-fw fa-trophy"></i>
                        <span>Data Prestasi</span></a>
                </li>
            <?php endif; ?>
            <?php if ($this->session->userdata('akses') == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Cetak/tampil_ekskul'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Cetak Laporan</span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses') == 'pembina') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Cetak/tampil_ekskul_pembina'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Cetak Laporan</span></a>
                </li>
            <?php endif; ?>

            <!--<?php if ($this->session->userdata('akses') == 'admin' or $this->session->userdata('akses') == 'pembina') : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Cetak Laporan</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded"> -->
            <!-- header
                                <h6 class="collapse-header">Custom Utilities:</h6> -->
            <!--  <a class="collapse-item" href="<?= base_url('Cetak/ekskul_kelas'); ?>">Anggota Perkelas</a>
                            <a class="collapse-item" href="<?= base_url('Cetak/tampil_ekskul'); ?>">Anggota Ekstrakurikuler</a>

                        </div>
                    </div>
                </li>
            <?php endif; ?> -->


            <?php if ($this->session->userdata('akses') == 'ketua') : ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/Dataekskul'); ?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Data Ekstrakurikuler</span></a>

                </li>
            <?php endif; ?>


            <!-- Nav Item - Utilities Collapse Menu -->




            <!-- Heading
                  <div class="sidebar-heading">
                Addons
            </div>
                -->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->