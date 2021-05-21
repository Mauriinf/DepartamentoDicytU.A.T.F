<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

<script type="text/javascript">
function select_id($id){
  $('#idBor').val($id);
}
</script>
<script type="text/javascript">
function select($id){
  $('#idnuevo').val($id);
}
</script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Publicaciones
        <small>Lista Imagenes de Revista</small>
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
              <button type="button" class="btn btn-primary btn-flat" onclick="select(<?= $id; ?>)" data-toggle="modal" data-target="#Modal" onclick="refresh()"><span class="fa fa-plus"></span> Agregar Imagenes</button>
            </div>            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="listafac" class="table table-bordered table-responsive" style="margin-top: 20px;">
    <thead>
      <tr>
        <td width="20px">ID</td>
        <td width="150px">Imagen</td>
        <td width="350px">Nombre Imagen</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($revista as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td align="center"><img src="<?= base_url('uploads/revistas/');?><?= $row->nombre_foto;?>" width="70px" height="90px"/></td>
      <td align="justify"><?= $row->nombre_foto;?></td>
      <td>
        <div class="btn-group">
          <a href="<?php echo base_url();?>publicacion/publicacion_modal/edit/<?php echo $row->id_foto; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
          <a data-toggle="modal" onclick="select_id(<?= $row->id_foto; ?>)" data-target="#deleteModal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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
  <div class="modal-dialog " role="document">
    <form autocomplete="off" action="<?php echo base_url();?>publicacion/publicacion_modal/agregarImage" id="form_revista" method="post" accept-charset="utf-8">
      <input type="hidden" name="txtId" id="idnuevo" value="0">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Publicación</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Imagenes</label>
            <div class="controls">
            <input type="file" name="files[]" class="form-control input-sm" multiple>
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
  <form autocomplete="off" action="<?php echo base_url('publicacion/publicacion_modal/eliminar');?>" method="post" accept-charset="utf-8">
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
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>