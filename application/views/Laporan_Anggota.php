<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Anggota</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <style>
    .line-title {
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>

</head>

<body>

<img src="assets/img/Lamteng.png" style=" float: left; position: absolute; width: 75px; height: auto;">
<img src="assets/img/kosong.jpg" style=" float: right; position: absolute; width: 75px; height: auto;">
<table style="width: 100%;">
  <tr>
    <td align="center">
      <span style="line-height: 1.1; font-size: 18px; font-family:'Times New Roman'; font-weight: bold;">&nbsp;&nbsp;&nbsp;
        PEMERINTAH KABUPATEN LAMPUNG TENGAH
      </span>

      <span style="line-height: 1.1; font-size: 14px; font-family:'Times New Roman'; font-weight: bold;">
        <br>KECAMATAN SEPUTIH RAMAN
        <br><i>KAMPUNG RUKTI HARJO</i>
      </span>

      <span style="line-height: 1.1; font-size: 11px;font-family:'Times New Roman';">
      <br>&nbsp;&nbsp;Alamat : Balai Kampung Rukti Harjo Kecamatan Seputih Raman 
        <br>&nbsp;&nbsp;Kabupaten Lampung Tengah Kode Pos 34155
      </span>
    </td>
  </tr>

  </table>

  <hr class="line-title">
  <?php
  $kalimat_new = strtoupper($namaekskul['nama_ekskul']);

  ?>
  <p align="center" style="font-weight: bold;">LAPORAN DATA ANGGOTA EKSTRAKURIKULER <?php echo $kalimat_new ?></p><br>
  <div class="table-responsive">
    <table class="table table-bordered">
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">NIS</th>
        <th class="text-center">NAMA SISWA</th>
        <th class="text-center">EKSTRAKURIKULER</th>
        <th class="text-center">KELAS</th>
        <th class="text-center">STATUS</th>
        <th class="text-center">PEMBINA</th>

      </tr>

      <?php
      $no = 1;
      foreach ($anggota as $ang) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td><?php echo $ang['nis'] ?></td>
          <td><?php echo $ang['nama'] ?></td>
          <td><?php echo $ang['nama_ekskul'] ?></td>
          <td><?php echo $ang['kelas'] ?>&nbsp;<?= $ang['nama_jurusan'] ?></td>
          <td><?php echo $ang['jabatan'] ?></td>
          <td><?php echo $ang['nama_g'] ?></td>
        </tr>

      <?php endforeach ?>

    </table>

  </div>
  <p style="float:right; text-align:center"> <br>
      Purbolinggo, <?php echo date("d-m-Y") ?> <br>
      Pembina Ekstrakurikuler <br> <br> <br> <br> <br>
      <?php echo $users['nama_g'] ?><br>
      <?php echo $users['nip_g'] ?>
 
    </p>
</body>

</html>