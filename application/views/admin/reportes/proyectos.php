<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte
        <small>Listado Proyectos / Trabajos</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form autocomplete="off" action="<?php echo current_url();?>" method="POST" class="form-horizontal">
        <div class="form-group">
          <label class="col-md-2 control-label">Desde: </label>
          <div class="col-md-4">
            <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio:''; ?>">
          </div>
          <label class="col-md-2 control-label">Hasta: </label>
          <div class="col-md-4">
            <input type="date" class="form-control" name="fechafin" value="<?php echo !empty($fechafin) ? $fechafin:''; ?>">
          </div>
          </div>
          <div class="form-group">
          <label class="col-md-2 control-label">Por Carrera:</label>
          <div class="col-md-4">
          <input type="text" class="form-control" name="carrera" value="<?php echo !empty($carrera) ? $carrera:''; ?>">            
          </div>
          <label class="col-md-2 control-label">Por Gestion:</label>
          <div class="col-md-4">
          <input type="text" class="form-control" name="gestion" value="<?php echo !empty($gestion) ? $gestion:''; ?>">            
          </div>
          </div>
          <div class="form-group">
          <div class="col-md-3">
            <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
            <a href="<?php echo base_url();?>reportes/reportes" class="btn btn-danger">Restablecer</a>
          </div>
        </div>
        </form>
        </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="reporteproy" class="table table-bordered btn-hover" display>
    <thead>
      <tr>
        <td width="3px"><b>ID</b></td>
        <td width=""><b>TIPO<br>PROYECTO / TRABAJO</b></td>
        <td width=""><b>TITULO</b></td>
        <td width=""><b>AUTOR</b></td>
        <td width="80px"><b>TUTOR</b></td>
        <td width=""><b>FACULTAD</b></td>
        <td width="60px"><b>CARRERA</b></td>
        <td width="40px"><b>GESTIÓN</b></td>
        <td width="60px"><b>FECHA</b></td>
        <td><b>TIPO DE <br>INVESTIGACION</b></td>
        </tr>
    </thead>
    <tbody>
    <?php if ($proyecto==false) {
      echo '';
    }
    else {$no=1;
    foreach ($proyecto as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td><?= $row->nombre_investigador?></td>
      <td><?= $row->titulo_investigacion; ?></td>
      <?php
      if($row->autor=='1'){  $auto=$row->nombre_autor;} else { $auto=$row->nombre_completo.' '.$row->apellido_pat; }?>
      <td><?= $auto?></td>
      <td><?= $row->tutor;?></td>
      <td><?= $row->nombre_facultad;?></td>
      <td><?= $row->nombre_carrera;?></td>
      <td><?= $row->gestion;?></td>
      <td><?= $row->fecha;?></td>
      <td><?= $row->tipo_investigacion;?></td>
      </tr>
    <?php } }?>      
    </tbody>
  </table>
            </div>            
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>