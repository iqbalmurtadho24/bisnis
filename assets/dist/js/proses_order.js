function edit(i) {
  let kd = i;

  $("select option[selected]").removeAttr("selected");
  $("input").removeAttr("value");
  $("textarea").removeAttr("value");

  $.ajax({
    type: "GET",
    url: "data.php?kd=" + kd + "&edit=order&where=kd_order",
    async: false,
    success: function (text) {
      console.log(text);
      response = JSON.parse(text);
      $("#modal_edit").modal("show");
      $('#kd').val(response.kd_order)
      $('#resi').val(response.resi_pengiriman)
      if (response.id_suplier != null && $("#id_suplier option[value='" + response.id_suplier + "']").length > 0) {
        $('#id_suplier option[value="' + response.id_suplier + '"]'
        ).attr("selected", "selected");
      }
      if (response.status_order_suplier != null && $("#status_order option[value='" + response.status_order_suplier + "']").length > 0) {
        $('#status_order option[value="' + response.status_order_suplier + '"]'
        ).attr("selected", "selected");
      }
      if (response.status_pengiriman != null && $("#status_pengiriman option[value='" + response.status_pengiriman + "']").length > 0) {
        $('#status_pengiriman option[value="' + response.status_pengiriman + '"]'
        ).attr("selected", "selected");
      }
    },
  });
}


$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "data.php?table=suplier",
    success: function (data) {
      data = JSON.parse(data)

      option = "<option> --pilih-- </option>"
      for (let i = 0; i < data.length; i++) {
        option += "<option value='" + data[i].id_suplier + "'>" + data[i].suplier + "</option>"
      }
      $('#id_suplier').html(option)
    }
  });

  var tableX = $("#example")
    .DataTable({
      ajax: "data.php?status_order_cs=1&edit=1",
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
        }, {
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
