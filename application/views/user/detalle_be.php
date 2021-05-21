			<?php include_once 'header.php'; ?>
            <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Detalle de Curso				
							</h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span> <a href="#"> Detalles de Curso</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
					<div class="col-lg-1"></div>
						<div class="col-lg-10 posts-list">
						<?php foreach ($detalle as $detalle) { ?>
						  <div class="single-post row">
						  <div class="col-lg-12">
						  <table width="100%"  border="0">
							  <tr>
							    <td width="100" rowspan="8" valign="top"><img src="<?= base_url('uploads/becas/')?><?= $detalle->imagen;?>" width="300" height="320" alt=""></td>
							    <td width="150" align="right" valign="top"><h3><b>Titulo: </b></h3></</td>
							    <td valign="top" align="justify"><h3><?php echo $detalle->titulo;?></h3></td>
							  </tr>
							  <tr>
							    <td width="150" align="right" valign="top"><b>Descripcion: </b></td>
							    <td valign="top" align="justify"><p><?php echo $detalle->descripcion;?></p></td>
							  </tr>
							  <tr>
							    <td width="150" align="right" valign="top"><b>Fecha de Publicacion: </b></td>
							    <td valign="top"><p><?php setlocale(LC_TIME, "spanish");
                              $Nueva_Fecha = date("d-m-Y", strtotime($detalle->fecha));
                              $Mes_Anyo = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));
                              echo $Mes_Anyo;?></p></td>
							  </tr>
							  <tr>
							    <td colspan="3" align="right" valign="top"><a href="<?= base_url('uploads/becas/');?><?= $detalle->imagen;?>" target="_blank">Descargar Afiche</a></td>
							  </tr>
							</table>
							<?php }?>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
            <?php include_once 'footer.php';?>