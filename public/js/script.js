
if (tambah) {
    var tableX = $("#example")
        .DataTable({
            "data": this.data,
            "columns": this.column,
            lengthChange: false,
            scrollX: true,
            buttons: [{
                text: "Tambah",
                className: " btn btn-primary btn-sm  btn-flat",
                action: function (e, dt, node, config) {
                    $('#tambah').modal('show');
                },
            }],
        }).buttons().container()
        .appendTo("#example_wrapper .col-md-6:eq(0)");

} else {
    var tableX = $("#example")
        .DataTable({
            "data": this.data,
            "columns": this.column,
            lengthChange: false,

        })

}

$('.btn-warning').click(function () {


    const id = $(this).data('id');
    $.ajax({
        type: "post",
        url: domain + subdomain + edit,
        data: { id: id },
        success: function (data) {
            $("#edit").modal("show")
            $('#edit-form').html(data);
            $('select').selectpicker();

        }
    });

});

$('.btn-info').click(function () {


    const id = $(this).data('id');
    $.ajax({
        type: "post",
        url: domain + subdomain + edit_proses,
        data: { id: id },
        success: function (data) {
            $("#proses").modal("show")
            $('#proses-form').html(data);
            $('select').selectpicker();

        }
    });

});

$('.extras').click(function () {
    // $("select option[selected]").removeAttr("selected");
    // $("input").removeAttr("value");
    // $("textarea").removeAttr("value");

    const id = $(this).data('id');
    const status = $(this).data('status');
    $.ajax({
        type: "post",
        url: domain + subdomain + "/edit_extras",
        data: { id: id, status: status },
        success: function (data) {
            $("#extras").modal("show")
            $('#extras-form').html(data);
            $('select').selectpicker();

            if (status != "sudah") {
                $("#ex").attr("action", domain + subdomain + "update_" + status)
                $("#ex").attr("method", "POST")

            }

        }
    });

});


$('.btn-danger').click(function () {

    const id = $(this).data('id');

    if (confirm("apakah anda Ingin menghapus data ini ?") === true) {
        window.location.href = domain + subdomain + delete_data + "/" + id;
    }

});

    $('select').selectpicker()

 $(document).on('click','.bootstrap-select', function(e){
    console.log($('[aria-controls="bs-select-2"]').val());
     console.log($(this).find('select').val())
  })    