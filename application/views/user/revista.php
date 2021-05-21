<!doctype html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<!-- viewport -->
<meta content="width=device-width,initial-scale=1" name="viewport">
<!-- title -->
<title>.:: Revista ::.</title>
<!-- add css and js for flipbook -->
<link type="text/css" href="<?= base_url();?>user_assets/revista/style.css" rel="stylesheet">
<style type="text/css">
body {
	background-image: url('<?php echo base_url('user_assets/img/fondo2.jpg');?>');
	background-repeat:no-repeat;
	background-size:100% 100%;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<script src="<?= base_url();?>user_assets/revista/jquery.js"></script>
<script src="<?= base_url();?>user_assets/revista/turn.js"></script>
<script src="<?= base_url();?>user_assets/revista/jquery.fullscreen.js"></script>
<script src="<?= base_url();?>user_assets/revista/jquery.address-1.6.min.js"></script>
<script src="<?= base_url();?>user_assets/revista/wait.js"></script>
<script src="<?= base_url();?>user_assets/revista/onload.js"></script>
</head>
<body>
<!-- DIV YOUR WEBSITE -->
<div style="width:100%;margin:0 auto">
<!-- BEGIN HTML BOOK -->
<div data-current="book5" class="fb5" id="fb5">
<!-- PRELOADER -->
<div id="fb5-container-book" >

<!-- BEGIN BOOK -->
<div id="fb5-book">
<?php if ($revista==false) {echo '';} else{ $no=1;
                                    foreach ($revista as $rev) { ?>  
<!-- pagina 1-->
            <div data-background-image="" class="">
            <!-- begin container page book -->
            <div class="fb5-cont-page-book" style="background-image:url('<?= base_url();?>uploads/revistas/<?= $rev->nombre_foto;?>'); background-repeat: no-repeat; background-size: 100% 100%; ">
            <!-- description for page -->
            <div class="fb5-page-book">
            </div>
            <!-- end description for page -->
            <!-- number page and title -->
            <!-- end number page and title -->
            </div>
            <!-- end container page book -->
            </div>
<!-- fin pagina 1 -->
<?php } }?> 

<!-- END BOOK -->
</div><div align="right" style="color:#FFF"><button><a href="<?= base_url()?>user_controller/publicacion/5" style="color:#f7631b" onMouseover="this.style.color='#003366'" onMouseout="this.style.color='#f7631b'"><span>Cerrar Revista</span></a></button></div>
<!-- END CONTAINER BOOK -->

</div>
<!-- END HTML BOOK -->
<!-- CONFIGURATION FLIPBOOK -->
<script>
jQuery('#fb5').data('config',
{
"page_width":"550",
"page_height":"650",
"zoom_double_click":"1",
"zoom_step":"0.06",
"double_click_enabled":"true",
"tooltip_visible":"true",
"toolbar_visible":"true",
"deeplinking_enabled":"true",
"rtl":"false",
'full_area':'true',
})
</script>
</div>
<!-- END DIV YOUR WEBSITE -->
</body>
</html>