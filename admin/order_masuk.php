<?php require_once('../config/header.php');
$result = query("SELECT * FROM sdm WHERE id_user = {$_SESSION['id_user']}");
$row = mysqli_fetch_assoc($result);
?>

<!-- modal -->
<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">Tambah user Baru</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="data.php?tambah_user=1" method="post">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Username</span>
            </div>
            <input type="text" class="form-control" placeholder="Username" name="username" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Password</span>
            </div>
            <input type="text" class="form-control" placeholder="password" name="password" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Level</span>
            </div>
            <select name="level" class="custom-select" required>
              <option >--</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>


        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Tambah user</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

        </form>
      </div>
    </div>
  </div>
</div>

<div id="modal_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">Edit Data user </h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="data.php?edit_user=1" method="post">
          <input type="text" class="form-control" name='id_user' id='id_user' hidden>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Username</span>
            </div>
            <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Password</span>
            </div>
            <input type="text" class="form-control" placeholder="password" name="password" id="password" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Level</span>
            </div>
            <select name="level" class="custom-select" id="level" required>
              <option >--</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">status</span>
            </div>
            <select name="status" id="status" class="custom-select">
              <option value="0">NONAKTIF</option>
              <option value="1">AKTIF</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Edit user</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

        </form>
      </div>

    </div>
  </div>
</div>

<!-- DataTables -->
<link rel="stylesheet" href="../assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- <link rel="stylesheet" href="../assets/dist/input.css"> -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Order Masuk</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Order Masuk</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <!-- card -->

        <div class="card">
          <!-- <div class="card-header"> -->
            <!-- <h3 class="card-title">DataTable with default features</h3> -->
            <!-- </div> -->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example" class="table  table-striped table-bordered ">
                <thead>
                  <tr>
                    <th rowspan="2"><i class="fa fa-cog"></i></th>
                    <th rowspan="2">Kode Pemesanan</th>
                    <th rowspan="2">Admin CS</th>
                    <th rowspan="2">Nama Pelanggan</th>
                    <th rowspan="2">Kategori</th>
                    <th rowspan="2">Produk</th>
                    <th rowspan="2">Jumlah</th>
                    <th rowspan="2">Harga</th>
                    <th rowspan="2">Total</th>
                    <th colspan="5">Alamat</th>
                    <th rowspan="2">Metode Pembayaran</th>
                    <th rowspan="2">Bank</th>
                    <th rowspan="2">Status Pembayaran</th>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <th>Desa / Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kota / Kabupan</th>
                    <th>Provinsi</th>
                  </tr>
                </thead>
              </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>


  <!-- jQuery -->
  <script src="../assets/dist/js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../assets/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../assets/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../assets/dist/js/user.js"></script>

  <?php require_once('../config/footer.php') ?>