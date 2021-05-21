<?php include_once 'header.php';?>

<!-- start banner Area -->
<div class="flexslider">
		<ul class="slides">
		<?php if ($portada==false) {echo '';} else{ 
		foreach ($portada as $porta) { ?>
			<li>
				<img style="-webkit-filter: brightness(30%); filter: brightness(40%);" src="<?= base_url('uploads/portada/').$porta->imagen;?>" alt="">
				<section class="flex-caption">
					<h1><?php echo mb_strtoupper($porta->titulo);?></h1>
					<p><?php echo $porta->descripcion;?></p>
				</section>
			</li>
			<?php } }?>		
		</ul>
	</div>

			<!-- End banner Area -->
			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">TRABAJOS DE INVESTIGACIÓN ESTUDIANTES</h1>
							</div>
						</div>
					</div>
										
					<div class="row">
					<?php foreach ($proyectos as $proy) { ?>
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
							<img class="img-fluid" src="<?= base_url('uploads/proyectos/facultades/').$proy->rela;?>">							
							</div>
							<p class="meta"><?php echo $proy->fecha; ?>  |  Por <a ><?php $cadena=$proy->nombre_autor; $array = explode("-", $cadena); echo $array[0];?></a></p>
							<a href="<?= base_url('user_controller/detalle/');?><?php echo $proy->id_investigacion.'/';?><?php echo $proy->visitas;?>">
								<h6 align="justify" style="color:#003366;"><?php echo substr($proy->titulo_investigacion, 0, 100).'...'; ?></h6>
							</a>
							<div align="justify">
								<?php if ($proy->resumen=="no disponible") {
								echo mb_strtoupper($proy->resumen);
							}
							else{
								echo substr($proy->resumen, 0, 250).'...';
								}?>
							</div>
							<a href="<?= base_url('user_controller/detalle/');?><?php echo $proy->id_investigacion.'/';?><?php echo $proy->visitas;?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Ver </span><span class="lnr lnr-arrow-right" style="font-size:22px;"></span></a>	
						</div>
					<?php }?>													
					</div>
					
				</div>
			</section>
			<!-- End blog Area -->
            
            <!-- Start search-course Area -->
		<section class="search-course-area relative">
				<div class="overlay overlay-bg"></div>
					<div class="container">
                    <div class="col-lg-12 col-md-12 search-course-left">
                    <h1 align="center" class="text-white">CONVOCATORIAS</h1></div>
                    <br/>
                    <?php foreach ($convocatorias as $convo) {?>
                    <?php
                    $titulo=$convo->titulo;
                    $Fein=$convo->fecha_inicio;
                    $Ffin=$convo->fecha_final;
                    $tipo=$convo->nombre_tipo;
                    $descripcion=$convo->descripcion;
                    $id=$convo->id_convocatoria;
                    ?>
                		<div class="col-lg-12 col-md-12 " align="justify"><a class="posts-title" href="<?= base_url('user_controller/detalle_conv/');?><?php echo $id;?>"><h2 style="color:#FFF"><?php echo $titulo;?></h2></a>
                              <p class="meta" style="font-size:16px"><b><?php echo $Fein;?></b>&nbsp; | &nbsp; Fecha de Conclusion: <b><?php echo $Ffin;?></b> &nbsp; |&nbsp;Publicado en : <b><?php echo $tipo?></b></p>
									<p class="text-white" style="font-size:18px" align="justify">
										<div style="color:#FFF;"><?php echo $descripcion;?></div>
									</p>
									<a href="<?= base_url('user_controller/detalle_conv/');?><?php echo $id;?>" class="primary-btn">Ver Detalle...</a>
						</div>
						<br>
                        <?php }?>
					</div>				
				</div>	
			</section>
			<!-- End search-course Area -->
			<!-- Start popular-course Area -->
			<section class="popular-course-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">TRABAJOS / PROYECTOS DE INVESTIGACIÓN DOCENTES</h1>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-popular-carusel">
						<?php if ($proydoc==false) {echo 'No Existen Trabajos / Proyectos de Investigación';} else{ 
						foreach ($proydoc as $tradoc) { ?>	
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>
										<?php if($tradoc->imagenc==''){?>
										<img class="img-fluid" src="<?php echo base_url('uploads/facultades/')?><?php echo $tradoc->imagenf;?>" alt="">
										<?php } else { ?>
										<img class="img-fluid" src="<?php echo base_url('uploads/carrera/')?><?php echo $tradoc->imagenc;?>" alt="">
										<?php } ?>
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-users"></span> <?php echo $tradoc->visitas; ?><span class="lnr lnr-calendar-full"></span> <?php echo $tradoc->fecha;?></p>
									</div>									
								</div>
								<div class="details">

									<a href="<?= base_url('user_controller/detalle/');?><?php echo $tradoc->id_investigacion.'/';?><?php echo $tradoc->visitas;?>">
										<h5 align="justify" style="color:#003366">
											<?php echo substr($tradoc->titulo_investigacion, 0, 50).'...'; ?>
										</h5>
									</a>
									<div>Por: <a ><?php $cadena=$tradoc->nombre_autor; $array = explode("-", $cadena); echo $array[0];?></a></div>
									<p align="justify">
										<?php echo substr($tradoc->resumen, 0, 250).'...'; ?>										
									</p>
								</div>
							</div>
							<?php } }?>							
						</div>
					</div>
				</div>	
			</section>
			<!-- End popular-course Area -->
			
			<section class="review-area section-gap relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
				<div class="col-lg-6 col-md-6 search-course-left">
							<h1 class="text-nara">
								NOTICIAS Y EVENTOS
							</h1>	
						</div>			
					<div class="row">
						<div class="active-review-carusel">
						<?php if ($publi==false) {
							echo 'No Existen Noticias y Eventos';
						} else{
							foreach ($publi as $pub) {?>
							<div class="single-review item" align="justify" style="color:#FFF;">
								<div class="title justify-content-start d-flex">
									<a href="<?= base_url('user_controller/detalles/');?><?php echo $pub->id_publicacion;?>" ><h4><?php echo $pub->titulo;?></h4></a>
									
								</div>
								
									<?php echo substr($pub->descripcion, 0, 250).'...'; ?>
							
							</div>							
							<?php } }?>																											
						</div>
					</div>
				</div>	
			</section>
			<!-- End review Area -->	
			
		
			<!-- Start upcoming-event Area -->
			<section class="upcoming-event-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">OFERTA DE CURSOS</h1>
							</div>
						</div>
					</div>								
					<div class="row">
						<div class="active-upcoming-event-carusel">
						<?php if ($becas==false) {
							echo 'No Existen Cursos';
						} else{
							foreach ($becas as $becadi) {?>						
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="<?php echo base_url('uploads/becas/');?><?php echo $becadi->imagen;?>" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p><?php setlocale(LC_TIME, "spanish");
                              $Nueva_Fecha = date("d-m-Y", strtotime($becadi->fecha));
                              $Mes_Anyo = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));
                              echo $Mes_Anyo;?></p>
									<a href="<?= base_url('user_controller/detalle_be/');?><?php echo $becadi->id_beca;?>"><h4 align="justify"><?php echo $becadi->titulo;?></h4></a>
									<p align="justify">
										<?php echo substr($becadi->descripcion, 0, 250).'...'; ?>
									</p>
								</div>
							</div>
							<?php }}?>																						
						</div>
					</div>
				</div>	
			</section>
			<!-- End upcoming-event Area -->
			<section class="cta-two-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 cta-left">
							<h1>ENLACES</h1>
							<ul class="ch-grid">
					<li>
						<div class="ch-item" style="background:url('<?= base_url();?>user_assets/img/enlace/uatf.jpg'); background-size:100% 100%; background-repeat:no-repeat;">
							<div class="ch-info">								
								<p align="center"><a href="http://uatf.edu.bo">UATF</a>Universidad Autonoma "Tomas Frias" </p>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item" style="background:url('<?= base_url();?>user_assets/img/enlace/ceub.png'); background-size:100% 100%; background-repeat:no-repeat;">
							<div class="ch-info">
								<p><a href="http://www.ceub.edu.bo/portal/">CEUB</a>Universidad Boliviana Comite Ejecutivo </p>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item" style="background:url('<?= base_url();?>user_assets/img/enlace/postgrado.jpg'); background-size:100% 100%; background-repeat:no-repeat;">
							<div class="ch-info">
								<p><a href="https://www.uatfpostgrado.edu.bo/">POSTGRADO</a>Direccion de PostGrado </p>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item" style="background:url('<?= base_url();?>user_assets/img/enlace/dsa.jpg'); background-size:100% 100%; background-repeat:no-repeat;">
							<div class="ch-info">
								<p><a href="http://dsa.uatf.edu.bo/webdsa/">DSA</a>Direccion de Servicios Academicos </p>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item" style="background:url('<?= base_url();?>user_assets/img/enlace/tvu.jpg'); background-size:100% 100%; background-repeat:no-repeat;">
							<div class="ch-info">
								<p><a href="http://tvupotosi.uatf.edu.bo/">TVU</a>Television Universitaria </p>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item" style="background:url('<?= base_url();?>user_assets/img/enlace/convenio.jpg'); background-size:100% 100%; background-repeat:no-repeat;">
							<div class="ch-info">
								<p><a href="http://mark1.uatf.edu.bo/public/all-agreements">CONVENIO</a>Convenios </p>
							</div>
						</div>
					</li>
				</ul>
						</div>
					</div>
				</div>	
			</section>
			<!-- End cta-two Area -->
<?php include_once 'footer.php'; ?>