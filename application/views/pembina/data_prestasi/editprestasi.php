<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Prestasi Ekstrakurikuler</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($prestasi as $p) { ?>
                        <?= form_open('Pembina/P_prestasi/update'); ?>
                        <div class="row">
                            <div class="form-group col-lg-4 ">
                                <label for="">Jenis Ekstrakurikuler</label><br>
                                <input type="hidden" value="<?php echo $p->id_prestasi ?>" id="id_prestasi" name="id_prestasi">
                                <select name="ekskull_id" id="ekskull_id" class="custom-select ">
                                    <option value="" selected disabled>Pilih Ekstrakurikuler</option>
                                    <?php foreach ($jenis as $j) : ?>
                                        <option <?= $p->ekskull_id == $j['id_ekskul'] ? 'selected' : ''; ?> <?= set_select('id_ekskull', $j['id_ekskul']) ?> value="<?= $j['id_ekskul'] ?>"><?= $j['nama_ekskul'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="username">Tanggal</label>
                                <input type="hidden" value="<?php echo $p->id_prestasi ?>" id="id" name="id_prestasi">
                                <input type="date" class="form-control " id="tgl_lomba" value="<?php echo $p->tgl_lomba ?>" name="tgl_lomba" placeholder="">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="username">deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder=""><?php echo $p->deskripsi ?></textarea>
                        </div>


                        <div class="float-right">
                            <a href="<?= base_url('Pembina/P_prestasi') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                        <?= form_close(); ?>
                    <?php } ?>


                </div>
            </div>

        
        </div>
        </div>
    </div>
</div>