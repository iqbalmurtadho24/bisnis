
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
                    <div class="card-body ">

                        <table id="example" class="table table-sm table-suceess table-hover table-striped table-bordered dt-responsive display nowrap" style="width:100%"></table>

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


<script>
    var data = <?= $data['data'] ?>;
    var column = <?= $data['column'] ?>;

    var domain = "<?= BASEURL ?>";
    var subdomain = "<?= $data['subdomain'] ?>/";
   
    var tambah = "<?= isset($data['tambah']) ?$data['tambah'] : "" ?>";


    var edit = "<?= isset($data['edit']) ?$data['edit'] : "" ?>";
    var update = "<?= isset($data['update']) ?$data['update'] : "" ?>";
   
    var edit_proses = "<?= isset($data['edit_proses']) ?$data['edit_proses'] : "" ?>";
    var proses = "<?= isset($data['proses']) ?$data['proses'] : "" ?>";

    var delete_data = "<?= isset($data['delete']) ?$data['delete'] : ""  ?>";

</script>