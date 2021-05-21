<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<!-- Favicon-->
		<link rel="shortcut icon" href="<?= base_url('user_assets/');?>img/fav.png">
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>DICYT</title>

		
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="<?= base_url('user_assets/css/linearicons.css');?>">
			<link rel="stylesheet" href="<?= base_url('user_assets/css/font-awesome.min.css');?>">
			<link rel="stylesheet" href="<?= base_url('user_assets/css/bootstrap.css');?>">
			<link rel="stylesheet" href="<?= base_url('user_assets/css/magnific-popup.css');?>">
			<link rel="stylesheet" href="<?= base_url('user_assets/css/nice-select.css');?>">							
			<link rel="stylesheet" href="<?= base_url('user_assets/css/animate.min.css');?>">
			<link rel="stylesheet" href="<?= base_url('user_assets/css/owl.carousel.css');?>">			
			<link rel="stylesheet" href="<?= base_url('user_assets/css/jquery-ui.css');?>">			
			<link rel="stylesheet" href="<?= base_url('user_assets/css/main.css');?>">
      <link rel="stylesheet" href="<?= base_url('user_assets/css/social.css');?>">
      <link rel="stylesheet" href="<?= base_url('user_assets/css/style.css');?>">
      <link rel="stylesheet" href="<?= base_url('user_assets/css/responsive.css');?>">
      <link href="<?= base_url('user_assets/css/stylep.css');?>" rel="stylesheet" type="text/css" media="all" />
      <link rel="stylesheet" href="<?= base_url('user_assets/datatable/jquery.dataTables.min.css');?>">
      <link rel="stylesheet" type="text/css" href="<?= base_url('user_assets/engine1/style.css');?>" />

             <!--[if lt IE 8]>
               <div style=' clear: both; text-align:center; position: relative;'>
                 <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
                   <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
                </a>
              </div>
            <![endif]-->
                 <!--[if lt IE 9]>
                  <script src="js/html5shiv.js"></script>

                    <link  type="text/css" media="screen" href="css/ie.css">
                <![endif]--> 
                <!--hielo
                <link rel="stylesheet" href="<?= base_url();?>" /> -->
                <link rel="stylesheet" href="<?= base_url('assets3/css/flexslider.css');?>" type="text/css">
                <!--enlaces-->
                <link rel="stylesheet" type="text/css" href="<?= base_url('assets/enlace/demo.css');?>" />
                <link rel="stylesheet" type="text/css" href="<?= base_url('assets/enlace/common.css');?>" />
                <link rel="stylesheet" type="text/css" href="<?= base_url('assets/enlace/style2.css');?>" />
                <script type="text/javascript">
