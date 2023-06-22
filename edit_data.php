<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
        alert('silahkan login terlebih dahulu!');
        document.location.href = 'login.php';
        </script>";
}

$title = 'Edit Pertemuan';
include 'layout/header.php';

if (isset($_POST['ubah'])) {
  if (ubah_data_pertemuan($_POST) > 0) {
    echo "<script>
      alert('Data Berhasil Diubah');
      document.location.href = 'index.php';
      </script>";
  } else {
    echo "<script>
      alert('Data Gagal Diubah');
      document.location.href = 'index.php';
      </script>";
  }
}

?>
<div class="container my-5">
  <div class="card">
    <div class="card-header mb-2">
      <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h5>Edit Pertemuan</h5>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Data Pertemuan</a></li>
          <li class="breadcrumb-item active">Edit Data Pertemuan</li>
        </ol>
      </div>
    </div>

    <?php
    $id_data_pertemuan = $_GET['id_data_pertemuan'];
    $sql = "SELECT * FROM `data_pertemuan` WHERE id_data_pertemuan = '$id_data_pertemuan' LIMIT 1";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="card-body">
      <form action="" method="post">
        <div class="form-group mb-3">
          <label for="">Judul Pertemuan</label>
          <input class="form-control" type="text" name="judul_pertemuan" require value=" <?php echo $row['judul_pertemuan'] ?>">
        </div>
        <div class="form-group mb-3">
          <label for="">Isi Pertemuan</label>
          <input class="form-control" type="text" name="isi_pertemuan" require value="<?php echo $row['isi_pertemuan'] ?>">
        </div>
        <div class="form-group mb-3">
          <label for="">Waktu Pertemuan</label>
          <input class="form-control" type="datetime-local" name="waktu_pertemuan" require value="<?php echo $row['waktu_pertemuan'] ?>">
        </div>

        <div class="form-group mb-3 d-flex justify-content-end">
          <input class="btn btn-md btn-primary" name="ubah" type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>
  <?php
  include 'layout/footer.php';
  ?>
</div>