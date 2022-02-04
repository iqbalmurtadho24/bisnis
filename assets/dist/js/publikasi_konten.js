$(document).ready(function () {

    var tableX = $("#example")
      .DataTable({
        ajax: "data.php?publikasi=3",
        columns: [

          {
            data: "kd",
          },
          {
            data: "waktu",
          },

          {
            data: "konten",
          },

          {
            data: "produk",
          },
          {
            data: "media_iklan",
          },
          {
            data: "status_iklan",
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
