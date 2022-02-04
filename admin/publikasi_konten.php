<?php require_once('../config/header.php');

?>


<!-- DataTables -->
<link rel="stylesheet" href="../assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- <link rel="stylesheet" href="../assets/dist/input.css"> -->
<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <form action="data.php?tambah_konten=1" method="post">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Konten</span>
            </div>
            <select name="konten" class="custom-select" id="konten">

            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Media Iklan</span>
            </div>
            <select name="media_iklan" class="custom-select" required>
              <option >- Pilih -</option>
              <option value="Facebook">Facebook</option>
              <option value="Instagram">Instagram</option>
              <option value="Google">Google</option>
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

                    <th>No  </th>
                    <th>Waktu Publikasi</th>
                    <th>Konten</th>
                    <th>Produk</th>
                    <th>Media Iklan</th>
                    <th>Status Publikasi</th>
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

  <script src="../assets/dist/js/publikasi_konten.js"></script>

  <?php require_once('../config/footer.php') ?>