<?php
session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
        alert('silahkan login terlebih dahulu!');
        document.location.href = 'login.php';
        </script>";
}

$title = 'Edit Mahasiswa';
include 'layout/header.php';

if (isset($_POST['edit'])) {
  if (update_data_mahasiswa($_POST) > 0) {
    echo "<script>
      alert('Data Mahasiswa Berhasil Diedit');
      document.location.href = 'mahasiswa.php';
      </script>";
  } else {
    echo "<script>
      alert('Data Mahasiswa Gagal Diedit');
      document.location.href = 'mahasiswa.php';
      </script>";
  }
}

?>

<div class="container my-5">
  <div class="card">
    <div class="card-header mb-2">
      <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h5>Edit Data Mahasiswa</h5>
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="mahasiswa.php">Data Mahasiswa</a></li>
          <li class="breadcrumb-item active">Edit Data Mahasiswa</li>
        </ol>
      </div>
    </div>
    <?php
    $id_mahasiswa = (int)$_GET['id_mahasiswa'];

    // //query ambil data mahasiswa
    $data_mahasiswa = select("SELECT * FROM data_mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    ?>
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_mahasiswa" value="<?= $data_mahasiswa['id_mahasiswa']; ?>">
        <input type="hidden" name="fotoLama" value="<?= $data_mahasiswa['foto']; ?>">
        <div class="form-group mb-3">
          <label for="">Nama Mahasiswa</label>
          <input class="form-control" type="text" name="nama" placeholder="Nama Mahasiswa....." require value="<?= $data_mahasiswa['nama']; ?>">
        </div>
        <div class="row">
          <div class="form-group mb-3 col-6">
            <label for="">Prodi</label>
            <select name="prodi" id="prodi" class="form-control" require>
              <?php $prodi = $data_mahasiswa['prodi']; ?>
              <option value="Informatika" <?= $prodi == 'Informatika' ? 'selected' : null ?>>Informatika</option>
              <option value="Sistem Informasi" <?= $prodi == 'Sistem Informasi' ? 'selected' : null ?>>Sistem Informasi</option>
              <option value="Ilmu Komputer" <?= $prodi == 'Ilmu Komputer' ? 'selected' : null ?>>Ilmu Komputer</option>
              <option value="Teknik Industri" <?= $prodi == 'Teknik Industri' ? 'selected' : null ?>>Teknik Industri</option>
            </select>
          </div>
          <div class="form-group mb-3 col-6">
            <label for="">Semester</label>
            <select name="semester" id="semester" class="form-control" require>
              <?php $semester = $data_mahasiswa['semester']; ?>
              <option value="1" <?= $semester == '1' ? 'selected' : null ?>>1</option>
              <option value="2" <?= $semester == '2' ? 'selected' : null ?>>2</option>
              <option value="3" <?= $semester == '3' ? 'selected' : null ?>>3</option>
              <option value="4" <?= $semester == '4' ? 'selected' : null ?>>4</option>
              <option value="5" <?= $semester == '5' ? 'selected' : null ?>>5</option>
              <option value="6" <?= $semester == '6' ? 'selected' : null ?>>6</option>
              <option value="7" <?= $semester == '7' ? 'selected' : null ?>>7</option>
              <option value="8" <?= $semester == '8' ? 'selected' : null ?>>8</option>
            </select>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="">No Hp</label>
          <input class="form-control" type="number" name="no_hp" placeholder="No Hp....." require value="<?= $data_mahasiswa['no_hp']; ?>">
        </div>
        <div class="form-group mb-3">
          <label for="">Email</label>
          <input class="form-control" type="email" name="email" placeholder="Email....." require value="<?= $data_mahasiswa['email']; ?>">
        </div>
        <div class="form-group mb-3">
          <label for="">Foto</label>
          <input class="form-control" type="file" name="foto" placeholder="Foto....." onchange="previewImage()">
          <img src="assets/img/<?= $data_mahasiswa['foto']; ?>" alt="" class="img-thumbnail img-preview" width="100px">
        </div>

        <div class="form-group mb-3 d-flex justify-content-end">
          <input class="btn btn-md btn-primary" name="edit" type="submit" value="Edit">
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
</div>