function mostrarPassword(){
    var cambio = document.getElementById("txtPassword");
    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 
</script>
<!--ligth-->
<link rel="stylesheet" href="<?= base_url('user_assets/ligth/css/prettyPhoto.css');?>" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />


			
		</head>
		<body>	
		  <header id="header" id="home">
	  		<div class="header-top" align="right">
        <div class="container">
	  			<div class="row">
              <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                <ul>
                <li><a href="https://www.facebook.com/DICYTUATFPOTOSI/" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/Dicyt2" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCBz24bjoUYbyRJqeXxXd29Q?view_as=subscriber" target="_blank"><i class="fa fa-youtube"></i></a></li>
                <li><a href="https://web.skype.com/" target="_blank"><i class="fa fa-skype"></i></a></li>
                
                </ul>     
              </div>
              <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
                <a href="<?= base_url('user_controller/contacto');?>"><span class="lnr lnr-envelope"></span> <span class="text" style="color:#0099cc"><i class="fa fa-envelope"></i> dicyt.uatf@gmail.com</span></a>
                <a href="#" onMouseover="this.style.color='#f7631b'" onMouseout="this.style.color='#fff'" id="loginButton"  data-toggle="modal" data-target="#exampleModalCenter"><span>INICIAR SESIÓN</span></a>     
              </div>
            </div>
			</div></div>
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="<?= base_url('');?>"><img src="<?= base_url('user_assets/img/logo1.png');?>" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="<?= base_url('user_controller/');?>">Inicio</a></li>
			          <li class="menu-has-children"><a href="">Nosotros</a>
                      	<ul>
                        	<li><a href="<?= base_url('user_controller/historia');?>">Historia</a></li>
                          <li><a href="<?= base_url('user_controller/mision');?>">Misión y Visión</a></li>
                          <li><a href="<?= base_url('user_controller/personal');?>">Personal</a></li>
                          <li><a href="<?= base_url('user_controller/marco');?>">Marco Normativo y Estratégico</a></li>
                        </ul>
                      </li>
			          <li class="menu-has-children"><a href="">Investigación</a>
                      	<ul>
                        	<li><a href="<?= base_url('user_controller/docente');?>">Trabajos de Investigación de docentes</a></li>
                            <li><a href="<?= base_url('user_controller/estudiante');?>">Trabajos de Investigación de estudiantes</a></li>
                            <li><a href="<?= base_url('user_controller/proyectos');?>">Proyectos de Investigación</a></li>
                            <li><a href="<?= base_url('user_controller/sociedades');?>">Sociedades Científicas</a></li>
                            
                        </ul>
                      </li>
			          <li class="menu-has-children"><a href="">Servicios</a>
                      	<ul>
                          <li><a href="http://svr1.uatf.edu.bo/becas2/index.php">Formularios de Postulación - Becas</a></li>                          
                        	<li><a href="https://www.minedu.gob.bo/index.php/acceso-a-recursos-de-informacion">Acceso a Red de Información Cientifíca</a></li>
                            <li class="menu-has-children"><a href="">Institutos de Trabajos de Investigacion</a>
                            	<ul>
                                <?php
                                    $facu = $this->db->query('select * from facultades order by nombre_facultad asc')->result();
                                    foreach ($facu as $dato) {?>
                                        <li><a href="<?= base_url('user_controller/facultad/');?><?php echo $dato->id_facultad;?>"><img src="<?= base_url('uploads/facultades/');?><?php echo $dato->imagen?>" width="20px" height="20px"/> &nbsp;&nbsp;<?php echo $dato->nombre_facultad;?></a></li>
                                        <?php
                                    }
                                ?> 
                                </ul>
                            </li>
                        </ul>
                      </li>
			          <li class="menu-has-children"><a href="">publicaciones</a>
                      	<ul>
                        	<li><a href="<?php echo base_url('user_controller/publicacion/')?>5">Revistas</a></li>
                          <li><a href="<?php echo base_url('user_controller/publicacion/')?>2">Boletines</a></li>
                          <li><a href="<?php echo base_url('user_controller/publicacion/')?>1">Articulos</a></li>
                          <li><a href="<?php echo base_url('user_controller/publicacion/')?>4">Noticias y Eventos</a></li>
                        </ul>
                      </li>
                       <li class="menu-has-children"><a href="">Ferias</a>
                      	<ul>
                        	<li><a href="<?= base_url('user_controller/convocatorias_investigacion');?>">Concocatoria a Ferias de Investigación</a></li>
                          <li><a href="<?php echo base_url('user_controller/convocatoria_be')?>">Convocatorias a Becas Auxiliares de Investigación</a></li>
                        </ul>
                      </li>
                      <li class="menu-has-children"><a href="">Cursos</a>
                      	<ul>
                        	<li><a href="<?php echo base_url('user_controller/becadi')?>">Oferta de Cursos</a></li>
                            
                        </ul>
                      </li>
                      <li><a href="<?= base_url('user_controller/recurso')?>">Recursos</a></li>
			          <li><a href="<?= base_url('user_controller/contacto')?>">Contactos</a></li>
                <!--<li><a href="<?= base_url('user_controller/ligon')?>">Contactos</a></li>-->
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header>
      <!-- #header -->
<!--/Login-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                
                <div class="modal-body" style="background-image:url('<?= base_url();?>user_assets/img/seguridad.jpg'); background-repeat: no-repeat; background-size: 100% 100%; ">
                    <div class="login px-4 mx-auto mw-100">
                        <h5 class="text-center mb-4" style="color:#0099cc">Introduzca sus datos de ingreso</h5>
                        <?php if($this->session->flashdata("error")):?>
                          <div class="alert alert-danger">
                            <p><?php echo $this->session->flashdata("error");?></p>
                          </div>
                        <?php endif; ?>
                        <form action="<?php echo base_url();?>logueo/login" method="post"  autocomplete="off">
                        <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                          <td rowspan="2" align="center" valign="middle"><img src="<?= base_url();?>user_assets/img/LOGO DICYT1.png" width="120px"></td>
                          <td>
                            <div class="form-group">
                                <label class="mb-2" style="color:#0099cc">Email</label><div class="input-group">
                                <span style="vertical-align:middle; background-color:#0099cc; width:30px;text-align:center; color:#ffffff "><i class="fa fa-envelope" style="margin-top: 12px;"></i></span>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="username" required>                                
                            </div></div>
                        </td>
                        </tr>
                        <tr>
                          <td>
                          <div class="form-group">
                                <label class="mb-2" style="color:#0099cc">contraseña</label><div class="input-group">
                                <span style="vertical-align:middle; background-color:#0099cc; width:30px;text-align:center; color:#ffffff"><i class="fa fa-lock" style="margin-top: 12px;"></i></span>
                                <input type="password" class="form-control" id="txtPassword" placeholder="" name="password" required>
                                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                            </div></div>
                          </td>
                        </tr>
                      </table>
                            <div align="right"><button type="submit" class="btn btn-primary submit mb-4" style="background-color:#0099cc; color:#ffffff;">Iniciar sesion</button></div>
                        </form>
                    </div>                    
                </div>
                
                </div>
        </div>
    </div>
    <!--//Login-->