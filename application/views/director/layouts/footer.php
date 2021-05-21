<footer class="main-footer">
    <strong>&copy; Derechos Reservados.</strong> 
  </footer>

 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url();?>assets/plantilla/datatable/jquery-3.3.1.js"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/plantilla/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/plantilla/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/plantilla/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plantilla/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/plantilla/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/plantilla/js/demo.js"></script>

<script src="<?php echo base_url();?>assets/plantilla/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url();?>assets/plantilla/datatable/jquery.dataTables.min.js"></script>


<script src="<?php echo base_url();?>assets/plantilla/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url();?>assets/plantilla/iCheck/icheck.min.js"></script>
<!-- fullCalendar -->
<script src="<?php echo base_url();?>assets/plantilla/fullcalendar/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/plantilla/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/plantilla/fullcalendar/locale/es.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/plantilla/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/plantilla/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/plantilla/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/plantilla/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/plantilla/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/plantilla/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/plantilla/datatables-export/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/scriptcar.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/reloj.js"></script>
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

  });
</script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>



<script>
  $(document).ready(function () {

      $.post('<?php echo base_url();?>calendario/calendario_modal/geteventos',
        function(data){
          //alert(data);

        $('#calendario').fullCalendar({
           header    : {
            left  : 'today,prev,next',
            center: 'title',
            right : 'month,agendaWeek,agendaDay'
          },
          //defaultDate: new Date(),
          navLinks: false, // can click day/week names to navigate views
          editable: false,
      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',
      editable: false,
      eventLimit: true, // allow "more" link when too many events
         
          events: $.parseJSON(data),
          //events:[
          //{
          //    title          : 'Ir a Google',
          //    start          : '2019-03-10T12:00:00',
          //    end            : '2019-03-19T12:30:00',
          //    allDay         : false,
          //    url            : 'http://google.com/',
          //    color          : '', //Primary (light-blue)
          //    textColor      : '#000000'
          //  
          //}
          //]
          eventClick: function(event) {
        if (event.url) {
            return false;
        }
    },
        });
      });


    $('#facultadp').change(function(){
      var facultad_id = $('#facultadp').val();
      if (facultad_id != '')
      {
        $.ajax({
          url:'<?php echo base_url();?>proyectos/proyectos_modal/combocarrera',
          method:'post',
          data:{facultad_id:facultad_id},
          success:function(data)
          {
            $('#carrerap').html(data);
          }
        })        
      }
    });

    $(".btn-view").on("click",function(){
      var id=$(this).val();
      $.ajax({
         url:'<?php echo base_url() ?>facultades/facultades_modal/ver/' + id,
         type:'post',
         success:function(resp){
          $('#verModal .modal-body').html(resp);
          //alert(resp);
         }
      });
    });

    $('#mensajes').DataTable(
      {
        "language":{
          "lengthMenu":"Mostrar _MENU_ mensajes por pagina",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar mensajes",
          "info":"Mostrando _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior"
          },
        }
      });

    $(".btn-view-convenio").on("click",function(){
      var convenio=$(this).val();
      var infoconvenio= convenio.split('*');
      html='<p><strong>Titulo: </strong> '+infoconvenio[1]+'</p>'
      html+='<p><strong>Descripcion: </strong> '+infoconvenio[2]+'</p>';
      html+='<p><strong>Tipo de Convenio: </strong> '+infoconvenio[3]+'</p>';
      html+='<p><strong>Fecha: </strong> '+infoconvenio[4]+'</p>';
      $('#verModalCo .modal-body').html(html);
    });

    $(".btn-view-publi").on("click",function(){
      var convenio=$(this).val();
      var infoconvenio= convenio.split('*');
      html='<p><strong>Titulo: </strong> '+infoconvenio[1]+'</p>'
      html+='<p><strong>Descripcion: </strong> '+infoconvenio[2]+'</p>';
      html+='<p><strong>Tipo de Publicación: </strong> '+infoconvenio[3]+'</p>';
      html+='<p><strong>Fecha: </strong> '+infoconvenio[4]+'</p>';
      $('#verModalPu .modal-body').html(html);
    });

    $(".btn-view-beca").on("click",function(){
      var convenio=$(this).val();
      var infoconvenio= convenio.split('*');
      html='<p><strong>Titulo: </strong> '+infoconvenio[1]+'</p>'
      html+='<p><strong>Descripcion: </strong> '+infoconvenio[2]+'</p>';
      html+='<p><strong>Fecha: </strong> '+infoconvenio[3]+'</p>';
      html+='<p><strong>Imagen: </strong><img src="'+infoconvenio[4]+'" width="100px" height="100px"></p>';
      $('#verModalBe .modal-body').html(html);
    });

    $(".btn-view-proyecto").on("click",function(){
      var proyecto=$(this).val();
      var infoproyecto= proyecto.split('*');
      html='<p align="justify"><strong>Facultad: </strong> '+infoproyecto[1]+'</p>'
      html+='<p align="justify"><strong>Carrera: </strong> '+infoproyecto[2]+'</p>';
      html+='<p align="justify"><strong>Titulo: </strong> '+infoproyecto[3]+'</p>';
      html+='<p align="justify"><strong>Autor: </strong> '+infoproyecto[11]+'</p>';
      html+='<p align="justify"><strong>Tipo Investigador: </strong> '+infoproyecto[6]+'</p>';
      html+='<p align="justify"><strong>Objetivo General: </strong> '+infoproyecto[7]+'</p>';
      html+='<p align="justify"><strong>Resumen: </strong> '+infoproyecto[8]+'</p>';
      html+='<p align="justify"><strong>Conclusiones: </strong> '+infoproyecto[9]+'</p>';
      html+='<p align="justify"><strong>Gestion: </strong> '+infoproyecto[12]+'</p>';
      html+='<p align="justify"><strong>Tutor: </strong> '+infoproyecto[13]+'</p>';
      html+='<p align="justify"><strong>Fecha: </strong> '+infoproyecto[10]+'</p>';
      html+='<p align="justify"><strong>Tipo de Investigacion: </strong> '+infoproyecto[14]+'</p>';
      
      $('#verModalP .modal-body').html(html);
    });

     $(".btn-view-carrera").on("click",function(){
      var carrera=$(this).val();
      var infocarrera= carrera.split('*');
      html='<p><strong>Facultad: </strong> '+infocarrera[1]+'</p>'
      html+='<p><strong>Carrera: </strong> '+infocarrera[2]+'</p>';
      $('#verModalC .modal-body').html(html);
    });

     $(".btn-view-cargo").on("click",function(){
      var cargo=$(this).val();
      var infocargo= cargo.split('*');
      html='<p><strong>Cargo: </strong> '+infocargo[1]+'</p>';
      $('#verModalCa .modal-body').html(html);
    });

     $(".btn-view-evento").on("click",function(){
      var evento=$(this).val();
      var infoevento= evento.split('*');
      html='<p><strong>Titulo de Evento: </strong> '+infoevento[1]+'</p>';
      html+='<p><strong>Fecha Inicial: </strong> '+infoevento[2]+'</p>';
      html+='<p><strong>Fecha Final: </strong> '+infoevento[3]+'</p>';
      html+='<p><strong>Color de Etiqueta: </strong><div style="background-color:'+infoevento[4]+'">&nbsp;</div></p>';
      $('#verModalEve .modal-body').html(html);
    });

     $(".btn-view-personal").on("click",function(){
      var personal=$(this).val();
      var infopersonal= personal.split('*');
      html='<p><strong>Nombre Completo: </strong> '+infopersonal[1]+'</p>'
      html+='<p><strong>Apellidos: </strong> '+infopersonal[2]+' '+infopersonal[3]+'</p>'
      html+='<p><strong>Cargo: </strong> '+infopersonal[4]+'</p>'
      html+='<p><strong>Email: </strong> '+infopersonal[5]+'</p>'
      html+='<p><strong>Carnet de Identidad: </strong> '+infopersonal[6]+'</p>'
      html+='<p><strong>Direccion: </strong> '+infopersonal[7]+'</p>';

      $('#verModalP .modal-body').html(html);
    });

     $(".btn-view-usuario").on("click",function(){
      var usuario=$(this).val();
      var infousuario= usuario.split('*');
      html='<p><strong>Nombre Completo: </strong> '+infousuario[1]+'</p>'
      html+='<p><strong>Apellidos: </strong> '+infousuario[2]+' '+infousuario[3]+'</p>'
      html+='<p><strong>Carnet de Identidad: </strong> '+infousuario[4]+'</p>'
      html+='<p><strong>Direccion: </strong> '+infousuario[5]+'</p>'
      html+='<p><strong>Telefono: </strong> '+infousuario[6]+'</p>'
      html+='<p><strong>Email: </strong> '+infousuario[7]+'</p>'
      html+='<p><strong>Usuario: </strong> '+infousuario[8]+'</p>'
      html+='<p><strong>Rol: </strong> '+infousuario[9]+'</p>';

      $('#verModalU .modal-body').html(html);
    });

     $(".btn-view-convo").on("click",function(){
      var convocatoria=$(this).val();
      var infoconvocatoria= convocatoria.split('*');
      html='<p><strong>Titulo de Convocatoria: </strong> '+infoconvocatoria[1]+'</p>'
      html+='<p><strong>Descripcion: </strong> '+infoconvocatoria[2]+'</p>'
      html+='<p><strong>Resumen: </strong> '+infoconvocatoria[3]+'</p>'
      html+='<p><strong>Requerimiento: </strong> '+infoconvocatoria[4]+'</p>'
      html+='<p><strong>Fecha de Inicio: </strong> '+infoconvocatoria[5]+'</p>'
      html+='<p><strong>Fecha Final: </strong> '+infoconvocatoria[6]+'</p>'
      html+='<p><strong>Tipo de Convocatoria: </strong> '+infoconvocatoria[7]+'</p>'
      html+='<p><strong>Archivo: </strong><img src="<?php echo base_url();?>/uploads/convocatorias/'+infoconvocatoria[8]+'" width="100px" height="100px"></p>';

      $('#verModalCo .modal-body').html(html);
    });


  	$('#listafac').DataTable(
  		{
  			"language":{
  				"lengthMenu":"Mostrar _MENU_ registros por pagina",
  				"zeroRecords":"No se encontraron resultados en su busqueda",
  				"searchPlaceholder":"Buscar Registros",
  				"info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
  				"infoEmpty":"No existen Registros",
  				"infoFiltered":"(Filtrado de un total de _MAX_ registros)",
  				"search":"Buscar : ",
  				"paginate":{
  					"first":"Primero",
  					"last":"Ultimo",
  					"next":"Siguiente",
  					"previous":"Anterior"
  				},
  			}
  		});

    <!---->
    $('#reportecargo').DataTable({
      dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Cargos",
                exportOptions: {
                    columns: [ 0, 1]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'potrait',
                pageSize: 'A4',
                download:'open',
                title: 'Listado de Cargos',
                exportOptions: {
                    columns: [ 0, 1 ]
                }
                
            }
        ],
        "language":{
          "lengthMenu":"Mostrar _MENU_ registros por pagina",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar Registros",
          "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior"
          },
        }
      });
      $('#reportefacul').DataTable({
      dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Facultades",
                exportOptions: {
                    columns: [ 0, 1]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'potrait',
                pageSize: 'A4',
                download:'open',
                title: "Listado de Facultades",
                exportOptions: {
                    columns: [ 0, 1 ]
                }
                
            }
        ],
        "language":{
          "lengthMenu":"Mostrar _MENU_ registros por pagina",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar Registros",
          "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior"
          },
        }
      });
      $('#reportecarre').DataTable({
      dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Carreras",
                exportOptions: {
                    columns: [ 0, 1, 2]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'potrait',
                pageSize: 'A4',
                download:'open',
                title: "Listado de Carreras",
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
                
            }
        ],
        "language":{
          "lengthMenu":"Mostrar _MENU_ registros por pagina",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar Registros",
          "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior"
          },
        }
      });
      $('#reporteper').DataTable({
      dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Personal",
                exportOptions: {
                    columns: [ 0, 2,3 ,4, 5, 6, 7]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'potrait',
                pageSize: 'A4',
                download:'open',
                title: "Listado de Personal",
                exportOptions: {
                    columns: [ 0, 2,3 ,4, 5, 6, 7]
                }
                
            }
        ],
        "language":{
          "lengthMenu":"Mostrar _MENU_ registros por pagina",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar Registros",
          "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior"
          },
        }
      });
      $('#reporteproy').DataTable({
      dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "TRABAJOS DE INVESTIGACION DICYT ",
                exportOptions: {
                    columns: [ 0, 4, 5, 2, 3, 6, 1]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'potrait',
                pageSize: 'A4',
                download:'open',
                title: "TRABAJOS DE INVESTIGACION DICYT ",
                exportOptions: {
                    columns: [ 0, 4, 5, 2, 3, 6, 1]
                }
                
            }
        ],
        "language":{
          "lengthMenu":"Mostrar _MENU_ registros por pagina",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar Registros",
          "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior"
          },
        }
      });
    $('.sidebar-menu').tree()
  })
</script>
<script>
    function mostrar(dato){
        if(dato=="1"){
            document.getElementById("primero").style.display = "block";
            
        }
        if(dato!="1"){
            document.getElementById("primero").style.display = "none";
            
        }
        
    }
    </script>
</body>
</html>
