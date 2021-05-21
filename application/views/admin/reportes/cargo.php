<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reportes
        <small>Listado de Cargos</small>
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
              <table id="reportecargo" class="table table-bordered btn-hover">
    <thead>
      <tr>
        <td width="30px">ID</td>
        <td>Nombre del Cargo</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($cargos as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td><?= $row->nombre_cargo?></td>
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