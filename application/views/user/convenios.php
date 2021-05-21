<?php include_once 'header.php'; ?>			
        <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								<?php echo $tipo->nombre_convenio;?>				
						  </h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span> <a href="<?= base_url('user_controller/convenio/');?><?php echo $tipo->id_convenio;?>"> <?php echo $tipo->nombre_convenio;?></a></p>
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
							<table id="conve">
							<thead><tr><td></td></tr>
							</thead>
							<tbody>
							<?php 
							if ($conve==false) { ?>
							<div style="height:20px;">&nbsp;</div>
							<div class="single-sidebar-widget search-widget" align="center"></div>						
							<?php 
							}else {foreach ($conve as $inves) { ?>
							<tr><td>
							<div class="single-post row">							
							  <div class="col-lg-10 col-md-9 " align="justify"><a class="posts-title" href="<?= base_url('user_controller/detalleconvenio/');?><?php echo $inves->id_convenios;?>"><h3><?php echo $inves->titulo?></h3></a>
                              <p class="meta"><b><?php 
                              setlocale(LC_TIME, "spanish");
                              $Nueva_Fecha = date("d-m-Y", strtotime($inves->fecha));
                              $Mes_Anyo = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));
                              echo $Mes_Anyo;?></b>&nbsp; | &nbsp;Publicado en : <b><?php echo $inves->nombret;?></b></p>
									<p class="excert">
										<?php echo substr($inves->descripcion, 0, 200).'...';?>
									</p>
									<a href="<?= base_url('user_controller/detalleconvenio/');?><?php echo $inves->id_convenios;?>" class="primary-btn">Ver Detalle</a>
								</div>
							</div>
							</td></tr>
							<?php } }?>
							</tbody></table><br>
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
							  <div class="single-sidebar-widget post-category-widget">
							    <h4 class="category-title">Convenios</h4>
									<ul class="cat-list">
										<li><a href="<?php echo base_url('user_controller/convenio/')?>1">Convenios Internacionales</a></li>
                            			<li><a href="<?php echo base_url('user_controller/convenio/')?>2">Convenios Nacionales</a></li>
                            			<li><a href="<?php echo base_url('user_controller/convenio/')?>3">Convenios Regionales</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
<?php include_once 'footer.php'; ?>