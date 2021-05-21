<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Convocatorias
        <small>Editar Convocatoria</small>
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
              <form autocomplete="off" action="<?php echo base_url('Convocatorias/convocatoria_modal/editar');?>" id="form_convocatoria" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="txtId" value="<?php echo $convo->id_convocatoria;?>">
                <?php if($convo->archivo==''){
                $datos=base_url('uploads/convocatorias/blanco.jpg');}
                else{
                $datos=base_url('uploads/convocatorias/'.$convo->archivo);
                }?>
                    <div class="control-group">
                    <label class="control-label">Titulo de Convocatoria</label>
                    <div class="controls">
                    <input type="text" name="titulo" id="titulo" class="form-control input-sm" value="<?php echo $convo->titulo;?>">
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Descripcion</label>
                    <div class="controls">
                    <textarea id="editor1" class="form-control textarera-sm" style="height: 300px" name="desc">
                    <?php echo $convo->descripcion;?>  
                    </textarea>
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Objetivo General</label>
                    <div class="controls">
                    <textarea id="editor2" class="form-control textarera-sm" style="height: 300px" name="resumen">
                    <?php echo $convo->resumen;?>
                    </textarea>
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Fecha Inicio</label>
                    <div class="controls">
                    <input type="date" name="fi" id="fi" class="form-control input-sm" value="<?php echo $convo->fecha_inicio;?>">
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Fecha Final</label>
                    <div class="controls">
                    <input type="date" name="ff" id="ff" class="form-control input-sm" value="<?php echo $convo->fecha_final;?>">
                    </div></div>
                    <label >Archivo</label>
                    <div><?php echo $convo->archivo;?></div>
                    <input type="file" name="fileimagens" class="form-control input-sm">
                    <div class="control-group">
                    <label class="control-label">Tipo de Convocatoria</label>
                    <div class="controls">
                      <select name="tipo_con" id="tipo_con" class="form-control">
                      <?php foreach ($tipocon as $tipo):?>
                        <?php if($tipo->id_tipo_convocatoria == $convo->id_tipo_convocatoria): ?>
                        <option value="<?php echo $tipo->id_tipo_convocatoria; ?>" selected><?php echo $tipo->nombre_tipo; ?></option>
                        <?php else: ?>
                        <option value="<?php echo $tipo->id_tipo_convocatoria; ?>"><?php echo $tipo->nombre_tipo; ?></option>
                        <?php endif;?>
                        <?php endforeach;?>
                      </select>
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