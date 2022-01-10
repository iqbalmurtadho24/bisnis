<?php require_once('../config/header.php');

?>


<!-- DataTables -->
<link rel="stylesheet" href="../assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- <link rel="stylesheet" href="../assets/dist/input.css"> -->

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

                    <th>No</th>
                    <th>Konten</th>
                    <th>Kategori</th>
                    <th>Produk</th>
                    <th>Status Publikasi</th>
                    <th>Tanggal Publikasi</th>
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
  <script src="../assets/dist/js/publikasi_konten.js"></script>

  <?php require_once('../config/footer.php') ?>