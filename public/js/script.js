
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
            scrollX: true,

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
            $("select").select2({
                dropdownParent: $('#edit'),
                theme: "bootstrap",
                matcher: function (params, data) {
                    // If there are no search terms, return all of the data
                    if ($.trim(params.term) === '') { return data; }

                    // Do not display the item if there is no 'text' property
                    if (typeof data.text === 'undefined') { return null; }

                    // `params.term` is the user's search term
                    // `data.id` should be checked against
                    // `data.text` should be checked against
                    var q = params.term.toLowerCase();
                    if (data.text.toLowerCase().indexOf(q) > -1 || data.id.toLowerCase().indexOf(q) > -1) {
                        return $.extend({}, data, true);
                    }

                    // Return `null` if the term should not be displayed
                    return null;
                }

            });
            ;

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
            $("select").select2({
                dropdownParent: $('#proses'),
                theme: "bootstrap",
                matcher: function (params, data) {
                    // If there are no search terms, return all of the data
                    if ($.trim(params.term) === '') { return data; }

                    // Do not display the item if there is no 'text' property
                    if (typeof data.text === 'undefined') { return null; }

                    // `params.term` is the user's search term
                    // `data.id` should be checked against
                    // `data.text` should be checked against
                    var q = params.term.toLowerCase();
                    if (data.text.toLowerCase().indexOf(q) > -1 || data.id.toLowerCase().indexOf(q) > -1) {
                        return $.extend({}, data, true);
                    }

                    // Return `null` if the term should not be displayed
                    return null;
                }

            });
            ;
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
            $("select").select2({
                theme: "bootstrap",
                dropdownParent: $('#extras'),
                matcher: function (params, data) {
                    // If there are no search terms, return all of the data
                    if ($.trim(params.term) === '') { return data; }

                    // Do not display the item if there is no 'text' property
                    if (typeof data.text === 'undefined') { return null; }

                    // `params.term` is the user's search term
                    // `data.id` should be checked against
                    // `data.text` should be checked against
                    var q = params.term.toLowerCase();
                    if (data.text.toLowerCase().indexOf(q) > -1 || data.id.toLowerCase().indexOf(q) > -1) {
                        return $.extend({}, data, true);
                    }

                    // Return `null` if the term should not be displayed
                    return null;
                }

            });


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
$(document).on('change', '[name="provinsi"]', function (e) {
    $('[name="kabupaten"]').val('');
    $('[name="kabupaten"]').trigger('change');

    $('[name="kecamatan"]').val('');
    $('[name="kecamatan"]').trigger('change');

    $('[name="desa"]').val('');
    $('[name="desa"]').trigger('change');

    val = $(this).val()
    // console.log(val);
    $.post(domain + "alamat/kabupaten", { id: val },
        function (data) {
            // console.log(data);
            $('[name="kabupaten"]').html(data)
        },
    );

});

$(document).on('change', '[name="kabupaten"]', function (e) {

    $('[name="kecamatan"]').val('');
    $('[name="kecamatan"]').trigger('change');

    $('[name="desa"]').val('');
    $('[name="desa"]').trigger('change');

    val = $(this).val()
    // console.log(val);
    $.post(domain + "alamat/kecamatan", { id: val },
        function (data) {
            // console.log(data);
            $('[name="kecamatan"]').html(data)
        },
    );

});

$("select").select2({
    theme: "bootstrap",
    dropdownParent: $('#tambah'),
    matcher: function (params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') { return data; }

        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') { return null; }

        // `params.term` is the user's search term
        // `data.id` should be checked against
        // `data.text` should be checked against
        var q = params.term.toLowerCase();
        if (data.text.toLowerCase().indexOf(q) > -1 || data.id.toLowerCase().indexOf(q) > -1) {
            return $.extend({}, data, true);
        }

        // Return `null` if the term should not be displayed
        return null;
    }

});

$(document).on('change', '[name="kecamatan"]', function (e) {
    $('[name="desa"]').val('');
    $('[name="desa"]').trigger('change');

    val = $(this).val()
    // console.log(val);
    $.post(domain + "alamat/kelurahan", { id: val },
        function (data) {
            // console.log(data);
            $('[name="desa"]').html(data)
        },
    );
});