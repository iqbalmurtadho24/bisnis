var tableX = $("#example")
.DataTable({
  ajax: "data.php?pesan_order=1",
  columns: [

    {
      data: "kd",
    },
    {
      data: "waktu",
    },
    {
      data: "pelanggan",
    },
    {
      data: "kontak",
    },
    {
      data: "produk",
    },
    {
      data: "jumlah",
    },
    {
      data: "harga",
    },
    {
      data: "total",
    },
    {
      data: "alamat",
    },
    {
      data: "desa",
    },
    {
      data: "kecamatan",
    },
    {
      data: "kabupaten",
    },
    {
      data: "provinsi",
    },
    {
      data: "metode",
    },
    {
      data: "bank",
    },
    {
      data: "status",
    },
  ],

  paging: false,

  scrollY: 620,
  scrollCollapse: true,


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