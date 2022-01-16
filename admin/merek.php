<?php
require_once('../config/header.php');

?>
<!-- modal -->
<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">Tambah Merek Produk Baru </h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="data.php?tambah_merek=1" method="post">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Kode Merek</span>
            </div>
            <input type="text" class="form-control" name="kd" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Merek</span>
            </div>
            <input type="text" class="form-control" name="merek" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Jenis</span>
            </div>
            <select name="kd_jenis" class="custom-select"  id="jenis">

            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Tambah Merek</button>
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
        <h5 class="modal-title" id="my-modal-title">Edit Merek</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="data.php?edit_merek=1" method="post">
          <input type="text" class="form-control" name="kd" id="kd" hidden>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Merek</span>
            </div>
            <input type="text" class="form-control" name="merek" id="merek" required>
          </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Edit Merek</button>
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
        <h1>Data Merek</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Data Merek</li>
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
          <div class="card-body">
            <table id="example" class="table  table-striped table-bordered ">
              <thead>
                <tr>
                  <th><i class="fa fa-cog"></i></th>
                  <th>Kode</th>
                  <th>Merek</th>
                  <th>Jenis</th>
                  <th>Kategori</th>
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

<script src="../assets/dist/js/merek.js"></script>

<?php require_once('../config/footer.php') ?>