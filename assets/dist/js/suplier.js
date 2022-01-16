function edit(i) {
    let kd = i;

    $("select option[selected]").removeAttr("selected");
    $("input").removeAttr("value");
    $("textarea").removeAttr("value");

    $.ajax({
        type: "GET",
        url: "data.php?kd=" + kd + "&edit=suplier&where=id_suplier",
        async: false,
        success: function (text) {
            response = JSON.parse(text);
            $("#modal_edit").modal("show");
            $("#kd").val(response.id_suplier);
            $("#nama").val(response.nama);
            $("#toko").val(response.toko);
            $("#alamat").val(response.alamat);
            if (response.kategori != null && $("#kategori option[value='" + response.kategori + "']").length > 0) {
                $('#kategori option[value="' + response.kategori + '"]'
                ).attr("selected", "selected");
              }
            $("#kontak").val(response.kontak);
            if (response.produk != null && $("#produk1 option[value='" + response.produk + "']").length > 0) {
                $('#produk1 option[value="' + response.produk + '"]'
                ).attr("selected", "selected");
              }

        },
    });
}


$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "data.php?produk=1",

        success: function (text) {
            response = JSON.parse(text);
            select = "";
            for (let i = 0; i < response.data.length; i++) {
                select += "<option value='" + response.data[i].kd + "'>"+ response.data[i].produk + "---"+ response.data[i].merek + " </option>"

            }
            $('#produk').html(select);
            $('#produk1').html(select);

        }
    })
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
                    data: "toko",
                },
                {
                    data: "alamat",
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
