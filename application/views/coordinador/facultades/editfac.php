<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Facultades
        <small>Editar Facultad</small>
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
              <form autocomplete="off" id="form_fac" action="<?php echo base_url('facultades/facultades_modal/editar');?>" method="post" accept-charset="utf-8">
                <input type="hidden" name="txtId" value="<?php echo $facultad->id_facultad;?>">
                <div class="control-group">
            <label class="control-label">Nombre de Facultad</label>
            <div class="controls">
            <input type="text" name="nombrefac" id="nombrefac" value="<?php echo $facultad->nombre_facultad;?>" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <img src="<?= base_url()?>uploads/facultades/<?= $facultad->imagen?>" width="100" height="100">
            <label class="control-label">Imagen de Facultad</label>
            <div class="controls">
            <button type="button" class="btn btn-flat" data-toggle="modal" data-target="#Modal">¿ Cambiar Imagen de Facultad ?</button>
            </div></div>
            <div class="control-group">
            <img src="<?= base_url()?>uploads/facultades/<?= $facultad->imagenr?>" width="100" height="100">
            <label class="control-label">Imagen Relacionada a su Facultad</label>
            <div class="controls">
            <button type="button" class="btn btn-flat" data-toggle="modal" data-target="#ModalR">¿ Cambiar Imagen de Facultad Relacionada ?</button>
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
  <!--Modal insertar imagen fac-->
<div id="Modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form autocomplete="off" action="<?php echo base_url();?>facultades/facultades_modal/editImagen" id="form_fac" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modificar Imagen de Facultad</h4>
        </div>
        <div class="modal-body">
         <input type="hidden" name="txtId" value="<?php echo $facultad->id_facultad;?>">
            <div class="control-group">
            <label class="control-label">Imagen</label>
            <div class="controls">
            <input type="file" name="file" id="file" class="form-control input-sm">
            </div></div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Guardar Datos</button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Modal insertar imagen fac rel-->
<div id="ModalR" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form autocomplete="off" action="<?php echo base_url();?>facultades/facultades_modal/editImagenr" id="form_fac" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modificar Imagen Relacionada a Facultad</h4>
        </div>
        <div class="modal-body">
         <input type="hidden" name="txtId" value="<?php echo $facultad->id_facultad;?>">
            <div class="control-group">
            <label class="control-label">Imagen</label>
            <div class="controls">
            <input type="file" name="file" id="file" class="form-control input-sm">
            </div></div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Guardar Datos</button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>