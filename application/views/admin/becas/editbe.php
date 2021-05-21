<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Curso
        <small>Editar Curso</small>
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
              <form action="<?php echo base_url('becas/becas_modal/editar');?>" id="form_beca" method="post" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off">
              <?php if($beca->imagen==''){
                $datos=base_url('uploads/becas/blanco.jpg');}
                else{
                $datos=base_url('uploads/becas/'.$beca->imagen);
                }?>
                <input type="hidden" name="txtId" value="<?php echo $beca->id_beca;?>">
                <div class="control-group">
                <label class="control-label">Titulo</label>
                <div class="controls">
                <input type="text" name="titulo" id="titulo" value="<?php echo $beca->titulo;?>" class="form-control input-sm">
                </div></div>
                <div class="control-group">
                <label class="control-label">Descripcion</label>
                <div class="controls">
                <textarea id="editor4" class="form-control textarea-sm" name="desc">
                <?php echo $beca->descripcion;?>
                </textarea>
                </div></div>
                <div class="control-group">
                <label class="control-label">fecha</label>
                <div class="controls">
                <input type="date" name="fecha" id="fecha" class="form-control input-sm" value="<?php echo $beca->fecha;?>">
                </div></div>
                <br>
                <label>Imagen</label>
                <img src="<?php echo $datos;?>" width="150px" height="200px">
                <input type="file" name="fileimagens" class="form-control input-sm"><br>
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