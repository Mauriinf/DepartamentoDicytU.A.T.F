<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte
        <small>Reporte Ususarios</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form autocomplete="off" action="<?php echo current_url();?>" method="POST" class="form-horizontal">
          <div class="form-group">
          <label class="col-md-2 control-label">Por Gestion:</label>
          <div class="col-md-4">
          <input type="text" class="form-control" name="gestion" value="<?php echo !empty($gestion) ? $gestion:''; ?>">            
          </div>
          </div>
          <div class="form-group">
          <div class="col-md-3">
            <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
            <a href="<?php echo base_url();?>reportes/reportes/usuario" class="btn btn-danger">Restablecer</a>
          </div>
        </div>
        </form>
          <div class="row">
            <div class="col-md-12">
              <table id="reporteusuario" class="table table-bordered btn-hover" display>
    <thead>
      <tr>
        <td>Nombre<br>Completo</td>
        <td>Apellidos</td>
        <td>Carnet de<br>Identidad</td>
        <td>Direccion</td>
        <td>Telefono</td>
        <td>Email</td>
        <td>Facultad</td>
        <td>Carrera</td>
        <td>Gestion</td>
        <td>Tipo<br>Investigador</td>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($usuario as $row) {
      if($row->rol_id!=1 and $row->rol_id!=4){?>

      <tr>
      <td><?= $row->nombre_completo;?></td>
      <td><?= $row->apellido_pat.' '.$row->apellido_mat;?></td>
      <td><?= $row->ci;?></td>
      <td><?= $row->direccion;?></td>
      <td><?= $row->telefono;?></td>
      <td><?= $row->email;?></td>
      <td><?= $row->nombre_facultad;?></td>
      <td><?= $row->nombre_carrera?></td>
      <td><?= $row->gestion;?></td>
      <td><?= $row->nombre_investigador;?></td>
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