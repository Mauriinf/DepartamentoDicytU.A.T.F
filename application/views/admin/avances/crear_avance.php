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
        Avances
        <small>Listado Avances</small>
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
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal"><span class="fa fa-plus"></span> Agregar Avances</button>
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
        <td>Usuario</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($usuario as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td><?= $row->nombre_completo;?></td>
      <td><?= $row->apellido_pat.' '.$row->apellido_mat;?></td>
      <td><?= $row->usuario;?></td>
      <td>
        <div class="btn-group">
          <a href="<?php echo base_url();?>avances/avances_modal/ver/<?php echo $row->id_usuario; ?>" class="btn btn-block btn-default btn-xs"><span class="glyphicon glyphicon-scale"></span> Ver Avance</a>
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
  <div class="modal-dialog modal-sm" role="document">
    <form action="<?php echo base_url();?>administrador/usuarios_modal/agregar" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Usuario</h4>
        </div>
        <div class="modal-body">
            <label>Nombre Completo</label>
            <input type="text" name="nomu" class="form-control input-sm">
            <label>Apellido Paterno</label>
            <input type="text" name="apat" class="form-control input-sm">
            <label>Apellido Materno</label>
            <input type="text" name="amat" class="form-control input-sm">
            <label>Carnet de Identidad</label>
            <input type="text" name="ci" class="form-control input-sm">
            <label>Direccion</label>
            <input type="text" name="direc" class="form-control input-sm">
            <label>Telefono</label>
            <input type="text" name="telf" class="form-control input-sm">
            <label>Email</label>
            <input type="text" name="email" class="form-control input-sm">
            <label>Usuario</label>
            <input type="text" name="usu" class="form-control input-sm">
            <label>Imagen</label>
            <input type="file" name="fileimagen" class="form-control input-sm">
            <label>Contraseña</label>
            <input type="password" name="contra" class="form-control input-sm">
            <label>Rol</label>
            <select name="rol" id="rol" class="form-control">
              <?php foreach ($estraf as $rol):?>
              <option value="<?php echo $rol->id; ?>"><?php echo $rol->nombre; ?></option>
              <?php endforeach?>
            </select>
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
  <form action="<?php echo base_url('administrador/usuarios_modal/eliminar');?>" method="post" accept-charset="utf-8">
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
  <form>
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