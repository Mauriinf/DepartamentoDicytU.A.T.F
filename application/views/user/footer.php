<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Dirección</h4>
								<ul>
                    <li><span class="lnr lnr-home" style="color:#f7631b"> </span><a href="<?= base_url();?>user_controller/contacto"> Ciudadela Universitaria Edificio del Vicerrectorado 1° Piso</a></li>
  									<li><span class="lnr lnr-phone-handset" style="color:#f7631b"> </span><a href="<?= base_url();?>user_controller/contacto"> Teléfono: (591) (2) 6227319 - Fax: (591) (2) 6229551 Casilla N° 36</a></li>
  									<li><span class="lnr lnr-envelope" style="color:#f7631b"> </span><a href="<?= base_url();?>user_controller/contacto"> dicyt.uatf@gmail.com</a></li>
								</ul>								
							</div>
						</div>
                        <div class="col-lg-3 col-md-6 col-sm-6 footer-social">
							<div class="single-footer-widget">
								<h4>Síguenos...</h4>
								<ul>
                    <li><a href="https://www.facebook.com/DICYTUATFPOTOSI/" target="_blank" ><i class="fa fa-facebook" style="color:#f7631b"></i>&nbsp;&nbsp;&nbsp; Facebook</a></li>
  									<li><a href="https://twitter.com/Dicyt2" target="_blank"><i class="fa fa-twitter" style="color:#f7631b"></i>&nbsp;&nbsp;&nbsp; Twitter</a></li>
 									<li><a href="https://www.youtube.com/channel/UCBz24bjoUYbyRJqeXxXd29Q?view_as=subscriber" target="_blank"><i class="fa fa-youtube" style="color:#f7631b"></i>&nbsp;&nbsp;&nbsp; Youtube</a></li>
  									<li><a href="https://web.skype.com/"><i class="fa fa-skype" target="_blank" style="color:#f7631b"></i>&nbsp;&nbsp;&nbsp; Skype</a></li>
								</ul>								
							</div>
						</div>
            <div class="col-lg-3 col-md-6 col-sm-6 footer-social">
              <div class="single-footer-widget">
                <h4>Formularios de Investigación</h4>
                <ul>
                    <li><a href="http://svr1.uatf.edu.bo/becas2/index.php" target="_blank"><i class="fa fa-file-text" style="color:#f7631b"></i>&nbsp;&nbsp; Beca Investigación</a></li>
                </ul>               
              </div>
            </div>																													
					</div>
					<div class="footer-bottom row align-items-center justify-content-between">
						<p class="footer-text m-0 col-lg-12 col-md-12" align="center">
                        	 &copy;Derechos Reservados<br/>
                             Desarrollado por DICyT&nbsp; ||&nbsp; Potosí  &nbsp;-&nbsp; Bolivia
                        </p>						
					</div>						
				</div>
			</footer>	
			<!-- End footer Area -->	


			
			
			<script src="<?= base_url('user_assets/js/vendor/jquery-2.2.4.min.js');?>"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="<?= base_url('user_assets/js/vendor/bootstrap.min.js');?>"></script>
  		<script src="<?= base_url('user_assets/js/easing.min.js');?>"></script>			
			<script src="<?= base_url('user_assets/js/hoverIntent.js');?>"></script>
			<script src="<?= base_url('user_assets/js/superfish.min.js');?>"></script>	
			<script src="<?= base_url('user_assets/js/jquery.ajaxchimp.min.js');?>"></script>
			<script src="<?= base_url('user_assets/js/jquery.magnific-popup.min.js');?>"></script>	
    	<script src="<?= base_url('user_assets/js/jquery.tabs.min.js');?>"></script>						
			<script src="<?= base_url('user_assets/js/jquery.nice-select.min.js');?>"></script>	
			<script src="<?= base_url('user_assets/js/owl.carousel.min.js');?>"></script>									
			<script src="<?= base_url('user_assets/js/mail-script.js');?>"></script>	
			<script src="<?= base_url('user_assets/js/main.js');?>"></script>
      <script src="<?= base_url('user_assets/js/jquery.wmuSlider.js');?>"></script>
      <script src="<?= base_url('user_assets/datatable/jquery.dataTables.min.js');?>"></script>            
      <script src="<?= base_url('user_assets/engine1/wowslider.js');?>"></script>
			<script src="<?= base_url('user_assets/engine1/script.js');?>"></script>
      <script src="<?= base_url('user_assets/ligth/js/jquery.prettyPhoto.js');?>" type="text/javascript" charset="utf-8"></script>
            <script>
				$('.example1').wmuSlider();         
			</script>
      <!-- hielo-->
