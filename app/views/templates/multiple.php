<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- card -->
                <?php $no = 1 ?>
                <div class="card">
                    <!-- <div class="card-header"> -->
                    <!-- <h3 class="card-title">DataTable with default features</h3> -->
                    <!-- </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?= BASEURL.$data['subdomain']."/tambah"?>" method="post">
                            <input type="submit" class="btn btn-sm btn-success" value="Simpan">
                            <br>
                            <br>
                            <table id="example" class="table table-sm table-suceess table-hover table-striped table-bordered " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari / Tanggal </th>
                                        <th>Biaya (Tanpa Pajak)</th>
                                        <th>Viewer</th>
                                        <th>Landing Page</th>
                                        <th>Scroll Page</th>
                                        <th>Klik Chat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $data['data'] ?>
                                </tbody>
                            </table>
                            <input type="submit" class="btn btn-success btn-sm" value="Simpan">

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /  .container-fluid -->
</section>