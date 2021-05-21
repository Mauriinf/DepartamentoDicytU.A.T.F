			<?php include_once 'header.php'; ?>
            <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Detalles de Investigacion				
							</h1>	
							<p class="text-white link-nav"><a href="<?= base_url('user_controller/');?>">Inicio </a>  <span class="lnr lnr-arrow-right"></span> <a href="#"> Detalles de Investigacion</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
					<div class="col-lg-1"></div>
						<div class="col-lg-10 posts-list">
						<?php foreach ($deta as $detalle) { ?>
						  <div class="single-post row">
						  <div class="col-lg-12">
						  <table width="100%"  border="0" cellpadding="5">
							  <tr>
							    <td width="100" rowspan="10" valign="top"><img src="<?= base_url('uploads/proyectos/facultades/').$detalle->rela;?>" width="300" height="320" alt=""></td>
							    <td width="150" align="right" valign="top"><h5><b>Titulo: </b></h5></</td>
							    <td valign="top" align="justify"><h5 style="color:#003366;"><?php if ($detalle->titulo_investigacion=="no disponible") {
								echo mb_strtoupper($detalle->titulo_investigacion);
							}
							else{echo $detalle->titulo_investigacion;}?></h5></td>
							  </tr>
							  <tr>
							    <td width="150" align="right" valign="top"><b>Objetivo General:</b></td>
							    <td valign="top" align="justify"><p><?php if ($detalle->objetivo_general=="no disponible") {
								echo mb_strtoupper($detalle->objetivo_general);
							}
							else{ echo $detalle->objetivo_general;}?></p></td>
							  </tr>
							  <tr>
							    <td width="150" align="right" valign="top"><b>Resumen: </b></td>
							    <td valign="top" align="justify"><p><?php if ($detalle->resumen=="no disponible") {
								echo mb_strtoupper($detalle->resumen);
							}
							else{ echo $detalle->resumen;}?></p></td>
							  </tr>
							  <tr>
							    <td width="150" align="right" valign="top"><b>Conclusiones: </b></td>
							    <td valign="top" align="justify"><p><?php if ($detalle->conclusiones=="no disponible") {
								echo mb_strtoupper($detalle->conclusiones);
							}
							else{ echo $detalle->conclusiones;}?></p></td>
							  </tr>
							  <tr>
							    <td width="150" align="right" valign="top"><b>Autor (es): </b></td>
							    <td valign="top" align="justify"><p><?php $cadena=$detalle->nombre_autor; $array = explode("-", $cadena);
							    for($i=0; $i<count($array); $i++)
							      {
							      //saco el valor de cada elemento
								  echo $array[$i];
								  echo "<br>";
							      }?></p></td>
							  </tr>
							  <?php if($detalle->tipo_investigador==2){?>
                              <tr>
                              <td width="150" align="right" valign="top"><b>Tutor: </b></td>
                              <td valign="top" align="justify"><p><?php if ($detalle->tutor=="no disponible") {
								echo mb_strtoupper($detalle->tutor);
							}
							else{ echo mb_strtoupper ($detalle->tutor);}?></p></td>
                              </tr>
                              <?php } ?>
							  <tr>
							    <td width="150" align="right" valign="top"><b>Carrera: </b></td>
							    <td valign="top" align="justify"><p><?php echo $detalle->nombre_carrera;?></p></td>
							  </tr>
                              <tr>
                              <td width="150" align="right" valign="top"><b>Gestión: </b></td>
                              <td valign="top" align="justify"><p><?php if ($detalle->resumen=="no disponible") {
								echo mb_strtoupper($detalle->resumen);
							}
							else{ echo $detalle->gestion;}?></p></td>
                              </tr>
                              <tr>
							    <td width="150" align="right" valign="top"><b>Tipo de Investigación: </b></td>
							    <td valign="top" align="justify"><p><?php echo mb_strtoupper ($detalle->tipo_investigacion);?></p></td>
							  </tr>
							  <tr>
							    <td width="150" align="right" valign="top"><b>Fecha de Publicación: </b></td>
							    <td valign="top" align="justify"><p><?php setlocale(LC_TIME, "spanish");
                              $Nueva_Fecha = date("d-m-Y", strtotime($detalle->fecha));
                              $Mes_Anyo = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));
                              echo $Mes_Anyo;?></p></td>
							  </tr>
							  <tr>
							    <td colspan="3" align="right" valign="top"><a href="<?php echo base_url('user_controller/pdfdetalle/');?><?php echo $detalle->id_investigacion.'/';?><?php echo $detalle->visitas;?>" target="_blank">Descargar Archivo Adjunto</a></td>
							  </tr>
							</table>
							<?php }?>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
            <?php include_once 'footer.php';?>