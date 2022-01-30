<?php require_once('../config/header.php');
?>

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
        <h1>Pemesanan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Pemesanan</li>
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
<script src="../assets/dist/js/pemesanan.js"></script>

<?php require_once('../config/footer.php') ?>