<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Jadwal Ekstrakurikuler</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($jadwal as $jw) { ?>
                        <?= form_open('Pembina/P_jadwal/update'); ?>

                        <label for="">Jenis Ekstrakurikuler</label><br>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $jw->id_jadwal ?>" id="id" name="id_jadwal">
                            <select name="id_ekskull" id="id_ekskull" class="custom-select col-lg-6">
                                <option value="" selected disabled>Pilih Jenis Ekstrakurikuler</option>
                                <?php foreach ($jenis as $j) : ?>
                                    <option  <?= $jw->id_ekskull == $j['id_ekskul'] ? 'selected' : ''; ?> <?= set_select('id_ekskull', $j['id_ekskul']) ?>  value="<?= $j['id_ekskul'] ?> " > <?= $j['nama_ekskul'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="username">Tanggal</label>
                                <input type="hidden" value="<?php echo $jw->id_jadwal ?>" id="id" name="id_jadwal">
                                <input type="date" class="form-control" id="tgl" value="<?php echo $jw->tgl ?>" name="tgl" placeholder="">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="username">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" value="<?php echo $jw->jam_mulai ?>" name="jam_mulai" placeholder="">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="username">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesai" value="<?php echo $jw->jam_selesai ?>" name="jam_selesai" placeholder="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="username">Tempat Latihan</label>
                            <input type="text" class="form-control col-lg-8" id="lokasi" value="<?php echo $jw->lokasi ?>" name="lokasi" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="username">deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder=""><?php echo $jw->deskripsi ?></textarea>
                        </div>


                        <div class="float-right">
                            <a href="<?= base_url('pembina/p_jadwal') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
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