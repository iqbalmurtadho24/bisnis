function edit(i) {
    let   kd = i;
      
          $("select option[selected]").removeAttr("selected");    
          $("input").removeAttr("value");    
          $("textarea").removeAttr("value");  
    
          $.ajax({
            type: "GET",
            url: "data.php?kd=" + kd + "&&edit_pegawai=data",
            async: false,
            success: function (text) {
         
              response = JSON.parse(text);
              $("#modal_edit").modal("show");
              $("#id_user").val(response.id_user);
              console.log($("#id_user").attr('class'));
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
        ajax: "data.php?pegawai=1",
        columns: [
          {
            data: "btn",
          },
      
          {
            data: "nama",
          },
      
          {
            data: "kontak",
          },
          {
            data: "email",
          },
          {
            data: "bank",
          },
          {
            data: "rekening",
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
  