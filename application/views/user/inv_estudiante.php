<?php include_once 'header.php'; ?>			
        <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Trabajos de Investigación de Estudiantes				
						  </h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span> <a href="<?= base_url('user_controller/estudiante');?>"> Trabajos de Investigación de Estudiantes</a></p>
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
							<table id="inv_docente" class="display">
							<thead><tr><td></td><td></td></tr>
							</thead>
							<tbody>
						<?php
							if ($proest==false) {
								echo '';
								}else {$no=1;
									foreach ($proest as $proyestu) { ?>
						<tr>
						<td valign="top"><h6><?= $no++;?></h6></td>
						<td>
							<div class="single-post row">
							  <div class="col-lg-12 col-md-9 " align="justify">
							  <a class="posts-title" href="<?= base_url('user_controller/detalle/');?><?php echo $proyestu->id_investigacion.'/';?><?php echo $proyestu->visitas+1;?>"><h4><?php echo $proyestu->titulo_investigacion; ?></h4></a>
                              <p class="meta"><b>
                              	<?php 
                              setlocale(LC_TIME, "spanish");
                              $Nueva_Fecha = date("d-m-Y", strtotime($proyestu->fecha));
                              $Mes_Anyo = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));
                              echo $Mes_Anyo;?>
                              </b>&nbsp; | &nbsp;Escrito por : <b><?php $cadena=$proyestu->nombre_autor; $array = explode("-", $cadena); echo $array[0];?></b>&nbsp; | &nbsp;Publicado en : <b><?php echo $proyestu->nombre_investigador;?></b></p>
									<p class="excert"  align="justify">
										<?php echo substr($proyestu->resumen, 0, 400).'...';?>
									</p>
									<a href="<?= base_url('user_controller/detalle/');?><?php echo $proyestu->id_investigacion.'/';?><?php echo $proyestu->visitas+1;?>" class="primary-btn">Ver Mas...</a>
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
                                    	<li><a href="<?= base_url('user_controller/docente');?>" class="d-flex justify-content-between">Trabajos de Investigación de docentes</a></li>
                            			<li><a href="<?= base_url('user_controller/estudiante');?>" class="d-flex justify-content-between">Trabajos de Investigación de estudiantes</a></li>
                            			<li><a href="<?= base_url('user_controller/proyectos');?>" class="d-flex justify-content-between">Proyectos de Investigación</a></li>
                            			<li><a href="<?= base_url('user_controller/convocatorias_investigacion');?>" class="d-flex justify-content-between">Convocatorias de investigación</a></li>
                                    				
								  </ul>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
<?php include_once 'footer.php'; ?>