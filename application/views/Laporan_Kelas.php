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

  <img src="assets/img/smansa.png" style="float: right; position: absolute; width: 100px; height: auto;">
  <img src="assets/img/Lampung.png" style=" float: left; position: absolute; width: 75px; height: auto;">

  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.1; font-size: 18px; font-family:'Times New Roman'; font-weight: bold;">
          PEMERINTAH PROVINSI LAMPUNG

        </span>

        <span  style="line-height: 1.1; font-size: 14px; font-family:'Times New Roman'; font-weight: bold;">
          <br>&nbsp;&nbsp;&nbsp;&nbsp;DINAS PENDIDIKAN DAN KEBUDAYAAN
          <br>&nbsp;&nbsp;&nbsp;&nbsp;<i>SMA NEGERI 1 PURBOLINGGO LAMPUNG TIMUR</i>
          <br>&nbsp;&nbsp;&nbsp;&nbsp;<i>AKREDITASI A</i>
          <br>&nbsp;&nbsp;&nbsp;&nbsp;<i>NSS : 30 11 20 41 20 02, NPSN : 10 80 60 90</i>
        </span>

        <span style="line-height: 1.1; font-size: 11px;font-family:'Times New Roman';">
          <br>&nbsp;&nbsp;&nbsp;&nbsp;Alamat : Jln. KH. Dewantara KM. 02, Tanjung Intan, Purbolinggo, Lampung Timur,KP.34192
          <br>&nbsp;&nbsp;&nbsp;&nbsp;Tlp. (0725) 7631222, Email : smansapurbolinggo@gmail.com, smanpurbolinggo.blogspot.com
        </span>
      </td>
    </tr>

  </table>

  <hr class="line-title">

  <p align="center" style="font-weight: bold;">LAPORAN DATA ANGGOTA EKSTRAKURIKULER KELAS <?php echo $namakelas['kelas'] ?> <?php echo $jurusan['nama_jurusan'] ?></p><br>
  <div class="table-responsive">
  <table class="table table-bordered">
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">NIS</th>
        <th class="text-center">NAMA SISWA</th>
        <th class="text-center">EKSTRAKURIKULER</th>
        <th class="text-center">KELAS</th>
        <th class="text-center">STATUS</th>

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
        </tr>

      <?php endforeach ?>

    </table>
  </div>
  <p style="float:right; text-align:center"> <br>
      Purbolinggo, <?php echo date("d-m-Y") ?> <br>
      Kepala Sekolah <br> <br> <br> <br> <br>
      ( &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )<br>
      ( &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )
 
    </p>


</body>

</html>