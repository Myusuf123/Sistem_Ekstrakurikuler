<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row justify-content-center">
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Ekstrakurikuler</h6>
        </div>
        <?php if ($this->session->flashdata('danger')) : ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('danger'); ?>
          </div>
        <?php endif; ?>
        <div class="card-body">
          <div class="card mb-4">
            <div class="card-header py-3">
              <label><i class="fa fa-info"></i> Informasi</label>
              <h6>* Format Penulisan Periode/Tahun Ajaran :
                <br><b>  Contoh : 2022/2023</b>
              </h6>
              <br>
              <h6>* Format Penulisan Nama Ekstrakurikuler Awal Kata Menggunakan <b>Huruf Kapital</b> :
                <br><b>Contoh : Sepak Bola</b>
              </h6>
            </div>
          </div>
          <?= form_open('Admin/Dataekskul/tambah_aksi'); ?>


          <div class="row form-group">
            <label for="username" class="col-md-5 text-md-right ">Nama Ekstrakurikuler</label>
            <div class="col-lg-7">
              <input type="text" class="form-control " id="nama_ekskul" name="nama_ekskul" placeholder="">
              <?= form_error('nama_ekskul', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

          </div>

          <div class="row form-group">
            <label for="username" class="col-md-5 text-md-right ">Periode/Tahun Ajaran</label>
            <div class="col-lg-7">
              <input type="text" class="form-control " id="tahunajaran" name="tahunajaran" placeholder="">
              <?= form_error('tahunajaran', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-md-5 text-md-right ">Pilih Pembina</label><br>
            <div class="col-lg-7">
              <select name="nip_g" id="nip_g" class="custom-select">
                <option value="" selected disabled>Pilih Pembina</option>
                <?php foreach ($pembina as $p) : ?>
                  <option <?= set_select('nip_g', $p['nip']) ?> value="<?= $p['nip'] ?>"><?= $p['nama_g'] ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('nip_g', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>



          <div class="float-right">
            <a href="<?= base_url('Admin/Dataekskul') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>

          </div>
          <?= form_close(); ?>


        </div>
      </div>
    </div>
  </div>
</div>
</div>