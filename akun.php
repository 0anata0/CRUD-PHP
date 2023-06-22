<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION['login'])) {
  echo "<script>
        alert('silahkan login terlebih dahulu!');
        document.location.href = 'login.php';
        </script>";
  exit;
}

$title = 'Daftar Akun';
include 'layout/header.php';

$akun = select("SELECT * FROM data_akun");

//tampil data berdasarkan user login
$id_akun = $_SESSION['id_akun'];
$data_byLogin = select("SELECT * FROM data_akun WHERE id_akun = $id_akun");

//jika tombol tambah ditekan jalankan script berikut
if (isset($_POST['tambah'])) {
  if (create_data_akun($_POST) > 0) {
    echo "<script>
      alert('Data Akun Berhasil Ditambahkan');
      document.location.href = 'akun.php';
      </script>";
  } else {
    echo "<script>
      alert('Data Akun Gagal Ditambahkan');
      document.location.href = 'akun.php';
      </script>";
  }
}

//jika tombol edit ditekan jalankan script berikut
if (isset($_POST['edit'])) {
  if (update_data_akun($_POST) > 0) {
    echo "<script>
      alert('Data Akun Berhasil Diedit');
      document.location.href = 'akun.php';
      </script>";
  } else {
    echo "<script>
      alert('Data Akun Gagal Diedit');
      document.location.href = 'akun.php';
      </script>";
  }
}

//jika tombol hapus ditekan jalankan script berikut
if (isset($_POST['hapus'])) {
  if (delete_akun($_POST) > 0) {
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
}

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600"><?= $_SESSION['nama']; ?></span>
            <i class="fas fa-user-circle fa-lg"></i>
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center mb-4">
        <i class="fas fa-fw fa-user-cog fa-lg"></i>
        <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
      </div>

      <!-- DataTables -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tabel Data Akun</h6>
        </div>
        <div class="card-body">
          <?php if ($_SESSION['level'] == 1) : ?>
            <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#tambahModal">
              <i class="fas fa-plus"></i>
              Tambah Akun
            </button>
          <?php endif; ?>
          <div class="table-responsive">
            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col" class="text-center">NO</th>
                  <th scope="col" class="text-center">NAMA</th>
                  <th scope="col" class="text-center">USERNAME</th>
                  <th scope="col" class="text-center">EMAIL</th>
                  <th scope="col" class="text-center">PASSWORD</th>
                  <th scope="col" class="text-center">AKSI</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $no = 1; ?>
                <!-- tampil seluruh data -->
                <?php if ($_SESSION['level'] == 1) : ?>
                  <?php foreach ($akun as $data_akun) : ?>
                    <tr>
                      <th><?= $no++; ?></th>
                      <td><?= $data_akun['nama']; ?></td>
                      <td><?= $data_akun['username']; ?></td>
                      <td><?= $data_akun['email']; ?></td>
                      <td>Password ter-enkripsi</td>
                      <td class="text-center" width="20%">
                        <button type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#editModal<?= $data_akun['id_akun']; ?>">
                          <i class="fas fa-edit"></i>
                          <i>Edit</i>
                        </button>
                        <span>
                          <button type="button" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#hapusModal<?= $data_akun['id_akun']; ?>">
                            <i class="fas fa-trash-alt"></i>
                            <i>Hapus</i>
                          </button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else : ?>
                  <!-- tampil data berdasarkan user login -->
                  <?php foreach ($data_byLogin as $data_akun) : ?>
                    <tr>
                      <th><?= $no++; ?></th>
                      <td><?= $data_akun['nama']; ?></td>
                      <td><?= $data_akun['username']; ?></td>
                      <td><?= $data_akun['email']; ?></td>
                      <td>Password ter-enkripsi</td>
                      <td class="text-center" width="20%">
                        <button type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#editModal<?= $data_akun['id_akun']; ?>">
                          <i class="fas fa-edit"></i>
                          <i>Edit</i>
                        </button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
            <!-- Modal Edit -->
            <?php foreach ($akun as $data_akun) : ?>
              <div class="modal fade" id="editModal<?= $data_akun['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="post">
                        <input type="hidden" name="id_akun" value="<?= $data_akun['id_akun']; ?>">
                        <div class="mb-3">
                          <label for="nama">Nama</label>
                          <input type="text" name="nama" id="nama" class="form-control" value="<?= $data_akun['nama']; ?>" required>
                        </div>

                        <div class="mb-3">
                          <label for="username">Username</label>
                          <input type="text" name="username" id="username" class="form-control" value="<?= $data_akun['username']; ?>" required>
                        </div>

                        <div class="mb-3">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" class="form-control" value="<?= $data_akun['email']; ?>" required>
                        </div>

                        <div class="mb-3">
                          <label for="password">Password <small>(Masukkan password baru/lama)</small></label>
                          <input type="password" name="password" id="password" class="form-control" required minLength="6">
                        </div>

                        <?php if ($_SESSION['level'] == 1) : ?>
                          <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" id="email" class="form-control" required>
                              <?php $level = $data_akun['level']; ?>
                              <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                              <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator Pertemuan</option>
                              <option value="3" <?= $level == '3' ? 'selected' : null ?>>Operator Mahasiswa</option>
                            </select>
                          </div>
                        <?php else : ?>
                          <input type="hidden" name="level" value="<?= $data_akun['level']; ?>">
                        <?php endif; ?>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                      <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post">
                      <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                      </div>

                      <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                      </div>

                      <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                      </div>

                      <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required minLength="6">
                      </div>

                      <div class="mb-3">
                        <label for="level">Level</label>
                        <select name="level" id="email" class="form-control" required>
                          <option value="">-- Pilih Level --</option>
                          <option value="1">Admin</option>
                          <option value="2">Operator Pertemuan</option>
                          <option value="3">Operator Mahasiswa</option>
                        </select>
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal Hapus -->
            <?php foreach ($akun as $data_akun) : ?>
              <div class="modal fade" id="hapusModal<?= $data_akun['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Yakin Ingin Menghapus Akun <?= $data_akun['nama']; ?> ?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <a href="hapus_akun.php?id_akun=<?= $data_akun['id_akun']; ?>" class="btn btn-danger" name="hapus">Hapus</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <?php
  include 'layout/footer.php';
  ?>