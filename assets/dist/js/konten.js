function edit(i) {
  let kd = i;

  $("select option[selected]").removeAttr("selected");
  $("input").removeAttr("value");
  $("textarea").removeAttr("value");

  $.ajax({
    type: "GET",
    url: "data.php?kd=" + kd + "&edit=konten&where=kd_konten",
    async: false,
    success: function (text) {

      response = JSON.parse(text);
      $("#modal_edit").modal("show");
      $("#kd").val(response.kd_konten)
      $("#link").val(response.gdrive)
      // alert(response);
      if (response.status_proses != null && $("#status option[value='" + response.status_proses + "']").length > 0) {
        $('#status option[value="' + response.status_proses + '"]'
        ).attr("selected", "selected");
      }

      if (response.kd_produk != null && $("#produk1 option[value='" + response.kd_produk + "']").length > 0) {
        $('#produk1 option[value="' + response.kd_produk + '"]'
        ).attr("selected", "selected");
      }

      if (response.jenis_konten != null && $("#jenis option[value='" + response.jenis_konten + "']").length > 0) {
        $('#jenis option[value="' + response.jenis_konten + '"]'
        ).attr("selected", "selected");
      }


    },
  });
}


$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "data.php?table=produk",

    success: function (text) {
      response = JSON.parse(text);
      select = "<option >- Pilih -</option>";
      for (let i = 0; i < response.length; i++) {
        select += "<option value='" + response[i].kd_produk + "'>" + response[i].produk + " </option>"

      }
      $('#produk').html(select);
      $('#produk1').html(select);

    }
  })
  var tableX = $("#example")
    .DataTable({
      ajax: "data.php?konten=1&id=" + id,
      columns: [
        {
          data: "btn",
        },

        {
          data: "no",
        },
        {
          data: "waktu",
        },

        {
          data: "jenis",
        },

        {
          data: "produk",
        },
        {
          data: "status",
        },
        {
          data: "file",
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