<script src="<?= base_url('assets3/js/jquery.flexslider.js');?>"></script>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function(){
        $("area[rel^='prettyPhoto']").prettyPhoto();
        
        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',slideshow:3000, autoplay_slideshow: false});
        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
    
        
      });
      </script>
  <script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider({
      touch: false,
      pauseOnAction: false,
      pauseOnHover: false,
    });
  });
</script>

			<script>
			$(document).ready(function () {
				$('#convoca').DataTable(
  		{
  			"language":{
  				"Processing":    "Procesando....",
  				"lengthMenu":"",
  				"zeroRecords":"No se encontraron resultados en su busqueda",
  				"searchPlaceholder":"Buscar",
  				"info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
  				"infoEmpty":"No existen Registros",
  				"infoFiltered":"(Filtrado de un total de _MAX_ registros)",
  				"search":"Buscar Trabajo de Carrera : ",
  				"paginate":{
  					"first":"Primero",
  					"last":"Ultimo",
  					"next":"Siguiente",
  					"previous":"Anterior",
  				},
  			}
  		});
				$('#inv_docente').DataTable(
  		{
  			"language":{
  				"Processing":    "Procesando....",
  				"lengthMenu":"",
  				"zeroRecords":"No se encontraron resultados en su busqueda",
  				"searchPlaceholder":"Buscar",
  				"info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
  				"infoEmpty":"No existen Registros",
  				"infoFiltered":"(Filtrado de un total de _MAX_ registros)",
  				"search":"Buscar Trabajo de Investigacion : ",
  				"paginate":{
  					"first":"Primero",
  					"last":"Ultimo",
  					"next":"Siguiente",
  					"previous":"Anterior",
  				},
  			}
  		});
				$('#inv').DataTable(
  		{
  			"language":{
  				"Processing":    "Procesando....",
  				"lengthMenu":"",
  				"zeroRecords":"No se encontraron resultados en su busqueda",
  				"searchPlaceholder":"Buscar",
  				"info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
  				"infoEmpty":"No existen Registros",
  				"infoFiltered":"(Filtrado de un total de _MAX_ registros)",
  				"search":"Buscar Convocatoria : ",
  				"paginate":{
  					"first":"Primero",
  					"last":"Ultimo",
  					"next":"Siguiente",
  					"previous":"Anterior",
  				},
  			}
  		});
        $('#publi').DataTable(
      {
        "language":{
          "Processing":    "Procesando....",
          "lengthMenu":"",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar",
          "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar Publicacion : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior",
          },
        }
      });
        $('#conve').DataTable(
      {
        "language":{
          "Processing":    "Procesando....",
          "lengthMenu":"",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar",
          "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar Convenio : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior",
          },
        }
      });
        $('#pro_inv').DataTable(
      {
        "language":{
          "Processing":    "Procesando....",
          "lengthMenu":"",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar",
          "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar Proyectos : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior",
          },
        }
      });
        $('#dir').DataTable(
      {
        "language":{
          "Processing":    "Procesando....",
          "lengthMenu":"",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar",
          "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar Curso : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior",
          },
        }
      });
        $('#recurso').DataTable(
      {
        "language":{
          "Processing":    "Procesando....",
          "lengthMenu":"Mostrar _MENU_ registros por pagina",
          "zeroRecords":"No se encontraron resultados en su busqueda",
          "searchPlaceholder":"Buscar",
          "info":"Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty":"No existen Registros",
          "infoFiltered":"(Filtrado de un total de _MAX_ registros)",
          "search":"Buscar : ",
          "paginate":{
            "first":"Primero",
            "last":"Ultimo",
            "next":"Siguiente",
            "previous":"Anterior",
          },
        }
      });
			})

			</script> 
			
		</body>
	</html>