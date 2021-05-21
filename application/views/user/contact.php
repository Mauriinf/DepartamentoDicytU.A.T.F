<?php include_once 'header.php';?>
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contactos				
							</h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/index');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?= base_url('user_controller/contacto');?>"> Contactos </a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="map-wrap" style="width:100%; height: 445px;"><iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d814.3202659089517!2d-65.7633573!3d-19.5555814!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses!2sbo!4v1572478276842!5m2!1ses!2sbo" width="100%" height="445px" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
						
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Potosi, Bolivia</h5>
									<p>
										Ciudadela Universitaria Edificio del Vicerrectorado 1° Piso
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>+591 26227319</h5>
									<p>Lunes a Viernes de 8:00 a 12:00 - 14:00 a 18:00</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>dicyt.uatf@gmail.com</h5>
									<p>Contactanos con nosotros!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form class="form-area contact-form text-right"  action="<?php echo base_url();?>user_controller/email" method="post">
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input name="name" placeholder="Introduce tu Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required type="text">
									
										<input name="email" placeholder="Introduce tu Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required type="email">

										<input name="subject" placeholder="Asunto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required type="text">
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="message" placeholder="Mensaje" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required></textarea>				
									</div>
									<div class="col-lg-12">
									<?php
								      $data=$this->session->flashdata('ok');
								      if($data!=""){?>
								        <div class="alert-msg" style="text-align: left;">
								        <?php echo $data;?>
								        <span aria-hidden="true"></span>
								        </div>
								      <?php } ?>
										<div class="alert-msg" style="text-align: left;"></div>
										<button type="submit" class="genric-btn primary" style="float: right;">Enviar</button>											
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->
<?php include_once 'footer.php'; ?>