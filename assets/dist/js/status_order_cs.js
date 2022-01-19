function edit(i) {
  let   kd = i;

  $("select option[selected]").removeAttr("selected");
  $("input").removeAttr("value");
  $("textarea").removeAttr("value");

  $.ajax({
    type: "GET",
    url: "data.php?kd=" + kd + "&edit=sdm&where=id_user",
    async: false,
    success: function (text) {

      response = JSON.parse(text);
      $("#modal_edit").modal("show");
      $("#id_user").val(response.id_user);
      $("#nama").val(response.nama);
      $("#tanggal_lahir").val(response.tanggal_lahir);
      $("#nik").val(response.nik);
      $("#jalan").val(response.jalan);
      $("#rt_rw").val(response.rt_rw);
      $("#desa").val(response.desa);
      $("#kecamatan").val(response.kecamatan);
      $("#kota_kabupaten").val(response.kota_kabupaten);
      $("#provinsi").val(response.provinsi);
      $("#kontak").val(response.kontak);
      $("#email").val(response.email);
      $("#bank").val(response.bank);
      $("#nama_rekening").val(response.nama_rekening  );
      $("#rekening").val(response.rekening  );

    },
  });
}


$(document).ready(function () {
  var tableX = $("#example")
  .DataTable({
    ajax: "data.php?status_order_cs=1",
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
      data: "suplier",
    },
    {
      data: "order",
    },
    {
      data: "resi",
    },
    {
      data: "status",
    },

    ],

    paging: false,

    scrollY: 620,
    scrollCollapse: true,
    responsive: true,
  })
  .buttons()
  .container()
  .appendTo("#example_wrapper .col-md-6:eq(0)");
});
