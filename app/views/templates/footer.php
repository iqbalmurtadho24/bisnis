</div>
<!-- /#page-content-wrapper -->
</div>
<?= isset($data['pesan']) ? $data['pesan'] : "" ?>


<script src="<?= BASEURL ?>js/jquery/jquery-3.3.1.min.js"></script>
<script src="<?= BASEURL ?>js/notyf/notyf.min.js"></script>
<script src="<?= BASEURL ?>js/flasher.js"></script>

<script src="<?= BASEURL ?>js/adminlte/bootstrap.bundle.min.js"></script>

<?php if (isset($data['table'])) { ?>
    <script src="<?= BASEURL ?>js/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= BASEURL ?>js/datatables-bs4/dataTables.bootstrap4.min.js"></script>
    <script src="<?= BASEURL ?>js/datatables-responsive/dataTables.responsive.min.js"></script>
<?php } ?>

<div class="modal fade" id="password" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <Label class="form">Edit Data </label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASEURL  . "home/password" ?>" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    <?= flasher::input("", 'password'); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" type="submit">Simpan </button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php if (isset($data['button'])) { ?>
    <script src="<?= BASEURL ?>js/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="<?= BASEURL ?>js/datatables-buttons/buttons.bootstrap4.min.js"></script>
    <div class="modal fade" id="edit" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <Label class="form">Edit Data </label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= isset($data['update']) ? BASEURL . $data['subdomain'] . "/" . $data['update'] : "" ?> ?>" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">

                        <div id="edit-form">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" type="submit">Simpan </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="proses" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <Label class="form">Proses Data </label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= isset($data['proses']) ? BASEURL . $data['subdomain'] . "/" . $data['proses'] : "" ?> ?>" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">

                        <div id="proses-form">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" type="submit">Simpan </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="extras" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <Label class="form">edit Data tambahan</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="ex">

                    <div class="modal-body">

                        <div id="extras-form">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" type="submit">Simpan </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade  " id="tambah" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <Label class="form">tambah Data </label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= isset($data['tambah']) ? BASEURL . $data['subdomain'] . "/" . $data['tambah'] : "" ?>" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">
                        <?php
                        echo $data['output'];
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" type="submit">Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<script src="<?= BASEURL ?>js/adminlte/adminlte.js"></script>
<script src="<?= BASEURL ?>js/bs-select/bootstrap-select.min.js"></script>

<script src="<?= BASEURL ?>js/script.js"></script>
</body>

</html>