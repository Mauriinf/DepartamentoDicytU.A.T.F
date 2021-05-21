<?php include_once 'header.php'; ?>			
        <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Recursos Bibliograficos				
						  </h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span> <a href="<?= base_url('user_controller/recurso');?>"> Recursos Bibliograficos</a></p>
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
                    	<h3 style="color:#003366">RECURSOS BIBLIOGRAFICOS </h3></div>
                    	<table id="recurso" class="display">
							<thead style=" background:#006666; color:#fff; font-weight:800;">
							<tr align="center">
								<td>Imagen</td>
								<td>Recurso</td>
								<td>Descripcion</td>
								<td>Area de Conocimiento</td>
								<td>Pagina Web</td>
							</tr>
							</thead>
							<tbody>
							<?php if($recurso==false){ echo '';}
   							 else {foreach ($recurso as $row) {?>
							<tr align="justify" style="font-size:12px">
								<td><img src="<?= base_url('uploads/recurso/');?><?= $row->imagen;?>" style=" max-width:60px; height:auto;"></td>
								<td><?= $row->nombre;?></td>
								<td><?= $row->objetivo;?></td>
								<td><?= $row->area;?></td>
								<td><a href="<?= $row->url;?>" target="_blank"><?= $row->url;?></a></td>
							</tr>
							<?php } }?>   													
							</tbody></table>
							<br>							
						</div>
                    </div>
				</div>	
			</section>
			<!-- End post-content Area -->
<?php include_once 'footer.php'; ?>