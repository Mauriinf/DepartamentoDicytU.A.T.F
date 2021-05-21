<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recursos Bibliograficos
        <small>Editar Recursos Bibliograficos</small>
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
              <form autocomplete="off" action="<?php echo base_url('recursos/recursos_modal/editar');?>" id="form_recurso" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="txtId" value="<?php echo $recursos->id_recurso;?>">
                <div class="modal-body">
                <div class="control-group">
                <label class="control-label">Recurso</label>
                <div class="controls">
                <input type="text" name="titulo" id="titulo" class="form-control input-sm" value="<?php echo $recursos->nombre;?>">
                </div></div>
                <div class="control-group">
                <label class="control-label">Descripcion</label>
                <div class="controls">
                <textarea id="editor4" class="form-control textarea-sm" name="obj" > <?php echo $recursos->objetivo;?>                  
                        </textarea>
                </div></div>
                <div class="control-group">
                <label class="control-label">Area de Conocimiento</label>
                <div class="controls">
                <input type="text" name="area" id="fecha" class="form-control input-sm" value="<?php echo $recursos->area;?>">
                </div></div>
                <div class="control-group">
                <label class="control-label">Pagina Web</label>
                <div class="controls">
                <input type="url" name="url" class="form-control input-sm" value="<?php echo $recursos->url;?>">
                </div></div>
                <div class="control-group">
                <label class="control-label">Imagen</label>
                <img src="<?= base_url('uploads/recurso/');?><?= $recursos->imagen;?>" width="100px" height="100px">
                <div class="controls">
                <input type="file" name="file1" class="form-control input-sm" >
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