<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Pembina</h6>
        </div>
        <?php if ($this->session->flashdata('danger')) : ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('danger'); ?>
          </div>
        <?php endif; ?>
        <div class="card-body">

          <?= form_open('Admin/Datapembina/tambah_aksi'); ?>


          <div class="row form-group">
            <label for="nama" class="col-md-4 text-md-right ">Nip</label>
            <div class="col-lg-7">
              <input type="number" class="form-control " id="nip" placeholder="" name="nip">
              <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>


          <div class="row form-group">
            <label for="username" class="col-md-4 text-md-right ">Nama Pembina</label>
            <div class="col-lg-7">
              <input type="text" class="form-control " id="nama_g" name="nama_g" placeholder="">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

          </div>

          <div class="row form-group">
            <label for="username" class="col-md-4 text-md-right ">No. Telp</label>
            <div class="col-lg-7">
              <input type="number" class="form-control " id="nohp" name="nohp" placeholder="">
              <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>

            <!-- <div class="form-group col-lg-6">
              <label for="">Jenis Ekstrakurikuler</label>
              <select name="k_ekskul" id="k_ekskul" class="custom-select ">
                <option value="" selected disabled>Pilih Jenis Ekstrakurikuler</option>
                <?php foreach ($jenis as $j) : ?>
                  <option <?= set_select('k_ekskul', $j['kode_ekskul']) ?> value="<?= $j['kode_ekskul'] ?>"><?= $j['nama_ekskul'] ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('k_ekskul', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
                -->

            <br>
            <div class="float-right">
              <a href="<?= base_url('Admin/Datapembina') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
              <button type="submit" class="btn btn-primary">Submit</button>

            </div>
            <?= form_close(); ?>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>