function edit(i) {
  let kd = i;

  $("select option[selected]").removeAttr("selected");
  $("input").removeAttr("value");
  $("textarea").removeAttr("value");

  $.ajax({
    type: "GET",
    url: "data.php?kd=" + kd + "&&edit_user=data",
    async: false,
    success: function (text) {

      response = JSON.parse(text);
      $("#modal_edit").modal("show");
      $("#id_user").val(response.id_user);
      $("#username").val(response.username);
      $("#password").val(response.password);
      $("#level").val(response.level);

      // alert(response);
      if (response.status != null && $("#status option[value='" + response.status + "']").length > 0) {
        $('#status option[value="' + response.status + '"]'
        ).attr("selected", "selected");
      }


    },
  });
}


$(document).ready(function () {
  var tableX = $("#example")
    .DataTable({
      ajax: "data.php?konten=1&id="+id,
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
