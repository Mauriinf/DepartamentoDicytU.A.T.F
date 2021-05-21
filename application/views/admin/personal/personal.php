<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

<script type="text/javascript">
function select_id($id){
  $('#idBor').val($id);
}
</script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Personal
        <small>Listado Personal</small>
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
            <div class="col-md-12" align="right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal"><span class="fa fa-plus"></span> Agregar Personal</button>
            </div>            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="listafac" class="table table-bordered btn-hover">
    <thead>
      <tr>
        <td>ID</td>
        <td width="50px">Imagen</td>
        <td>Nombre Completo</td>
        <td width="80px">Apellidos</td>
        <td>Cargo</td>
        <td width="80px">Email</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    if($personal==false){
      echo '';
    }
    else {foreach ($personal as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td><img src="<?php echo base_url('uploads/personal/').$row->imagen;?>" width="50px" height="50px"/></td>
      <td><?= $row->nombre_completo; ?></td>
      <td><?= $row->apellido_pat.' '.$row->apellido_mat;?></td>
      <td><?= $row->nombre_cargo;?></td>
      <td><?= $row->correo;?></td>
      <?php $datapersonal=$row->id_personal.'*'.$row->nombre_completo.'*'.$row->apellido_pat.'*'.$row->apellido_mat.'*'.$row->nombre_cargo.'*'.$row->correo;?>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-info btn-view-personal" data-toggle="modal" data-target="#verModalP" value="<?php echo $datapersonal;?>">
          <span class="fa fa-eye"></span></button>
          <a href="<?php echo base_url();?>personal/personal_modal/edit/<?= $row->id_personal;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
          <a data-toggle="modal" onclick="select_id(<?= $row->id_personal; ?>)" data-target="#deleteModal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
        </div>
      </td>
      </tr>
    <?php } }?>      
    </tbody>
  </table>
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

<!--Modal insertar-->
<div id="Modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <form  autocomplete="off" action="<?php echo base_url();?>personal/personal_modal/agregar" id="form_personal" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Personal</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Nombre Completo</label>
            <div class="controls">
            <input type="text" name="nomco" id="nomco" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Apellido Paterno</label>
            <div class="controls">
            <input type="text" name="apat" id="apat" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Apellido Materno</label>
            <div class="controls">
            <input type="text" name="amat" id="amat" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Cargo</label>
            <div class="controls">
            <select name="cargo" id="cargo" class="form-control">
            <option></option>
              <?php foreach ($estraf as $cargo):?>
              <option value="<?php echo $cargo->id_cargo; ?>"><?php echo $cargo->nombre_cargo; ?></option>
              <?php endforeach?>
            </select>
            </div></div>
            <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
            <input type="text" name="email" id="email" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Imagen</label>
            <div class="controls">
            <input type="file" name="fileimagen" class="form-control input-sm">
            </div></div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Guardar Datos</button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal Eliminar-->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form autocomplete="off" action="<?php echo base_url('personal/personal_modal/eliminar');?>" method="post" accept-charset="utf-8">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d33724">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmar Eliminacion</h4>
      </div>
      <div class="modal-body">
      <input type="hidden"  name="idBor" id="idBor" value="0">
          Esta seguro de Eliminar el Registro..??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btnDelete" class="btn btn-danger">Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal ver-->
<div id="verModalP" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form autocomplete="off">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de Personal</h4>
      </div>
      <div class="modal-body">
      <input type="hidden"  name="idBor" id="idBor" value="0">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>