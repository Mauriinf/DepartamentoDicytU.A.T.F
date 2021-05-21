<?php include_once 'header.php';?>  
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Personal		
							</h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/index');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?= base_url('user_controller/personal');?>"> Personal</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->
<!-- Start search-course Area -->
<section class="search-course-area relative">
	<div class="overlay overlay-bg"></div>
		<div class="container"><br><br>
        	<div class="testimonials-grids">
		<div class="wmuSlider example1 animated wow slideInUp" data-wow-delay=".2s">
		<?php foreach ($personal as $per) {?>
                    <?php
                    $imagen=$per->imagen;
                    $nombre=$per->nombre_completo;
                    $app=$per->apellido_pat;
                    $apm=$per->apellido_mat;
                    $cargo=$per->nombre_cargo;
                    $correo=$per->correo;
                    $id=$per->id_personal;
                    ?>
			<article style="position:relative; width: 100%; opacity: 0;"> 
				<div class="banner-wrap">
					<br><br>
						<img src="<?= base_url('uploads/personal/');?><?php echo $imagen;?>" class="circle" width="250px" height="250px"/>
						<div style="font-size:24px; color:#0099cc;"><?php echo $nombre.' '.$app.' '.$apm;?>.</div>
						<span style="font-size:18px; color:#0099cc;"><?php echo $cargo;?></span><br>
						<a style="font-size:16px; color:#0099cc;"><?php echo $correo;?></a>
					
				</div>
			</article>
			<?php }?>
		</div> 
	</div>                   
        <br/><br><br>
		</div>				
	</div>	
</section>
			<!-- End search-course Area -->
<?php include_once 'footer.php';?>