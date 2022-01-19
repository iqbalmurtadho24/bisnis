function edit(i) {
  let kd = i;

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
      $("#nama_rekening").val(response.nama_rekening);
      $("#rekening").val(response.rekening);

    },
  });
}


$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "data.php?pesan_order=2",

    success: function (text) {
      console.log(text);
      response = JSON.parse(text);

      select = "";
      for (let i = 0; i < response.length; i++) {
        select += "<option value='" + response[i].kd + "'>" + response[i].value + " </option>"

      }
      $('#kd_cs').html(select);

    }
  })
  var tableX = $("#example")
    .DataTable({
      ajax: "data.php?pesan_order=1",
      columns: [
        {
          data: "btn",
        },
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
});
