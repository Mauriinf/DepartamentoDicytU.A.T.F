<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Portada
        <small>Editar Portada</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <form autocomplete="off" action="<?php echo base_url('portada/portada_modal/editar');?>" id="form_portada" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="txtId" value="<?php echo $portadas->id_portada;?>">
                <div class="control-group">
                <label class="control-label">Titulo</label>
                <div class="controls">
                <input type="text" name="titulo" id="desc" value="<?php echo $portadas->titulo;?>" class="form-control input-sm" maxlength="80">
                </div></div>
                <div class="control-group">
                <label class="control-label">Descripcion</label>
                <div class="controls">
                <input type="text" name="desc" id="desc" value="<?php echo $portadas->descripcion;?>" class="form-control input-sm" maxlength="170">
                </div></div>   
                <label>Imagen</label>
                <div><img src="<?php echo base_url();?>uploads/portada/<?php echo $portadas->imagen;?>" width="100px" height="100px"/></div>
                <input type="file" name="fileimagenp" class="form-control input-sm">
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