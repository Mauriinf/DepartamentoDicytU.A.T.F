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
        Usuarios
        <small>Listado Ususarios</small>
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
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal"><span class="fa fa-plus"></span> Agregar Usuario</button>
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#ModalDir"><span class="fa fa-plus"></span> Agregar Director Instituto de Investigación</button>
            </div>            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="listafac" class="table table-bordered table-responsive" style="margin-top: 20px;">
    <thead>
      <tr>
        <td>ID</td>
        <td>Nombre Completo</td>
        <td>Apellidos</td>
        <td>Imagen</td>
        <td>Email</td>
        <td>Usuario</td>
        <td>Rol</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($usuario as $row) {?>
    <?php if($row->imagen==''){
      $datos=base_url('uploads/user_img/blanco.jpg');}
      else{
        $datos=base_url('uploads/user_img/'.$row->imagen);
        }?>
      <tr>
      <td><?= $no++;?></td>
      <td><?= $row->nombre_completo;?></td>
      <td><?= $row->apellido_pat.' '.$row->apellido_mat;?></td>
      <td><img src="<?php echo $datos;?>" width="100px" heidth="100px"></td>
      <td><?= $row->email;?></td>
      <td><?= $row->usuario;?></td>
      <td><?= $row->nombrerol;?></td>
      <?php $datausuario=$row->id_usuario.'*'.
      $row->nombre_completo.'*'.
      $row->apellido_pat.'*'.
      $row->apellido_mat.'*'.
      $row->ci.'*'.
      $row->direccion.'*'.
      $row->telefono.'*'.
      $row->email.'*'.
      $row->usuario.'*'.
      $row->nombrerol; ?>
      <td>
        <div class="btn-group">
          <?php if($row->nombrerol!='admin'):?>
          <button type="button" class="btn btn-info btn-view-usuario" data-toggle="modal" data-target="#verModalU" value="<?php echo $datausuario; ?>">
          <span class="fa fa-eye"></span></button>          
          <a href="<?php echo base_url();?>administrador/usuarios_modal/edit/<?php echo $row->id_usuario; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
          <a data-toggle="modal" onclick="select_id(<?= $row->id_usuario; ?>)" data-target="#deleteModal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
        <?php endif;?>
        </div>
      </td>
      </tr>
    <?php } ?>      
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
  <div class="modal-dialog" role="document">
    <form autocomplete="off" action="<?php echo base_url();?>administrador/usuarios_modal/agregar" id="from_usuario" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Usuario</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Nombre Completo</label>
            <div class="controls">
            <input type="text" name="nomu" id="nomu" class="form-control input-sm">
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
            <label class="control-label">Carnet de Identidad</label>
            <div class="controls">
            <input type="text" name="ci" id="ci" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Direccion</label>
            <div class="controls">
            <input type="text" name="direc" id="direc" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Telefono</label>
            <div class="controls">
            <input type="text" name="telf" id="telf" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
            <input type="text" name="email" id="email" class="form-control input-sm">
            </div></div>
            <input type="hidden" name="rol" value="3" class="form-control input-sm">
            <div class="control-group">
            <label class="control-label">Imagen</label>
            <div class="controls">
            <input type="file" name="fileimagen" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Facultad</label>
            <div class="controls">
            <select name="facultadp" id="facultadp" class="form-control">
              <option></option>
              <?php foreach ($estrap as $facu):?>
              <option value="<?php echo $facu->id_facultad; ?>"><?php echo $facu->nombre_facultad; ?></option>
              <?php endforeach?>
            </select >
            </div></div>
            <div class="control-group">
            <label class="control-label">Carrera</label>
            <div class="controls">
            <select name="carrerap" id="carrerap" class="form-control">
              <option></option>
            </select>
            </div></div>
            <div class="control-group">
            <label class="control-label">Seleccione Tipo de Investigador</label>
            <div class="controls">
              <input type="radio" name="RadioGroup1" value="1" >Investigador Docente
              <input type="radio" name="RadioGroup1" value="2" >Investigador Estudiante<br>
            </div></div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Guardar Datos</button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Modal insertar director-->
<div id="ModalDir" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form autocomplete="off" action="<?php echo base_url();?>administrador/usuarios_modal/agregar" id="from_usuario1" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Director Instituto de Investigación</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Nombre Completo</label>
            <div class="controls">
            <input type="text" name="nomu" id="nomu" class="form-control input-sm">
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
            <label class="control-label">Carnet de Identidad</label>
            <div class="controls">
            <input type="text" name="ci" id="ci" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Direccion</label>
            <div class="controls">
            <input type="text" name="direc" id="direc" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Telefono</label>
            <div class="controls">
            <input type="text" name="telf" id="telf" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
            <input type="text" name="email" id="email" class="form-control input-sm">
            </div></div>
            <input type="hidden" name="rol" value="2" class="form-control input-sm">
            <div class="control-group">
            <label class="control-label">Imagen</label>
            <div class="controls">
            <input type="file" name="fileimagen" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Facultad</label>
            <div class="controls">
            <select name="facultadp" id="facultadp1" class="form-control">
              <option></option>
              <?php foreach ($estrap as $facu):?>
              <option value="<?php echo $facu->id_facultad; ?>"><?php echo $facu->nombre_facultad; ?></option>
              <?php endforeach?>
            </select >
            </div></div>
            <div class="control-group">
            <label class="control-label">Carrera</label>
            <div class="controls">
            <select name="carrerap" id="carrerap1" class="form-control">
              <option></option>
            </select>
            </div></div>
            <input type="radio" name="RadioGroup1" value="0" hidden="true" checked="checked">
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
  <form autocomplete="off" action="<?php echo base_url('administrador/usuarios_modal/eliminar');?>" method="post" accept-charset="utf-8">
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
<div id="verModalU" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form autocomplete="off">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de Carrera</h4>
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