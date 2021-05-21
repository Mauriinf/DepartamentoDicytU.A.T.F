<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte
        <small>Listado carreras</small>
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
              <table id="reportecarre" class="table table-bordered table-responsive" style="margin-top: 20px;">
    <thead>
      <tr>
        <td width="20px">ID</td>
        <td>Facultad</td>
        <td>Carrera</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($carreras as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td><?= $row->nombref;?></td>
      <td><?= $row->nombre_carrera;?></td>
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