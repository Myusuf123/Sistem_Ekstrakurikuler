<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Data obat</h1> -->
    <div class="row justify-content-center mt-12">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pembina Ekstrakurikuler</h6>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <?= form_open_multipart('Profile/update'); ?>
                            <?php foreach ($prof as $p) { ?>
                                <div class="form-group">
                                    <label class="col-sm-10">NIS</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?= $users['nis']; ?>" id="nis" name="nis" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-10">Nama</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?= $users['nama']; ?>" id="nama" name="nama">

                                    </div>
                                </div>
                                <div class="row col-sm-10">
                                
                                <div class="form-group col-sm-4">
                                <label>Kelas</label>
                                    <div class="">
                                        <select name="kelas" id="kelas" class="custom-select">
                                            <option value="" selected disabled>Pilih Kelas</option>
                                            <?php foreach ($prof as $kel) : ?>
                                                <option <?= $p->kelas == $kel->kelas ? 'selected' : ''; ?> <?= set_select('kelas', $kel->kelas) ?> value="<?= $kel->kelas ?>"><?= $kel->kelas ?></option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                
                                <div class="form-group col-sm-4">
                                <label >Jurusan</label>
                                    <div class="">
                                        <select name="jurusan_id" id="jurusan_id" class="custom-select">
                                            <option value="" selected disabled>Pilih Jurusan</option>
                                            <?php foreach ($jurusan as $j) : ?>
                                                <option <?= $p->jurusan_id == $j['id_jurusan'] ? 'selected' : ''; ?> <?= set_select('jurusan_id', $j['id_jurusan']) ?> value="<?= $j['id_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('jurusan_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                
                                <div class="form-group col-sm-4">
                                <label>Jenis Kelamin</label>
                                    <div class="">
                                        <select name="gender" id="gender" class="custom-select">
                                            <option value="" selected disabled>Pilih Kelas</option>
                                            <?php foreach ($prof as $gender) : ?>
                                                <option <?= $p->gender == $gender->gender ? 'selected' : ''; ?> <?= set_select('gender', $gender->gender) ?> value="<?= $gender->gender ?>"><?= $gender->gender ?></option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                </div>
                                

                                
                                <div class="form-group">
                                    <label class="col-sm-10">No Telpon/WA</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" value="<?= $users['no_telp']; ?>" id="no_telp" name="no_telp">

                                    </div>
                                </div>

                                <div class="row col-sm-10">
                                    <label class="col-sm-10">Foto</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/profile/') . $users['foto']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div>
                                                    <input type="file" id="foto" name="foto">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-mt-4 justify-content-end ">
                                    <div class="col-sm-12">
                                    <div class="float-left">
                                        <a href="<?= base_url('Profile') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-tags"></i>
                                                Edit
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <?= form_close(); ?>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>