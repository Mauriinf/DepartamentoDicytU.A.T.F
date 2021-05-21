<?php include_once 'header.php'; ?>
<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Sociedades Científicas		
						  </h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span> <a href="<?= base_url('user_controller/sociedades');?>"> Sociedades Científicas</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
        <div class="col-lg-12" align="center">
        <p>&nbsp;</p>
        	<div align="center" >
            	<h3 style="color:#003366">Sociedades Científicas</h3>
            </div>
			<div class="widget-wrap">
			<div class="single-sidebar-widget tag-cloud-widget" style="color:#000; font-size:18px">
			<?php foreach ($pfac as $fac) { ?>
			    <h4 class="tagcloud-title"><img src="<?= base_url('uploads/facultades/');?><?php echo $fac->imagen?>" width="40px" height="40px"/>&nbsp;<?php echo $fac->nombre_facultad;?></h4>
			    <ul>
						<?php foreach ($pcar as $car) {
							if ($fac->id_facultad == $car->id_facultad) { ?>
							<?php if($car->imagenc==''){?>
							<li style="color:#003366">&nbsp; <?php echo $car->nombre_carrera;?></li>
							<?php } else{ ?>
							<li style="color:#003366"><img src="<?= base_url('uploads/carrera/');?><?php echo $car->imagenc?>" width="30px" height="30px"/>&nbsp; <?php echo $car->nombre_carrera;?></li>
							<?php }?>
							<?php }
						}?>
						</ul>
						<?php					
				}
			?></div>								
		  	</div>
		</div>
<?php include_once 'footer.php'; ?>