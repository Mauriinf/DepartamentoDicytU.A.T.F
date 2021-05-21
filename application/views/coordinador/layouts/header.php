<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>.:: UATF DICYT ::.</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plantilla/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plantilla/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plantilla/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plantilla/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plantilla/css/skins/_all-skins.min.css">
<!--validacion estilo-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/js/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/js/style.css">
  

   <link rel="stylesheet" href="<?php echo base_url();?>assets/plantilla/datatable/jquery.dataTables.min.css">
  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plantilla/js/jquery-3.1.1.min.js"></script>
  <!--textarea-->

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plantilla/iCheck/flat/blue.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plantilla/fullcalendar/fullcalendar.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plantilla/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plantilla/fullcalendar/fullcalendar.print.min.css" media="print">
  <!-- DataTables Export-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plantilla/datatables-export/css/buttons.dataTables.min.css">
  <script type="text/javascript">
function cambiaFondo(x){
  console.log(x.value);
  var body=document.getElementById("color");
  body.style.backgroundColor=x.value;
    }
</script>
<script type="text/javascript">
function select_id($nom){
  $('#idBor').val($id);
}
</script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url();?>assets/ckeditor/samples/js/sample.js"></script>
  <!--ajax archivo-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/dropzone.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/dropzone.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>UATF</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>UATF</b> DICYT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('uploads/user_img/');?><?php echo $this->session->userdata('img');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata("nombre").' '.$this->session->userdata("ap_pat");?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url('administrador/usuarios_modal/editp/');?><?= $this->session->userdata('id')?>" class="btn btn-default btn-flat">Datos Personales</a><br>
                  <a href="<?php echo base_url();?>logueo/cerrar" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>