<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
        alert('silahkan login terlebih dahulu!');
        document.location.href = 'login.php';
        </script>";
}

include 'layout/header.php';

$id_data_pertemuan = $_GET['id_data_pertemuan'];

if (delete_data($id_data_pertemuan) > 0) {
  echo "<script>
        alert('Data Pertemuan Berhasil Dihapus');
        document.location.href = 'index.php';
        </script>";
} else {
  echo "<script>
        alert('Data Pertemuan Gagal Dihapus');
        document.location.href = 'index.php';
        </script>";
}
