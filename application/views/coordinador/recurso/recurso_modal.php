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
        Recursos Bibliograficos
        <small>Listado de Recursos Bibliograficos</small>
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
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal" onclick="refresh()"><span class="fa fa-plus"></span> Agregar Recurso Bibliografico</button>
            </div>            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="listafac" class="table table-bordered table-responsive" style="margin-top: 20px;">
    <thead>
      <tr>
        <td width="20px">ID</td>
        <td>Imagen</td>
        <td >Recurso</td>
        <td >Descripcion</td>
        <td >Area de Conocimiento</td>
        <td>Pagina Web</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; if($recurso==false){ echo '';}
    else {foreach ($recurso as $row) {?>
      <tr align="center">
      <td><?= $no++;?></td>
      <td><img src="<?= base_url('uploads/recurso/');?><?= $row->imagen;?>" style=" max-width:60px; height:auto;"></td>
      <td align="justify"><?= $row->nombre;?></td>
      <td align="justify"><?= $row->objetivo;?></td>
      <td><?= $row->area;?></td>
      <td><a href="<?= $row->url;?>" target="_blank"><?= $row->url;?></a></td>
      <?php $datarecurso=$row->id_recurso.'*'.$row->nombre.'*'.$row->objetivo.'*'.$row->area.'*'.$row->url; ?>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-info btn-view-convenio" data-toggle="modal" data-target="#verModalCo" value="<?php echo $datarecurso; ?>">
          <span class="fa fa-eye"></span></button>
          <a href="<?php echo base_url();?>recursos/recursos_modal/edit/<?php echo $row->id_recurso; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
          <a data-toggle="modal" onclick="select_id(<?= $row->id_recurso; ?>)" data-target="#deleteModal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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
  <div class="modal-dialog " role="document">
    <form autocomplete="off" action="<?php echo base_url();?>recursos/recursos_modal/agregar" id="form_recurso" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Recurso Bibliografico</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Recurso</label>
            <div class="controls">
            <input type="text" name="titulo" id="titulo" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Descripcion</label>
            <div class="controls">
            <textarea id="editor4" class="form-control textarea-sm" name="obj">                      
                    </textarea>
            </div></div>
            <div class="control-group">
            <label class="control-label">Area de Conocimiento</label>
            <div class="controls">
            <input type="text" name="area" id="fecha" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Pagina Web</label>
            <div class="controls">
            <input type="url" name="url" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Imagen</label>
            <div class="controls">
            <input type="file" name="file" class="form-control input-sm">
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
  <form autocomplete="off" action="<?php echo base_url('recursos/recursos_modal/eliminar');?>" method="post" accept-charset="utf-8">
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
<div id="verModalCo" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form autocomplete="off">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de Recurso Bibliografico</h4>
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