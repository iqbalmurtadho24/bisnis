<?php require_once('../config/header.php');
$result = query("SELECT * FROM sdm WHERE id_user = {$_SESSION['id_user']}");
$row = mysqli_fetch_assoc($result);
?>

<!-- modal -->
<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah User Akses</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="data.php?tambah_akses=1" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Pegawai</span>
                        </div>
                        <select name="id_user" id="id_user" class="custom-select" required>
                            <?php 
                            $query = query('select * from sdm order by nama asc');
                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                <option value="<?= $row['id_user'];?>"><?= $row['nama'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Akses</span>
                        </div>
                        <select name="akses" id="akses" class="custom-select" required>
                            <option value="cs">CS</option>
                            <option value="sdm">SDM</option>
                            <option value="marketing">Marketing</option>
                            <option value="keuangan">Keuangan</option>
                            <option value="konten">Konten</option>
                            <option value="penjualan">Penjualan</option>
                            <option value="logistik">Logistik</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Kontak Akses</span>
                        </div>
                        <input type="number" class="form-control" placeholder="Kontak Akses" name="kontak_akses" required>
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
                <h5 class="modal-title" id="my-modal-title">Edit Data Akses </h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="data.php?edit_akses=1" method="post">
                    <input type="text" class="form-control" name='kd_akses' id='kd_akses' hidden>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Akses</span>
                        </div>
                        <select class="custom-select"  name="akses" id="akses" required> 
                        <option value="cs">CS</option>
                            <option value="sdm">SDM</option>
                            <option value="marketing">Marketing</option>
                            <option value="keuangan">Keuangan</option>
                            <option value="konten">Konten</option>
                            <option value="penjualan">Penjualan</option>
                            <option value="logistik">Logistik</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Status</span>
                        </div>
                        <select name="status" id="status" class="custom-select">
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                        </select>

                    </div>
               
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Kontak</span>
                        </div>
                        <input type="text" class="form-control"  name="kontak_akses" id="kontak_akses" required>
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
                <h1>User Akses</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">User Akses</li>
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
                                    <th><i class="fa fa-cog"></i></th>
                                    <th>Nama</th>
                                    <th>Akses</th>
                                    <th>Kontak</th>
                                    <th>Status</th>
                                    <th>Update</th>
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
<script src="../assets/dist/js/akses.js"></script>

<?php require_once('../config/footer.php') ?>