<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
        alert('silahkan login terlebih dahulu!');
        document.location.href = 'login.php';
        </script>";
}

$title = 'Tambah Mahasiswa';
include 'layout/header.php';

if (isset($_POST['tambah'])) {
  if (create_data_mahasiswa($_POST) > 0) {
    echo "<script>
      alert('Data Mahasiswa Berhasil Ditambahkan');
      document.location.href = 'mahasiswa.php';
      </script>";
  } else {
    echo "<script>
      alert('Data Mahasiswa Gagal Ditambahkan');
      document.location.href = 'mahasiswa.php';
      </script>";
  }
}

?>

<div class="container my-5">
  <div class="card">
    <div class="card-header mb-2">
      <h5>Tambah Data Mahasiswa</h5>
    </div>
    <div class="card-body">
      <form action="tambah_mhs.php" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
          <label for="">Nama Mahasiswa</label>
          <input class="form-control" type="text" name="nama" placeholder="Nama Mahasiswa....." require>
        </div>
        <div class="row">
          <div class="form-group mb-3 col-6">
            <label for="">Prodi</label>
            <select name="prodi" id="prodi" class="form-control" require>
              <option value="">-- Pilih Prodi --</option>
              <option value="Informatika">Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Ilmu Komputer">Ilmu Komputer</option>
              <option value="Teknik Industri">Teknik Industri</option>
            </select>
          </div>
          <div class="form-group mb-3 col-6">
            <label for="">Semester</label>
            <select name="semester" id="semester" class="form-control" require>
              <option value="">-- Pilih Semester --</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="">No Hp</label>
          <input class="form-control" type="number" name="no_hp" placeholder="No Hp....." require>
        </div>
        <div class="form-group mb-3">
          <label for="">Email</label>
          <input class="form-control" type="email" name="email" placeholder="Email....." require>
        </div>
        <div class="form-group mb-3">
          <label for="">Foto</label>
          <input class="form-control" type="file" name="foto" placeholder="Foto....." onchange="previewImage()">

          <img src="" alt="" class="img-thumbnail img-preview" width="100px">
        </div>

        <div class="form-group mb-3 d-flex justify-content-end">
          <a href="mahasiswa.php" class="btn btn-secondary btn-md mr-1" type="button">Kembali</a>
          <input class="btn btn-md btn-primary" name="tambah" type="submit" value="Submit">
        </div>
      </form>
    </div>
    <!---preview image--->
    <script>
      function previewImage() {
        const fileInput = document.querySelector("input[type='file']");
        const reader = new FileReader();

        reader.onload = function() {
          const preview = document.querySelector(".img-preview");
          if (preview) {
            preview.src = reader.result;
          } else {
            const image = document.createElement("img");
            image.src = reader.result;
            image.classList.add("img-preview");
            image.style.width = "100px"; // Mengatur lebar gambar menjadi 100px
            image.style.height = "auto"; // Mengatur tinggi gambar secara proporsional
            document.body.appendChild(image);
          }
        };

        if (fileInput.files && fileInput.files[0]) {
          reader.readAsDataURL(fileInput.files[0]);
        }
      }

      // Memanggil fungsi previewImage saat peristiwa 'change' terjadi pada elemen input file
      document.querySelector("input[type='file']").addEventListener("change", previewImage);
    </script>
  </div>

  <?php
  include 'layout/footer.php';
  ?>