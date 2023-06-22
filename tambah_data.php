<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
        alert('silahkan login terlebih dahulu!');
        document.location.href = 'login.php';
        </script>";
}

$title = 'Tambah Pertemuan';
include 'layout/header.php';

if (isset($_POST['tambah'])) {
  if (create_data_pertemuan($_POST) > 0) {
    echo "<script>
      alert('Data Pertemuan Berhasil Ditambahkan');
      document.location.href = 'index.php';
      </script>";
  } else {
    echo "<script>
      alert('Data Pertemuan Gagal Ditambahkan');
      document.location.href = 'index.php';
      </script>";
  }
}

?>

<!-- DataTables -->
<div class="container my-5">
  <div class="card">
    <div class="card-header mb-2">
      <h5>Tambah Data Pertemuan</h5>
    </div>
    <div class="card-body">
      <form action="tambah_data.php" method="post">
        <div class="form-group mb-3">
          <label for="">Judul Pertemuan</label>
          <input class="form-control" type="text" name="judul_pertemuan" placeholder="Judul....." require>
        </div>
        <div class="form-group mb-3">
          <label for="">Isi Pertemuan</label>
          <input class="form-control" type="text" name="isi_pertemuan" placeholder="Isi....." require>
        </div>
        <div class="form-group mb-3">
          <label for="">Waktu Pertemuan</label>
          <input class="form-control" type="datetime-local" name="waktu_pertemuan" placeholder="Waktu....." require>
        </div>

        <div class="form-group mb-4 d-flex justify-content-end">
          <a href="index.php" class="btn btn-secondary btn-md mr-1" type="button">Kembali</a>
          <input class="btn btn-md btn-primary" name="tambah" type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>

  <?php 
  include 'layout/footer.php'; 
  ?>