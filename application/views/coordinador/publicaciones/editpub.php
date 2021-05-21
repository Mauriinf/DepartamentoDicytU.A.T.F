<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Publicaciones
        <small>Editar Publicacion</small>
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
              <form autocomplete="off" action="<?php echo base_url('publicacion/publicacion_modal/editar');?>" id="form_publicacion" method="post" accept-charset="utf-8">
                <input type="hidden" name="txtId" value="<?php echo $publi->id_publicacion;?>">
                <div class="control-group">
                <label class="control-label">Titulo</label>
                <div class="controls">
                <input type="text" name="titulo" id="titulo" value="<?php echo $publi->titulo;?>" class="form-control input-sm">
                </div></div>
                <div class="control-group">
                <label class="control-label">Descripcion</label>
                <div class="controls">
                <textarea id="editor" class="form-control textarera-sm" style="height: 300px" name="desc">
                <?php echo $publi->descripcion;?>
                </textarea>
                </div></div>
                <div class="control-group">
                <label class="control-label">Tipo de Plublicación</label>
                <div class="controls">
            <select name="tipo" id="facu" class="form-control">
            <?php foreach ($tipo as $con):?>
              <?php if($con->id_tipo_publi == $publi->id_tipo_publi): ?>
              <option value="<?php echo $con->id_tipo_publi; ?>" selected><?php echo $con->nombre_publicacion; ?></option>
              <?php else: ?>
              <option value="<?php echo $con->id_tipo_publi; ?>"><?php echo $con->nombre_publicacion; ?></option>
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