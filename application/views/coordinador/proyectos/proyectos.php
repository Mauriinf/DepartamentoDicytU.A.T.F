<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

<script type="text/javascript">
function select_id($id){
  $('#idBor').val($id);
}
</script>
<script type="text/javascript">
function select_ids($id){
  $('#idS').val($id);
}
</script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Proyectos / Trabajos
        <small>Listado Proyectos / trabajos de Investigación</small>
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
      $data=$this->session->flashdata('oki');
      if($data!=""){?>
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $data;?>
        <span aria-hidden="true"></span>
        </div>
      <?php } ?>
      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12" align="right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal"><span class="fa fa-plus"></span> Agregar Proyecto / Trabajos</button>
            </div>            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table id="listafac" class="table table-bordered btn-hover" display>
    <thead>
      <tr>
        <td width="5px">ID</td>
        <td width="50px">Imagen</td>
        <td width="150px">Titulo</td>
        <td width="80px">Autor</td>
        <td width="80px">Facultad</td>
        <td width="80px">Carrera</td>
        <td width="80px">Fecha</td>
        <td>Tipo de<br>Investigacion</td>
        <td width="80px">Archivo</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php if ($proyecto==false) {
      echo '';
    }
    else {$no=1;
    foreach ($proyecto as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td><img src="<?= base_url('uploads/facultades/');?><?= $row->imagen;?>" width="50px" height="50px">
      </td>
      <td><?= $row->titulo_investigacion; ?></td>
      <?php
      if($row->autor=='1'){  $auto=$row->nombre_autor;} else { $auto=$row->nombre_completo.' '.$row->apellido_pat; }?>
      <td><?= $auto?></td>
      <td><?= $row->nombre_facultad;?></td>
      <td><?= $row->nombre_carrera;?></td>
      <td><?= $row->fecha;?></td>
      <td><?= $row->tipo_investigacion;?></td>
      <td>
      <?php if ($row->archivo=='') { ?>
        <a data-toggle="modal" onclick="select_ids(<?= $row->id_investigacion; ?>)" data-target="#verModalS" ><button type="button" class="btn btn-block btn-default btn-xs"><i class="glyphicon glyphicon-cloud-upload"></i> Subir Archivo</button></a>
        
      <?php }
      else{?>
      <a href="<?php echo base_url('uploads/proyectos/archivo/');?><?php echo $row->archivo;?>" target="_blank"><button type="button" class="btn btn-block btn-default btn-xs"><i class="fa fa-cloud-download"></i> Archivo</button></a>
      <?php } ?>
      </td>
      <?php $dataproyecto = $row->id_investigacion.'*'.
                            $row->nombre_facultad.'*'.
                            $row->nombre_carrera.'*'.
                            $row->titulo_investigacion.'*'.
                            $row->nombre_completo.'*'.
                            $row->apellido_pat.'*'.
                            $row->nombre_investigador.'*'.
                            $row->objetivo_general.'*'.
                            $row->resumen.'*'.
                            $row->conclusiones.'*'.
                            $row->fecha.'*'.
                            $row->nombre_autor.'*'.
                            $row->gestion.'*'.
                            $row->tutor.'*'.
                            $row->tipo_investigacion;?>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-info btn-view-proyecto" data-toggle="modal" data-target="#verModalP" value="<?php echo $dataproyecto;?>">
          <span class="fa fa-eye"></span></button>
          <a href="<?php echo base_url();?>proyectos/proyectos_modal/edit/<?= $row->id_investigacion;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
          <a data-toggle="modal" onclick="select_id(<?= $row->id_investigacion; ?>)" data-target="#deleteModal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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
  <div class="modal-dialog" role="document">
    <form autocomplete="off" action="<?php echo base_url();?>proyectos/proyectos_modal/agregar" id="proyectos" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Proyecto / Trabajo</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Titulo</label>
            <div class="controls">
            <input type="text" name="titulo" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Objetivo General</label>
            <div class="controls">
            <textarea id="editor1" class="form-control textarera-sm" style="height: 300px" name="objetivog">
                      
                    </textarea>
            </div></div>
            <div class="control-group">
            <label class="control-label">Resumen</label>
            <div class="controls">
            <textarea id="editor2" class="form-control textarera-sm" style="height: 300px" name="resumen">
                      
                    </textarea>
            </div></div>
            <div class="control-group">
            <label class="control-label">Conclusiones</label>
            <div class="controls">
            <textarea id="editor3" class="form-control textarera-sm" style="height: 300px" name="conclu">
                      
                    </textarea>
            </div></div>
            <div class="control-group">
            <label class="control-label">Tipo de Investigador</label>
            <div class="controls">
            <select name="tipo" id="tipo" class="form-control">
              <option></option>
              <?php foreach ($estrat as $tipo):?>
              <option value="<?php echo $tipo->id; ?>"><?php echo $tipo->nombre_investigador; ?></option>
              <?php endforeach?>
            </select>
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
            <label class="control-label">Autor (es):</label>
            <div class="controls">
            <input type="text" name="autor" class="form-control input-sm" placeholder="Ej. UNIV. JUAN PEREZ - UNIV. CESAR FLORES...">
            </div></div>
            <div class="control-group">
            <label class="control-label">Gestion:</label>
            <div class="controls">
            <input type="text" name="gestion" class="form-control input-sm" placeholder="Ej. 2019, 2020,2021.......">
            </div></div>
            <div class="control-group">
            <label class="control-label">Tutor</label>
            <div class="controls">
            <input type="text" name="tutor" class="form-control input-sm" placeholder="Ej. Lic. JUAN PEREZ - Ing. CESAR FLORES...">
            </div></div>
            <div class="control-group">
            <label class="control-label">Tipo de investigacion</label>
            <div class="controls">
            <input type="text" name="tipoinves" class="form-control input-sm" placeholder="Ej. Basica, Experimental, Aplicada...">
            </div></div><br>
            <div class="callout callout-danger">
          <p><b>* NOTA:</b> En Caso de no llenar con una Casilla escriba (NO DISPONIBLE)</p>
        </div>
            
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
  <form autocomplete="off" action="<?php echo base_url('proyectos/proyectos_modal/eliminar');?>" method="post" accept-charset="utf-8">
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
        <h4 class="modal-title">Informacion de Proyecto de Investigación</h4>
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

<!--Modal subir-->
<div id="verModalS" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form autocomplete="off" method="post" action="<?php echo base_url('proyectos/proyectos_modal/subir')?>" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Subir Archivo</h4>
      </div>
      <div class="modal-body">
      <input type="hidden"  name="idS" id="idS" value="0">
      <input type="file" name="fileimagen" class="form-control input-sm">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btnsubir" class="btn btn-primary">Subir Archivo</button>
      </div>
    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>