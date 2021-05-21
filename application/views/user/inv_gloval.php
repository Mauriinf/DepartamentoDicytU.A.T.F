<?php include_once 'header.php'; ?>			
        <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Proyectos de Investigación		
						  </h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span> <a href="<?= base_url('user_controller/proyectos');?>"> Proyectos de Investigación</a></p>
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
							<table id="pro_inv" class="display">
							<thead><tr><td></td><td></td></tr>
							</thead>
							<tbody>
							<?php
							if ($proyecto==false) {
							echo ''; 
							}else {$no=1; foreach ($proyecto as $proy) { ?>
							<tr>
							<td valign="top"><h6><?= $no++;?></h6></td>
							<td>
							<div class="single-post row">
							  <div class="col-lg-12 col-md-9 " align="justify">
							  <a class="posts-title" href="<?= base_url('user_controller/detalle/');?><?php echo $proy->id_investigacion.'/';?><?php echo $proy->visitas+1;?>"><h4><?php echo $proy->titulo_investigacion; ?></h4></a>
                              <p class="meta"><b>
                              <?php 
                              setlocale(LC_TIME, "spanish");
                              $Nueva_Fecha = date("d-m-Y", strtotime($proy->fecha));
                              $Mes_Anyo = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));
                              echo $Mes_Anyo;?>
                              </b>&nbsp; | &nbsp;Escrito por : <b><?php $cadena=$proy->nombre_autor; $array = explode("-", $cadena); echo $array[0];?></b>&nbsp; | &nbsp;Publicado en : <b><?php echo $proy->nombre_investigador;?></b></p>
									<p class="excert" align="justify">
									<?php echo substr($proy->resumen, 0, 400).'...';?>
									</p>
									<a href="<?= base_url('user_controller/detalle/');?><?php echo $proy->id_investigacion.'/';?><?php echo $proy->visitas+1;?>" class="primary-btn">Ver Mas...</a>
								</div>
							</div>
							</td></tr>
							<?php } }?>
							</tbody></table><br>
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget search-widget">
									<form class="search-form" action="#">
			                            <input placeholder="Buscar Trabajo de Investigacion" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Buscar Trabajo Investigacion Docente'" >
			                            <button type="submit"><i class="fa fa-search"></i></button>
			                        </form>
								</div>
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