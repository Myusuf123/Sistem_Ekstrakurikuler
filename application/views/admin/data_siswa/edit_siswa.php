<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Siswa</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($ketua as $k) { ?>
                        <?= form_open('Admin/Dataanggota/update'); ?>

                        <div class="form-group">
                            <label for="username">NIS</label>
                            <input type="text" class="form-control col-lg-7" value="<?php echo $k->nis ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Nama Siswa</label>
                            <input type="hidden" value="<?php echo $k->nis ?>" id="nis" name="nis">
                            <input type="text" class="form-control col-lg-7" id="nama" value="<?php echo $k->nama ?>" name="nama" placeholder="">
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-5">
                                <label for="username">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="custom-select">
                                    <?php foreach ($ketua as $gender) : ?>
                                        <option value="" selected disabled>Pilih Kelas</option>
                                        <option <?= $k->gender == $gender->gender ? 'selected' : ''; ?> <?= set_select('gender', $gender->gender) ?> value="<?= $gender->gender ?>"><?= $gender->gender ?></option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>



                            <div class="form-group col-lg-3">
                                <label for="">Kelas</label>
                                <select name="kelas" id="kelas" class="custom-select">
                                    <?php foreach ($ketua as $ket) : ?>
                                        <option value="" selected disabled>Pilih Kelas</option>
                                        <option <?= $k->kelas == $ket->kelas ? 'selected' : ''; ?> <?= set_select('kelas', $ket->kelas) ?> value="<?= $ket->kelas ?>"><?= $ket->kelas ?></option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="form-group col-lg-3">
                                <label for="">Jurusan</label>
                                <select name="jurusan_id" id="jurusan_id" class="custom-select">
                                    <option value="" selected disabled>Pilih Jurusan</option>
                                    <?php foreach ($jurusan as $jur) : ?>
                                        <option <?= $k->jurusan_id == $jur['id_jurusan'] ? 'selected' : ''; ?> <?= set_select('jurusan_id', $jur['id_jurusan']) ?> value="<?= $jur['id_jurusan'] ?>"><?= $jur['nama_jurusan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">No Telpon/WA</label>
                            <input type="text" class="form-control col-lg-7" value="<?php echo $k->no_telp ?>" name="no_telp" placeholder="">
                        </div>


                        <div class="float-right">
                            <a href="<?= base_url('Admin/Dataanggota/siswa') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
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