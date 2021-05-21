<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<br>
<table border="0">
  <tr>
    <td><img src="user_assets/img/cabe.jpg" style="width: 20px; height: auto;"></td>
    <td><div style="font-size:10px;">Dirección de Investigación Científica y Técnica</div></td>
  </tr>
</table>
<hr>
<?php foreach ($deta as $detalle) { ?>
<div style="background-image:url('<?= base_url();?>user_assets/img/marca.jpg');">
<table width="100%" border="0">
<tr>
<td colspan="2" align="center"><br><b style="font-size:22px;">UNIVERSIDAD AUTÓNOMA " TOMAS FRÍAS " </b><br>
  <b style="font-size:18px;">FACULTAD DE <?php echo strtoupper($detalle->nombre_facultad);?></b><br>
  <b style="font-size:18px;">CARRERA DE <?php echo strtoupper($detalle->nombre_carrera);?></b>
</td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="2"><br><img src="user_assets/img/uatf.png" width="220px" height="auto"/></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="2" height="150px" valign="top"><b style="font-size:19px;"><?php echo $detalle->titulo_investigacion;?></b></td>
</tr>
<tr>
<td colspan="2"><br>
<div style="width:100%; height:300px">
<table width="95%">
	<tr>
		<td align="right" valign="top"><b>Autor (es):</b></td>
		<td align="left" valign="top" ><?php $cadena=$detalle->nombre_autor; $array = explode("-", $cadena);
							    for($i=0; $i<count($array); $i++)
							      {
							      //saco el valor de cada elemento
								  echo $array[$i];
								  echo "<br>";
							      }?></td>
	</tr>
	<?php if($detalle->tipo_investigador==2){?> 
	<tr>
		<td align="right" valign="top"><b>Tutor:</b></td>
		<td align="left" valign="top" ><?php echo $detalle->tutor;?></td>
	</tr>
	<?php }?>
</table>
</div>
</td>
</tr>
<tr>
	<td align="center" colspan="2">Potosí - Bolivia </td>
</tr>
<tr>
	<td align="center" colspan="2"><?php echo $detalle->gestion?></td>
</tr>
</table>
<br>
<b>Resumen:</b><br><div align="justify"><?php echo $detalle->resumen;?></div><br>
<b>Objetivo General:</b><br><div align="justify"><?php echo $detalle->objetivo_general;?></div><br>
<b>Conclusiones:</b><br><div align="justify"><?php echo $detalle->conclusiones;?></div>
</div>
<?php } ?>
</body>
</html>
