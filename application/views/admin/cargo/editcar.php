<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cargos
        <small>Editar Cargo</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <form autocomplete="off" action="<?php echo base_url('cargos/cargos_modal/editar');?>" method="post" id="form_car" accept-charset="utf-8">
                <input type="hidden" name="txtId" value="<?php echo $cargo->id_cargo;?>">
            <div class="control-group">
            <label class="control-label">Nombre del Cargo</label>
            <div class="controls">
            <input type="text" name="ncar" id="nombrecar" value="<?php echo $cargo->nombre_cargo;?>" class="form-control input-sm">
            </div></div>
            <br>
            <button type="submit" id="btnDelete" class="btn btn-primary">Modificar</button>
              </form>
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