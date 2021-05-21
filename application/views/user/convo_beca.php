<?php include_once 'header.php'; ?>			
        <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Convocatoria Becas				
						  </h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span> <a href="<?= base_url('user_controller/convocatoria_be');?>"> Convocatoria Becas</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  

			<!-- Start top-category-widget Area --><!-- End top-category-widget Area -->
			
			<!-- Start post-content Area -->
			<section class="post-content-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
						<br>							
							<table id="inv" class="display">
							<thead><tr><td></td><td></td></tr>
							</thead>
							<tbody>
							<?php 
							if ($becas==false) {
								echo '';
							}else {$no=1; foreach ($becas as $inves) { ?>
							<tr>
							<td valign="top"><h6><?= $no++;?></h6></td>
							<td>
							<div class="single-post row">							
							  <div class="col-lg-12 col-md-9 " align="justify">
							  <a class="posts-title" href="<?= base_url('user_controller/detalle_conv/');?><?php echo $inves->id_convocatoria;?>"><h4><?php echo $inves->titulo?></h4></a>
                              <p class="meta"><b><?php 
                              setlocale(LC_TIME, "spanish");
                              $Nueva_Fecha = date("d-m-Y", strtotime($inves->fecha_inicio));
                              $Mes_Anyo = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));
                              echo $Mes_Anyo;?></b>&nbsp; | &nbsp;Publicado en : <b><?php echo $inves->nombre_tipo?></b></p>
									<p class="excert" align="justify">
									<?php echo substr($inves->resumen, 0, 400).'...';?>
									</p>
									<a href="<?= base_url('user_controller/detalle_conv/');?><?php echo $inves->id_convocatoria;?>" class="primary-btn">Ver Detalle</a>
								</div>
							</div>
							</td></tr>
							<?php } }?>
							</tbody></table><br>
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
							  <div class="single-sidebar-widget post-category-widget">
							    <h4 class="category-title">Investigación</h4>
									<ul class="cat-list">
                                    	<li><a href="<?= base_url('user_controller/becadi');?>" class="d-flex justify-content-between">Becas Directas</a></li>
                            			<li><a href="<?= base_url('user_controller/convocatoria_be');?>" class="d-flex justify-content-between">Convocatorias de Becas</a></li>
                 					</ul>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
<?php include_once 'footer.php'; ?>