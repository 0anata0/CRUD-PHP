<?php

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
        alert('silahkan login terlebih dahulu!');
        document.location.href = 'login.php';
        </script>";
  exit;
}

//membatasi halaman sesuai user login
if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3) {
  echo "<script>
        alert('Anda tidak punya hak akses!');
        document.location.href = 'akun.php';
        </script>";
  exit;
}

$title = 'Daftar Mahasiswa';
include 'layout/header.php';

$mahasiswa = select("SELECT * FROM data_mahasiswa");

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

        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center mb-4">
      <i class="fas fa-fw fa-users fa-lg"></i>
        <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Data Pertemuan -->
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Data Pertemuan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">7</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Data Mahasiswa -->
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Data Mahasiswa</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- DataTables -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tabel Data Mahasiswa</h6>
        </div>
        <div class="card-body">
          <a href="tambah_mhs.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>Tambah Data</a>
          <div class="table-responsive">
            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col" class="text-center">NO</th>
                  <th scope="col" class="text-center">NAMA</th>
                  <th scope="col" class="text-center">PRODI</th>
                  <th scope="col" class="text-center">SEMESTER</th>
                  <th scope="col" class="text-center">AKSI</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $no = 1; ?>
                <?php foreach ($mahasiswa as $data_mahasiswa) : ?>
                  <tr>
                    <th><?= $no++; ?></th>
                    <td><?= $data_mahasiswa['nama']; ?></td>
                    <td><?= $data_mahasiswa['prodi']; ?></td>
                    <td><?= $data_mahasiswa['semester']; ?></td>
                    <td class="text-center" width="25%">
                      <a href="detail_mhs.php?id_mahasiswa= <?= $data_mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary btn-sm text-white">
                        <i class="fas fa-eye"></i>
                        <i>Detail</i>
                      </a>
                      <a href="edit_mhs.php?id_mahasiswa= <?= $data_mahasiswa['id_mahasiswa']; ?>" class="btn btn-warning btn-sm text-white">
                        <i class="fas fa-edit"></i>
                        <i>Edit</i>
                      </a>
                      <span>
                        <button type="button" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#hapusModal<?= $data_mahasiswa['id_mahasiswa']; ?>">
                          <i class="fas fa-trash-alt"></i>
                          <i>Hapus</i>
                        </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <!-- Modal Hapus -->
            <?php foreach ($mahasiswa as $data_mahasiswa) : ?>
              <div class="modal fade" id="hapusModal<?= $data_mahasiswa['id_mahasiswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Data Mahasiswa</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Yakin ingin menghapus data <?= $data_mahasiswa['nama']; ?> ?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <a href="hapus_mhs.php?id_mahasiswa=<?= $data_mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger">Hapus</a>
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