<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
        alert('silahkan login terlebih dahulu!');
        document.location.href = 'login.php';
        </script>";
}

$title = 'Detail Mahasiswa';
include 'layout/header.php';

//mengambil id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = select("SELECT * FROM data_mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
?>

<div class="container my-5">
  <div class="card">
    <div class="card-header">
      <h4>
        <center>Data <?= $mahasiswa['nama']; ?></center>
      </h4>
    </div>
    <div class="card-body">
      <div class="table">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <tr>
              <td>Nama</td>
              <td>: <?= $mahasiswa['nama']; ?></td>
            </tr>
            <tr>
              <td>Prodi</td>
              <td>: <?= $mahasiswa['prodi']; ?></td>
            </tr>
            <tr>
              <td>Semester</td>
              <td>: <?= $mahasiswa['semester']; ?></td>
            </tr>
            <tr>
              <td>No Hp</td>
              <td>: <?= $mahasiswa['no_hp']; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td>: <?= $mahasiswa['email']; ?></td>
            </tr>
            <tr>
              <td width="40%">Foto</td>
              <td>
                <a href="assets/img/<?= $mahasiswa['foto']; ?>">
                  <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto diri" width="50%">
                </a>
              </td>
            </tr>

          </table>
          <a href="mahasiswa.php" class="btn btn-secondary btn-sm text-white" type="button" style="float: right;">Kembali</a>
        </div>
      </div>
    </div>
  </div>
  <?php
  include 'layout/footer.php';
  ?>
</div>