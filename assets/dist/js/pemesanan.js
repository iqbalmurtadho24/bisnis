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



  })
  .buttons()
  .container()
  .appendTo("#example_wrapper .col-md-6:eq(0)");