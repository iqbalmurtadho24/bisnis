function edit(i) {
    let kd = i;

    $("select option[selected]").removeAttr("selected");
    $("input").removeAttr("value");
    $("textarea").removeAttr("value");

    $.ajax({
        type: "GET",
        url: "data.php?kd=" + kd + "&&edit_suplier=data",
        async: false,
        success: function (text) {
            response = JSON.parse(text);
            $("#modal_edit").modal("show");
            $("#kd").val(response.kd_kategori);
            $("#suplier").val(response.kategori);
        },
    });
}


$(document).ready(function () {
    var tableX = $("#example")
        .DataTable({
            ajax: "data.php?suplier=1",
            columns: [
                {
                    data: "btn",
                },

                {
                    data: "kd",
                },
                {
                    data: "nama",
                },
                {
                    data: "kategori",
                },
                {
                    data: "produk",
                },
                {
                    data: "kontak",
                },
        

            ],
            paging: false,

            scrollY: 620,
            scrollCollapse: true,
            responsive: true,

            // dom: 'Bfrtip', ikilo nggonmu maeng
            dom: "<'row'<'col-sm-12 col-md-6'Bl><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                {
                    text: "Tambah",
                    className: " btn btn-primary btn-sm  btn-flat",
                    action: function (e, dt, node, config) {
                        $("#modal_tambah").modal("show");
                    },
                }
            ],
        })
        .buttons()
        .container()
        .appendTo("#example_wrapper .col-md-6:eq(0)");
});
