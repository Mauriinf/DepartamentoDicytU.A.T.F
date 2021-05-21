<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Personal
        <small>Editar Personal</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <form autocomplete="off" action="<?php echo base_url('personal/personal_modal/editar');?>" id="form_personal" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="txtId" value="<?php echo $personal->id_personal;?>">
                <div class="control-group">
                <label class="control-label">Nombre Completo</label>
                <div class="controls">
                <input type="text" name="nomc" id="nomco" value="<?php echo $personal->nombre_completo;?>" class="form-control input-sm">
                </div></div>
                <div class="control-group">
                <label class="control-label">Apellido Paterno</label>
                <div class="controls">
                <input type="text" name="apat" id="apat" value="<?php echo $personal->apellido_pat;?>" class="form-control input-sm">
                </div></div>
                <div class="control-group">
                <label class="control-label">Apellido Materno</label>
                <div class="controls">
                <input type="text" name="amat" id="amat" value="<?php echo $personal->apellido_mat;?>" class="form-control input-sm">
                </div></div>
                <div class="control-group">
                <label class="control-label">Cargo</label>
                <div class="controls">
                <select name="cargo" id="cargo" class="form-control">
                <?php foreach ($cargo as $cargoper):?>
                <?php if($cargoper->id_cargo == $personal->id_cargo): ?>
                  <option value="<?php echo $cargoper->id_cargo; ?>" selected><?php echo $cargoper->nombre_cargo; ?></option>
                <?php else: ?>
                  <option value="<?php echo $cargoper->id_cargo; ?>"><?php echo $cargoper->nombre_cargo; ?></option>
                <?php endif;?>
                <?php endforeach;?>
                </select>
                </div></div>
                <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                <input type="text" name="email" id="email" value="<?php echo $personal->correo;?>" class="form-control input-sm">
                </div></div>
                <label>Imagen</label>
                <div><img src="<?php echo base_url();?>uploads/personal/<?php echo $personal->imagen;?>" width="100px" height="100px"/></div>
                <input type="file" name="fileimagens" class="form-control input-sm">
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