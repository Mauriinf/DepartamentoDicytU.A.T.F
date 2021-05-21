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
        Convocatorias a Becas / Ferias
        <small>Lista de Convocatorias</small>
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
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal"><span class="fa fa-plus"></span> Agregar Convocatoria</button>
            </div>            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="listafac" class="table table-bordered btn-hover">
    <thead>
      <tr>
        <td width="5px">ID</td>
        <td width="200px">Titulo</td>
        <td width="150px">Descripcion</td>
        <td>Fecha Inicio</td>
        <td>Fecha Final</td>
        <td>Tipo Convocatoria</td>
        <td width="80px">Archivo</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; if($convocatorias==false){
      echo '';
    }
    else { foreach ($convocatorias as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td align="justify"><?= $row->titulo;?></td>
      <td align="justify"><?= $row->descripcion;?></td>
      <td><?= $row->fecha_inicio;?></td>
      <td><?= $row->fecha_final;?></td>
      <td><?= $row->nombre_tipo;?></td>
      <td>
      <?php if ($row->archivo=='') { ?>
        <a data-toggle="modal" onclick="select_ids(<?= $row->id_convocatoria; ?>)" data-target="#verModalS" ><button type="button" class="btn btn-block btn-default btn-xs"><i class="glyphicon glyphicon-cloud-upload"></i> Subir Archivo</button></a>
        
      <?php }
      else{?>
      <a href="<?php echo base_url('uploads/convocatorias/');?><?php echo $row->archivo;?>" target="_blank"><button type="button" class="btn btn-block btn-default btn-xs"><i class="fa fa-cloud-download"></i> Archivo</button></a>
      <?php } ?>
      </td>
      <?php $dataconv=$row->id_convocatoria.'*'.
      $row->titulo.'*'.
      $row->descripcion.'*'.
      $row->resumen.'*'.
      $row->fecha_inicio.'*'.
      $row->fecha_final.'*'.
      $row->nombre_tipo.'*'.
      $row->archivo; ?>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-info btn-view-convo" data-toggle="modal" data-target="#verModalCo" value="<?php echo $dataconv; ?>">
          <span class="fa fa-eye"></span></button>
          <a href="<?php echo base_url();?>convocatorias/convocatoria_modal/edit/<?= $row->id_convocatoria;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
          <a data-toggle="modal" onclick="select_id(<?= $row->id_convocatoria; ?>)" data-target="#deleteModal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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
    <form autocomplete="off" action="<?php echo base_url();?>convocatorias/convocatoria_modal/agregar" id="form_convocatoria" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Convocatoria</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Titulo de Convocatoria</label>
            <div class="controls">
            <input type="text" name="titulo" id="titulo" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Breve Descripcion</label>
            <div class="controls">
            <textarea id="editor1" class="form-control textarera-sm" style="height: 300px" name="desc">
                      
                    </textarea>
            </div></div>
            <div class="control-group">
            <label class="control-label">Objetivo General</label>
            <div class="controls">
            <textarea id="editor2" name="resumen" id="resumen" class="form-control input-sm"></textarea>
            </div></div>
            <div class="control-group">
            <label class="control-label">Fecha Inicio</label>
            <div class="controls">
            <input type="date" name="fi" id="fi" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Fecha Final</label>
            <div class="controls">
            <input type="date"  name="ff" id="ff" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Archivo</label>
            <div class="controls">
            <input type="file" name="fileimagen"  class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Tipo de Convocatoria</label>
            <div class="controls">
            <select name="tipo_con"  class="form-control">
            <option></option>
              <?php foreach ($estracon as $tipo_con):?>
              <option value="<?php echo $tipo_con->id_tipo_convocatoria; ?>"><?php echo $tipo_con->nombre_tipo; ?></option>
              <?php endforeach?>
            </select>
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
  <form autocomplete="off" action="<?php echo base_url('convocatorias/convocatoria_modal/eliminar');?>" method="post" accept-charset="utf-8">
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
        <h4 class="modal-title">Informacion de Convocatoria</h4>
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