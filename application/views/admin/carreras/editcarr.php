<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Carreras
        <small>Editar Carrera</small>
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
              <form autocomplete="off" action="<?php echo base_url('carreras/carreras_modal/editar');?>" id="form_carrera" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="txtId" value="<?php echo $carreras->id_carrera;?>">
                <label>Facultad</label>
            <select name="facu" id="facu" class="form-control">
            <?php foreach ($estraf as $estadofac):?>
              <?php if($estadofac->id_facultad == $carreras->id_facultad): ?>
              <option value="<?php echo $estadofac->id_facultad; ?>" selected><?php echo $estadofac->nombre_facultad; ?></option>
              <?php else: ?>
              <option value="<?php echo $estadofac->id_facultad; ?>"><?php echo $estadofac->nombre_facultad; ?></option>
              <?php endif;?>
              <?php endforeach;?>
            </select>
            <div class="control-group">
            <label class="control-label">Nombre de Carrera</label>
            <div class="controls">
            <input type="text" name="nfac" id="nomcarrera" value="<?php echo $carreras->nombre_carrera;?>" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Imagen</label>
            <?php if($carreras->imagenc==''){?>
            <td><img src="<?= base_url('uploads/carrera/')?><?= 'blanco.jpg';?>" width="100px" height="100px"></td>
            <?php } else { ?>
            <td><img src="<?= base_url('uploads/carrera/')?><?= $carreras->imagenc?>" width="100px" height="100px"></td>
            <?php } ?>
            <div class="controls">
            <input type="file" name="file" id="file" class="form-control input-sm">
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