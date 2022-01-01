function edit(i) {
  let kd = i;

  $("select option[selected]").removeAttr("selected");
  $("input").removeAttr("value");
  $("textarea").removeAttr("value");

  $.ajax({
    type: "GET",
    url: "data.php?kd=" + kd + "&&edit_akses=data",
    async: false,
    success: function (text) {

      response = JSON.parse(text);

      $("#modal_edit").modal("show");
      $("#kd_akses").val(response.kd_akses);
      if (response.akses != null && $("#akses option[value='" + response.akses + "']").length > 0) {
        $('#akses option[value="' + response.akses + '"]'
        ).attr("selected", "selected");
      }
      if (response.status != null && $("#status option[value='" + response.status + "']").length > 0) {
        $('#status option[value="' + response.status + '"]'
        ).attr("selected", "selected");
      }
      $("#status").val(response.status);
      $("#kontak_akses").val(response.kontak_akses);


    },
  });
}


$(document).ready(function () {
  var tableX = $("#example")
    .DataTable({
      ajax: "data.php?akses=1",
      columns: [
        {
          data: "btn",
        },

        {
          data: "nama",
        },
        {
          data: "akses",
        },
        {
          data: "kontak",
        },
        {
          data: "status",
        },
        {
          data: "update",
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
