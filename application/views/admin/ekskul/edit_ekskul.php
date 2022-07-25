<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Ektrakurikuler</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($ekskul as $e) { ?>
                        <?= form_open('Admin/Dataekskul/update'); ?>

                        <div class="row form-group">
                            <label for="username" class="col-md-5 text-md-right ">Nama Ekstrakurikuler</label>
                            <div class="col-lg-7">
                                <input type="hidden" class="form-control " id="id_ekskul" value="<?php echo $e->id_ekskul ?>" name="id_ekskul" placeholder="">
                                <input type="text" class="form-control " id="nama_ekskul" value="<?php echo $e->nama_ekskul ?>" name="nama_ekskul" placeholder="">
                                <?= form_error('nama_ekskul', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <label for="username" class="col-md-5 text-md-right ">Periode/Tahun Ajaran</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control " id="tahunajaran" value="<?php echo $e->tahunajaran ?>" name="tahunajaran" placeholder="">
                                <?= form_error('tahunajaran', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-5 text-md-right ">Pilih Pembina</label><br>
                            <div class="col-lg-7">
                                <select name="nip_g" id="nip_g" class="custom-select col-lg-10">
                                    <option value="" selected disabled>Pilih Jenis Ekstrakurikuler</option>
                                    <?php foreach ($pembina as $p) : ?>
                                        <option <?= $e->nip_g == $p['nip'] ? 'selected' : ''; ?> <?= set_select('nip_g', $p['nip']) ?> value="<?= $p['nip'] ?>"><?= $p['nama_g'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <?= form_error('nip_g', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>


                        <div class="float-right">
                            <a href="<?= base_url('Admin/Dataekskul') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>

                        </div>
                        <?= form_close(); ?>
                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
</div>
</div>