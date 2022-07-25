<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">


  <div class="col-md-8">
    <div class="card shadow mb-4">

      <div class="card-header py-3">
        <label><i class="fa fa-user"></i>&nbsp;<B>KETUA EKSTRAKURIKULER</B></label>
        
          <div class=""><a href="<?= base_url('Pembina/P_dataanggota/') ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a></div>
      </div>

      <div class="card-body">


        <?php if ($this->session->flashdata('succses')) : ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('succses'); ?>
                    </div>
                <?php endif; ?>
        <div class="table-responsive">
        <?php if ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                <?php endif; ?>

          <table class="table table-bordered" width="100%" cellspacing="0">

            <thead>
              <tr>

                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nis</th>
                <th scope="col" class="text-center">Nama Siswa</th>
                <th scope="col" class="text-center">Kelas</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <?php if (empty($total_ketua)) : ?>
            <tfoot>
              <tr>
                <th colspan="6">     <div class="alert alert-warning">
            Belum Ada Ketua Ekstrakurikuler
          </div></th>
              </tr>

            
     

        <?php endif; ?>

            <tbody>

              <?php
              $no = 1;
              foreach ($ketua as $ket) { ?>
              
                <tr>
                  
                  <td><?= $no++ ?></td>
                  <td><?= $ket['nis']; ?></td>
                  <td><?= $ket['nama']; ?></td>
                  <td><?= $ket['kelas']; ?>&nbsp;<?= $ket['nama_jurusan']; ?></td>
                  <td> <?php                    
                    if ($ket['status'] == 'Selesai') { ?>
                    <span class="badge alert-warning"><?php echo 'PERIODE SELESAI' ?></span>
                    <?php } else{ ?>
                      <span class="badge alert-success"><?= $ket['jabatan']; ?></span></td>
                      <?php } ?></td>
                  <td>
                  <?php
                    if ($ket['status'] == 'Selesai') { ?>
                    
                    <?php } else{ ?>
                    <a href="<?= base_url('pembina/p_dataanggota/hapusketua/' . $ket['id_pendaftaran']) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus Ketua</a>
                    <a href="<?= base_url('pembina/p_dataanggota/selesai/' . $ket['id_pendaftaran']) ?>" onclick="return confirm('Yakin ingin merubah status menjadi selesai?')" class="btn btn-info btn-sm"><i class="fa fa-check"></i>&nbsp;&nbsp;Selesai</a>
                    <?php } ?>
                  </td>
                </tr>
              <?php } ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>


<div class="col-md-12">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <label><B>Anggota Ekstrakurikuler <?= $namaekskul['nama_ekskul'] ?> (<?= $namaekskul['tahunajaran'] ?>) </B></label>
    </div>
    <div class="row no-gutters">
      <div class="table-responsive">

    

        <div class="card-body">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>

                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nis</th>
                <th scope="col" class="text-center">Nama Siswa</th>
                <th scope="col" class="text-center">Kelas</th>
                <th scope="col" class="text-center">Gender</th>
                <th scope="col" class="text-center">No Telpon</th>
                <th scope="col" class="text-center">Jenis Eksktrakurikuler</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Foto</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th colspan="10">Total Anggota <?= $namaekskul['nama_ekskul'] ?> = <?php echo $total_ekskul ?> </th>
              </tr>

              <tbody>
                <?php
                $no = 1;
                foreach ($anggota as $ang) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $ang['nis']; ?></td>
                    <td><?= $ang['nama']; ?></td>
                    <td><?= $ang['kelas']; ?> &nbsp;<?= $ang['nama_jurusan']; ?></td>
                    <td><?= $ang['gender']; ?></td>
                    <td><?= $ang['no_telp']; ?></td>
                    <td><?= $ang['nama_ekskul']; ?></td>
                    <td><?php
                      if ($ang['status'] == 'Selesai') { ?>
                    <span class="badge alert-warning"><?php echo 'PERIODE SELESAI' ?></span>
                    <?php } else{ ?>
                      <span class="badge alert-success"><?= $ang['jabatan']; ?></span></td>
                      <?php } ?>
                    <td><img width="100px" height="130px" src="<?= base_url() ?>assets/profile/<?= $ang['foto']; ?>"></td>
                    <td>
                    <?php
                    if ($ang['status'] == 'Selesai') { ?>
                    
                    <?php } else{ ?>
                                                
                      <?php if (empty($total_ketua)) : ?>
                        <a href="<?= base_url('pembina/p_dataanggota/tambahketua/' . $ang['id_pendaftaran']) ?>" onclick="return confirm('jadikan ketua?')" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ketua</a>
                      <?php endif; ?>
                      <a href="<?= base_url('pembina/p_dataanggota/hapus/' . $ang['id_pendaftaran']) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus Anggota</a>
                      <a href="<?= base_url('pembina/p_dataanggota/selesai/' . $ang['id_pendaftaran']) ?>" onclick="return confirm('Yakin ingin merubah status menjadi selesai?')" class="btn btn-info btn-sm"><i class="fa fa-check"></i>&nbsp;&nbsp;Selesai</a>
                    </td>
                  </tr>
                  <?php } ?>
                <?php } ?>
                
              </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

  <!-- End of Main Content -->