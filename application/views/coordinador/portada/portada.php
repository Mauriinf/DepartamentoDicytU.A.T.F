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
        Portada
        <small>Listado Portada</small>
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
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal"><span class="fa fa-plus"></span> Agregar Portada</button>
            </div>            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="listafac" class="table table-bordered btn-hover">
    <thead>
      <tr>
        <td width="50px">ID</td>
        <td width="100px">Imagen</td>
        <td>Titulo</td>
        <td>Descripcion</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($portada as $row) {
      $datos=base_url('uploads/portada/'.$row->imagen); ?>
      <tr>
      <td><?= $no++;?></td>
      <td><img src="<?php echo $datos; ?>" width="70px" height="70px"/></td>
      <td><?= $row->titulo;?></td>
      <td><?= $row->descripcion; ?></td>
      <?php $dataportada=$row->id_portada.'*'.$datos.'*'.$row->descripcion;?>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-info btn-view-portada" data-toggle="modal" data-target="#verModalPor" value="<?php echo $dataportada;?>">
          <span class="fa fa-eye"></span></button>
          <a href="<?php echo base_url();?>portada/portada_modal/edit/<?= $row->id_portada;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
          <a data-toggle="modal" onclick="select_id(<?= $row->id_portada; ?>)" data-target="#deleteModal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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
    <form autocomplete="off" action="<?php echo base_url();?>portada/portada_modal/agregar" id="form_portada" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Portada</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Titulo</label>
            <div class="controls">
            <input type="text" name="titulo" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">descripcion</label>
            <div class="controls">
            <input type="text" name="desc" id="nomco" class="form-control input-sm">
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
  <form autocomplete="off" action="<?php echo base_url('portada/portada_modal/eliminar');?>" method="post" accept-charset="utf-8">
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
<div id="verModalPor" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form autocomplete="off">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de Portada</h4>
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