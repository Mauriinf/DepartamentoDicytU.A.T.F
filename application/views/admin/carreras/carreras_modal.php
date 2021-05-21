<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

<script type="text/javascript">
function select_data($id,$nombre,$abre,$estado){
  $('#txtId').val($id);
  $('#nombrefac').val($nombre);
  $('#abrefac').val($abre);
  $('#estado').val($estado);
}
function refresh(){
  $('#nombrefac').val("");
  $('#abrefac').val("");
}
function select_id($id){
  $('#idBor').val($id);
}
function select_ver($nombre,$abre,$estado){
  $('#nombrever').val($nombre);
  $('#abrever').val($abre);
  $('#estaver').val($estado);
}
</script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Carreras
        <small>Listado carreras</small>
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
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal" onclick="refresh()"><span class="fa fa-plus"></span>Agregar Carrera</button>
            </div>            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="listafac" class="table table-bordered table-responsive" style="margin-top: 20px;">
    <thead>
      <tr>
        <td>ID</td>
        <td>Imagen<br>Facultad</td>
        <td>Facultad</td>
        <td>Imagen<br>Carrera</td>
        <td>Carrera</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($carreras as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td><img src="<?= base_url('uploads/facultades/')?><?= $row->imagen?>" width="50px" height="50px"></td>
      <td><?= $row->nombref;?></td>
      <td><?php if ($row->imagenc=='') {?>
      <img src="<?= base_url('uploads/carrera/')?><?= 'blanco.jpg';?>" width="50px" height="50px"></td>
      <?php } else{ ?>
      <img src="<?= base_url('uploads/carrera/')?><?= $row->imagenc?>" width="50px" height="50px"></td>
      <?php } ?>
      <td><?= $row->nombre_carrera;?></td>
      <?php $datacarrera=$row->id_carrera.'*'.$row->nombref.'*'.$row->nombre_carrera; ?>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-info btn-view-carrera" data-toggle="modal" data-target="#verModalC" value="<?php echo $datacarrera; ?>">
          <span class="fa fa-eye"></span></button>
          <a href="<?php echo base_url();?>carreras/carreras_modal/edit/<?php echo $row->id_carrera; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
          <a data-toggle="modal" onclick="select_id(<?= $row->id_carrera; ?>)" data-target="#deleteModal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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
    <form autocomplete="off" action="<?php echo base_url();?>carreras/carreras_modal/agregar" id="form_carrera" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Carrera</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Facultad</label>
            <div class="controls">
            <select name="facultad" id="facultad" class="form-control">
              <option></option>
              <?php foreach ($estraf as $facu):?>
              <option value="<?php echo $facu->id_facultad; ?>"><?php echo $facu->nombre_facultad; ?></option>
              <?php endforeach?>
            </select>
            </div></div>
            <div class="control-group">
            <label class="control-label">Carrera</label>
            <div class="controls">
            <input type="text" name="nomcarrera" id="nomcarrera" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Imagen</label>
            <div class="controls">
            <input type="file" name="file" id="file" class="form-control input-sm">
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
  <form autocomplete="off" action="<?php echo base_url('carreras/carreras_modal/eliminar');?>" method="post" accept-charset="utf-8">
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
<div id="verModalC" class="modal fade" tabindex="-1" role="dialog">
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