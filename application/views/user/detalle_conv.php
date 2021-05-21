			<?php include_once 'header.php'; ?>
            <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Detalles Convocatoria				
							</h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span> <a href="#"> Detalles Convocatoria</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
				<div class="section-top-border">
					<?php foreach ($detalle as $conv) {?>
						<!-- <div align="center"><img src="<?= base_url('uploads/Convocatorias/');?><?= $conv->archivo;?>" width="200px" height="250px"></div>-->
						<h3 class="mb-30"><?php echo $conv->titulo?></h3>
						<p class="meta" style="font-size:16px"><b><?php setlocale(LC_TIME, "spanish");
                              $Nueva_Fecha = date("d-m-Y", strtotime($conv->fecha_inicio));
                              $Mes_Anyo = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));
                              echo $Mes_Anyo;?></b>&nbsp; | &nbsp;Publicado en : <b><?php echo $conv->nombre_tipo?></b></p>
						<div class="row">
							<div class="col-lg-12" align="justify">
								<blockquote class="generic-blockquote">
									 <?php echo $conv->resumen?> 
								</blockquote>
								<div align="right"><a href="<?= base_url('uploads/Convocatorias/');?><?= $conv->archivo;?>" class="btn btn-app" style="color:blue; font-size:18px;" onMouseover="this.style.color='#f7631b'" onMouseout="this.style.color='blue'" target="_blank"><i class="fa fa-file-pdf-o"></i> Descargar Archivo Adjunto</a></div>
							</div>
						</div>	
						<?php } ?>				
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
            <?php include_once 'footer.php';?>