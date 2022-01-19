<?php require_once('../config/header.php');

?>

<!-- modal -->
<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">Tambah Order</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="data.php?tambah_pesan_order=1" method="post">
             <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Pelanggan</span>
            </div>
            <select name="kd_cs" class="custom-select" id="kd_cs" required>


            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Jumlah Barang</span>
            </div>
            <input type="number" class="form-control" placeholder="Contoh : 3" name="jumlah" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Alamat</span>
            </div>
            <input type="text" class="form-control" placeholder="Contoh : Jl. Tongkol, No. 69, Gang. 11, RT. 01, RW. 04" name="alamat" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Provinsi</span>
            </div>
            <select name="provinsi" class="custom-select">
              <option value="0">-- Pilih --</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Kota / Kabupaten</span>
            </div>
            <select name="kabupaten" class="custom-select">
              <option value="0">-- Pilih --</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Kecamatann</span>
            </div>
            <select name="kecamatan" class="custom-select">
              <option value="0">-- Pilih --</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Desa</span>
            </div>
            <select name="desa" class="custom-select">
              <option value="0">-- Pilih --</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Pembayaran</span>
            </div>
            <select name="metode" class="custom-select" required>
              <option value="0">-- Pilih --</option>
              <option value="Transfer">Transfer</option>
              <option value="COD">COD</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Bank</span>
            </div>
            <select name="bank" class="custom-select" required>
              <option>-- Pilih --</option>
              <option value="BRI">BRI</option>
              <option value="Mandiri">Mandiri</option>
              <option value="BCA">BCA</option>
              <option value="BNI">BNI</option>
              <option value="Muamalat">Muamalat</option>
              <option value="COD">COD</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Tambah Order</button>
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
              <option>--</option>
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
        <h1>Pesan Order</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Pesan Order</li>
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


        <div class="card">
          <div class="card-body">
            <table id="example" class="table  table-striped table-bordered ">
              <thead>
                <tr>
                  <th rowspan="2"><i class="fa fa-cog"></i></th>
                  <th rowspan="2">Kode Pemesanan</th>
                  <th rowspan="2">Waktu</th>
                  <th rowspan="2">Nama Pelanggan</th>
                  <th rowspan="2">Kontak</th>
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
<script src="../assets/dist/js/pesan_order.js"></script>

<?php require_once('../config/footer.php') ?>