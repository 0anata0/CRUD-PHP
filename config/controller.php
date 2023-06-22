<?php
include 'koneksi.php';

function select($query){
  global $db;

  $result = mysqli_query($db, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}

//fungsi tambah_dataPertemuan
function create_data_pertemuan($post){
    global $db;
    $judul_pertemuan  = strip_tags($post['judul_pertemuan']);
    $isi_pertemuan    = strip_tags($post['isi_pertemuan']);
    $waktu_pertemuan  = strip_tags($post['waktu_pertemuan']);

    $query = "INSERT INTO `data_pertemuan` VALUES(null, '$judul_pertemuan', '$isi_pertemuan','$waktu_pertemuan')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

//fungsi edit_dataPertemuan
function ubah_data_pertemuan($post){
  global $db;
  $id_data_pertemuan  = $_GET['id_data_pertemuan'];
  $judul_pertemuan    = strip_tags($post['judul_pertemuan']);
  $isi_pertemuan      = strip_tags($post['isi_pertemuan']);
  $waktu_pertemuan    = strip_tags($post['waktu_pertemuan']);

  $sql = "UPDATE `data_pertemuan` SET `judul_pertemuan` = '$judul_pertemuan', `isi_pertemuan` = '$isi_pertemuan', `waktu_pertemuan` = '$waktu_pertemuan' WHERE id_data_pertemuan = $id_data_pertemuan";    
  $result = mysqli_query($db, $sql);

  return mysqli_affected_rows($db);
}

//fungsi hapus_dataPertemuan
function delete_data($id_data_pertemuan){
  global $db;

  $query = "DELETE FROM data_pertemuan WHERE id_data_pertemuan = $id_data_pertemuan";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

//fungsi tambah dataMahasiswa
function create_data_mahasiswa($post){
  global $db;
  $nama     = strip_tags($post['nama']);
  $prodi    = strip_tags($post['prodi']);
  $semester = strip_tags($post['semester']);
  $no_hp    = strip_tags($post['no_hp']);
  $email    = strip_tags($post['email']);
  $foto     = upload_file();

  //check upload foto
  if (!$foto){
    return false;
  }
  $query = "INSERT INTO `data_mahasiswa` VALUES(null, '$nama','$prodi','$semester','$no_hp','$email','$foto')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

//fungsi update dataMahasiswa
function update_data_mahasiswa($post){
  global $db;
  $id_mahasiswa = strip_tags($post['id_mahasiswa']);
  $nama     = strip_tags($post['nama']);
  $prodi    = strip_tags($post['prodi']);
  $semester = strip_tags($post['semester']);
  $no_hp    = strip_tags($post['no_hp']);
  $email    = strip_tags($post['email']);
  $fotoLama = strip_tags($post['fotoLama']);

  //check upload foto baru atau tidak
  if ($_FILES['foto']['error']==4){
    $foto = $fotoLama;
  } else {
    $foto = upload_file();
  }

  $query = "UPDATE `data_mahasiswa` SET nama = '$nama', prodi = '$prodi', semester = '$semester', no_hp = '$no_hp', email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

//fungsi mengupload file
function upload_file()
{
  $namaFile   = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error      = $_FILES['foto']['error'];
  $tmpName    = $_FILES['foto']['tmp_name'];

  //check file yang diupload
  $extensifileValid = ['jpg','jpeg','png'];
  $extensifile      = explode('.', $namaFile);
  $extensifile      = strtolower(end($extensifile));

  //check format/extensi file
  if (!in_array($extensifile, $extensifileValid)){

    echo "<script>
          alert('Format File Tidak Valid');
          document.location.href = 'tambah_mhs.php';
          </script>";
    die();
  }

  //check ukuran file 2mb
  if ($ukuranFile > 2048000 ){
    
    echo "<script>
          alert('Ukuran File Max 2 MB');
          document.location.href = 'tambah_mhs.php';
          </script>";
    die();
  }

  //generate nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $extensifile;
  $uploadFile = 'assets/img/';
  //pindahkan ke folder lokal

  $move_file = move_uploaded_file($tmpName, $uploadFile.$namaFileBaru);
  return $namaFileBaru;
}

//fungsi hapus dataMahasiswa
function delete_mahasiswa($id_mahasiswa){
  global $db;

  //ambil foto sesuai data yang dipilih
  $foto = select("SELECT * FROM data_mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
  unlink("assets/img/". $foto['foto']);

  $query = "DELETE FROM data_mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

//fungsi tambah dataAkun
function create_data_akun($post){
  global $db;
  $nama     = strip_tags($post['nama']);
  $username = strip_tags($post['username']);
  $email    = strip_tags($post['email']);
  $password = strip_tags($post['password']);
  $level    = strip_tags($post['level']);

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  
  $query = "INSERT INTO `data_akun` VALUES(null, '$nama','$username','$email','$password','$level')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

//fungsi edit dataAkun
function update_data_akun($post){
  global $db;

  $id_akun  = strip_tags($post['id_akun']);
  $nama     = strip_tags($post['nama']);
  $username = strip_tags($post['username']);
  $email    = strip_tags($post['email']);
  $password = strip_tags($post['password']);
  $level    = strip_tags($post['level']);

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  
  $query = "UPDATE data_akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = $id_akun";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

//fungsi hapus dataAkun
function delete_akun($id_akun){
  global $db;

  $query = "DELETE FROM `data_akun` WHERE id_akun = $id_akun";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}
