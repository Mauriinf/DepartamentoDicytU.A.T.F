<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte
        <small>Listado Personal</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="reporteper" class="table table-bordered btn-hover">
    <thead>
      <tr>
        <td>ID</td>
        <td width="50px">Imagen</td>
        <td>Nombre Completo</td>
        <td width="80px">Apellidos</td>
        <td>Cargo</td>
        <td width="80px">Email</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($personal as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td><img src="<?php echo base_url('uploads/personal/').$row->imagen;?>" width="50px" height="50px"/></td>
      <td><?= $row->nombre_completo; ?></td>
      <td><?= $row->apellido_pat.' '.$row->apellido_mat;?></td>
      <td><?= $row->nombre_cargo;?></td>
      <td><?= $row->correo;?></td>
      </tr>
    <?php } ?>      
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