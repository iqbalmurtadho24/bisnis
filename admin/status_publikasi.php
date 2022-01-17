<?php require_once('../config/header.php');

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
                <form action="data.php?tambah_publikasi=1" method="post">
                    <input type="hidden" class="form-control" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Konten</span>
                        </div>
                        <select name="konten" id="konten" class="custom-select"> </select>
                    </div>

                    <div class="row input-group mb-3">
                        <div class="col-md-3">
                            <span class="input-group-text" id="basic-addon1">Facebook</span>
                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-4">
                            <input type="radio" class="form-check-input" name="facebook" value="1" >Ya
                        </div>
                        <div class="col-md-4">
                            <input type="radio" class="form-check-input" name="facebook" value="0">Tidak
                        </div>
                    </div>

                    <div class="row input-group mb-3">
                        <div class="col-md-3">
                            <span class="input-group-text" id="basic-addon1">Instagram</span>
                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-4">
                            <input type="radio" class="form-check-input" name="instagram" value="1" >Ya
                        </div>
                        <div class="col-md-4">
                            <input type="radio" class="form-check-input" name="instagram" value="0">Tidak
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-md-3">
                            <span class="input-group-text" id="basic-addon1">Website</span>
                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-4">
                            <input type="radio" class="form-check-input" name="website" value="1" > Ya
                        </div>
                        <div class="col-md-4">
                            <input type="radio" class="form-check-input" name="website" value="0">Tidak
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Tambah Publikasi</button>
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
                <h1>Status Publikasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Status Publikasi</li>
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
                                    <th rowspan="2"><i class="fa fa-cog"></i></th>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Tanggal Publikasi</th>
                                    <th rowspan="2">Konten</th>
                                    <th rowspan="2">Produk</th>
                                    <th colspan="4">Publikasi</th>
                                </tr>
                                <tr>
                                    <th>Facebook</th>
                                    <th>Instagram</th>
                                    <th>Website</th>
                                </tr>
                            </thead>
                        </table>
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
<script src="../assets/dist/js/publikasi.js"></script>

<?php require_once('../config/footer.php') ?>