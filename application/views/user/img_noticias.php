<?php include_once 'header.php'; ?>			
        <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Imagenes Noticias y Eventos				
						  </h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span> <a href="<?php echo base_url('user_controller/noticiaevento/').$id;?>"> Imagenes Noticias y Eventos</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  

			<!-- Start top-category-widget Area --><!-- End top-category-widget Area -->
			
			<!-- Start post-content Area -->
			<section class="post-content-area">
				<div class="container">
					<div class="row" >
                    	<div class="col-lg-12 col-md-12" align="justify"><div align="center">
                    	<p>&nbsp;</p>
                    	<h3 style="color:#003366"></h3></div>
                    	<div class="conto">
			<ul class="gallery">
			<?php if($imagenes!= false):?>
				<?php foreach ($imagenes as $row):?>
            <li class="caja"><a href="<?= base_url()?>uploads/noticias/<?= $row->nombre;?>" rel="prettyPhoto[gallery1]"><img src="<?= base_url()?>uploads/noticias/<?= $row->nombre;?>" width="100" height="100" /></a></li>
			<?php endforeach;?>
			<?php endif;?>
			</ul></div>
							<br>							
						</div>
                    </div>
				</div>	
			</section>
			<!-- End post-content Area -->
<?php include_once 'footer.php'; ?>