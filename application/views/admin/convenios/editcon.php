<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Convenios
        <small>Editar Convenio</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <?php
      $data=$this->session->flashdata('ok');
      if($data!=""){?>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $data;?>
        <span aria-hidden="true"></span>
        </div>
      <?php } ?>
      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <form autocomplete="off" action="<?php echo base_url('convenio/convenio_modal/editar');?>" id="form_convenio" method="post" accept-charset="utf-8">
                <input type="hidden" name="txtId" value="<?php echo $conven->id_convenios;?>">
                <div class="control-group">
                <label class="control-label">Titulo</label>
                <div class="controls">
                <input type="text" name="titulo" id="titulo" value="<?php echo $conven->titulo;?>" class="form-control input-sm">
                </div></div>
                <div class="control-group">
                <label class="control-label">Descripcion</label>
                <div class="controls">
                <textarea id="editor4" class="form-control textarea-sm" name="desc">
                  <?php echo $conven->descripcion;?>
                </textarea>
                </div></div>
                <div class="control-group">
                <label class="control-label">Tipo de Convenio</label>
                <div class="controls">
            <select name="tipo" id="facu" class="form-control">
            <?php foreach ($tipo as $con):?>
              <?php if($con->id_convenio == $conven->tipo_convenio): ?>
              <option value="<?php echo $con->id_convenio; ?>" selected><?php echo $con->nombre_convenio; ?></option>
              <?php else: ?>
              <option value="<?php echo $con->id_convenio; ?>"><?php echo $con->nombre_convenio; ?></option>
              <?php endif;?>
              <?php endforeach;?>
            </select></div></div>
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