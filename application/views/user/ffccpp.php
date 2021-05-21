<?php include_once 'header.php'; ?>			
        <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
							<?php echo $nomfacultadd->nombre_facultad;?>
						  </h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span>  <?php echo $nomfacultadd->nombre_facultad;?></p>
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
							if ($facultadd==false) {
							echo ''; }else { $no=1; foreach ($facultadd as $facp) { ?>
						<tr>
						<td valign="top"><h6><?= $no++;?></h6></td>
						<td>
							  <div class="col-lg-12 col-md-9 " align="justify"><a class="posts-title" href="<?= base_url('user_controller/detalle/');?><?php echo $facp->id_investigacion.'/';?><?php echo $facp->visitas+1;?>"><h4><?php echo $facp->titulo_investigacion;?></h4></a>
                              <p class="meta"><b><?php 
                              setlocale(LC_TIME, "spanish");
                              $Nueva_Fecha = date("d-m-Y", strtotime($facp->fecha));
                              $Mes_Anyo = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));
                              echo $Mes_Anyo;?></b>&nbsp; | &nbsp;Autor (es): <b><?php $cadena=$facp->nombre_autor; $array = explode("-", $cadena); echo $array[0];?></b>&nbsp; | &nbsp;Carrera : <b><?php echo $facp->nombre_carrera;?></b></p>
									<p class="excert" align="justify">
										<?php echo substr($facp->resumen, 0, 400).'...';?>
									</p>
									<a href="<?= base_url('user_controller/detalle/');?><?php echo $facp->id_investigacion.'/';?><?php echo $facp->visitas+1;?>" class="primary-btn">Ver Mas...</a>
								</div><br>
								</td></tr>
								<?php }} ?>
								</tbody></table><br>
							
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
							  <div class="single-sidebar-widget post-category-widget">
							    <h4 class="category-title"><?php echo $nomfacultadd->nombre_facultad;?></h4>
									<ul class="cat-list">
									<?php foreach ($carreras as $carreras) {?>
										<li><a href="<?= base_url('user_controller/carreras/').$carreras->id_carrera.'/';?><?php echo $carreras->id_facultad?>" class="d-flex justify-content-between"><?php echo $carreras->nombre_carrera;?></a></li>
                                    <?php }?>
								  </ul>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
<?php include_once 'footer.php'; ?>