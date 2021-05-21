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
        Cursos
        <small>Listado Cursos</small>
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
      <?php
      $dataerro=$this->session->flashdata('error');
      if($dataerro!=""){?>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $dataerro;?>
        <span aria-hidden="true"></span>
        </div>
      <?php } ?>
      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12" align="right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal" onclick="refresh()"><span class="fa fa-plus"></span> Agregar Curso</button>
            </div>            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="listafac" class="table table-bordered table-responsive" style="margin-top: 20px;">
    <thead>
      <tr>
        <td width="20px">ID</td>
        <td width="150px">Titulo</td>
        <td width="350px">Descripcion</td>
        <td>Fecha</td>
        <td>Imagen</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($beca as $row) {?>
    <?php if($row->imagen==''){
      $datos=base_url('uploads/becas/blanco.jpg');}
      else{
        $datos=base_url('uploads/becas/'.$row->imagen);
        }?>
      <tr>
      <td><?= $no++;?></td>
      <td align="justify"><?= $row->titulo;?></td>
      <td align="justify"><?= $row->descripcion;?></td>
      <td><?= $row->fecha;?></td>
      <td><img src="<?php echo $datos;?>" width="100px" height="100px"></td>
      <?php $databeca=$row->id_beca.'*'.$row->titulo.'*'.$row->descripcion.'*'.$row->fecha.'*'.$datos; ?>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-info btn-view-beca" data-toggle="modal" data-target="#verModalBe" value="<?php echo $databeca; ?>">
          <span class="fa fa-eye"></span></button>
          <a href="<?php echo base_url();?>becas/becas_modal/edit/<?php echo $row->id_beca; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
          <a data-toggle="modal" onclick="select_id(<?= $row->id_beca; ?>)" data-target="#deleteModal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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
    <form action="<?php echo base_url();?>becas/becas_modal/agregar" id="form_beca" method="post" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Curso</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Titulo</label>
            <div class="controls">
            <input type="text" name="titulo" id="titulo" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Descripcion</label>
            <div class="controls">
            <textarea id="editor4" class="form-control textarea-sm" name="desc">
            </textarea>
            </div></div>
            <div class="control-group">
            <label class="control-label">fecha</label>
            <div class="controls">
            <input type="date" name="fecha" id="fecha" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Imagen</label>
            <div class="controls">
            <input type="file" name="fileimagen"  class="form-control input-sm">
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
  <form action="<?php echo base_url('becas/becas_modal/eliminar');?>" method="post" accept-charset="utf-8" autocomplete="off">
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
<div id="verModalBe" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form autocomplete="off">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de Curso</h4>
      </div>
      <div class="modal-body">          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>