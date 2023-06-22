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

$id_akun = $_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
  echo "<script>
        alert('Data Akun Berhasil Dihapus');
        document.location.href = 'akun.php';
        </script>";
} else {
  echo "<script>
        alert('Data Akun Gagal Dihapus');
        document.location.href = 'akun.php';
        </script>";
}
