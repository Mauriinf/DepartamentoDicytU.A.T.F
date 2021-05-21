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
function select1($id){
  $('#idnuevo1').val($id);
}
</script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Publicaciones
        <small>Listado Publicaciones</small>
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
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal" onclick="refresh()"><span class="fa fa-plus"></span> Agregar Publicacion</button>
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
        <td >Tipo Publicacion</td>
        <td>Fecha</td>
        <td>Enlace</td>
        <td>Accion</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; if($publi==false){echo '';}
    else{
    foreach ($publi as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td align="justify"><?= $row->titulo;?></td>
      <td align="justify"><?= $row->descripcion;?></td>
      <td><?= $row->nombrep;?></td>
      <td><?= $row->fecha;?></td>
      <?php
        $this->db->from('fotos_publicaciones');
        $this->db->where('id_publicacion',$row->id_publicacion);
        $cont = $this->db->count_all_results();

        $this->db->from('fotos_noticias');
        $this->db->where('id_publi',$row->id_publicacion);
        $contn = $this->db->count_all_results();
        
       if ($row->id_tipo_publi==5) {
        if($cont==0){
        echo '<td align="center"><a data-toggle="modal" onclick="select('.$row->id_publicacion.')" data-target="#Modalimg" style="cursor:pointer;">Insertar<br>Imagenes</a></td>';
        }else{
          echo '<td align="center">Ya Subio<br>Imagenes</td>';
        }
      }
      else if($row->id_tipo_publi==4){
         if($contn==0){
        echo '<td align="center"><a data-toggle="modal" onclick="select1('.$row->id_publicacion.')" data-target="#Modalimg1" style="cursor:pointer;">Insertar<br>Imagenes</a></td>';
        }else{
          echo '<td align="center">Ya Subio<br>Imagenes</td>';
        }
      }
      else{
      echo '<td align="center" style="color:red;">Enlace No <br>Disponible</td>';} ?>
      <?php $datapubli=$row->id_publicacion.'*'.$row->titulo.'*'.$row->descripcion.'*'.$row->nombrep.'*'.$row->fecha; ?>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-info btn-view-publi" data-toggle="modal" data-target="#verModalPu" value="<?php echo $datapubli; ?>">
          <span class="fa fa-eye"></span></button>
          <a href="<?php echo base_url();?>publicacion/publicacion_modal/edit/<?php echo $row->id_publicacion; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
          <a data-toggle="modal" onclick="select_id(<?= $row->id_publicacion; ?>)" data-target="#deleteModal" class="btn btn-danger"><span class="fa fa-remove"></span></a>
        </div>
      </td>
      </tr>
    <?php }} ?>      
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
    <form autocomplete="off" action="<?php echo base_url();?>publicacion/publicacion_modal/agregar" id="form_publicacion" method="post" accept-charset="utf-8">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Publicación</h4>
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
            <textarea id="editor" class="form-control textarera-sm" style="height: 300px" name="desc">
                      
                    </textarea>
            </div></div>
            <div class="control-group">
            <label class="control-label">fecha</label>
            <div class="controls">
            <input type="date" name="fecha" id="fecha" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">tipo de Publicación</label>
            <div class="controls">
            <select name="tipo" id="tipo" class="form-control">
            <option></option>
              <?php foreach ($esti as $tip):?>
              <option value="<?php echo $tip->id_tipo_publi; ?>"><?php echo $tip->nombre_publicacion; ?></option>
              <?php endforeach?>
            </select></div></div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Guardar Datos</button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Modal insertarimagenesNoticias-->
<div id="Modalimg1" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog " role="document">
    <form autocomplete="off" action="<?php echo base_url();?>publicacion/publicacion_modal/agregarImageNoti" id="form_publicacion" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Imagenes</h4>
        </div>
        <div class="modal-body">
        <input type="hidden" name="txtId" id="idnuevo1" value="0">
            <div class="control-group">
            <label class="control-label">Imagen de Noticias y Eventos</label>
            <div class="controls">
            <input type="file" name="userFiles" class="form-control input-sm">
            </div></div>
        </div>
        <div class="modal-footer">
          <input class="form-control" type="submit" name="fileSubmit" value="Subir Imagen"/>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Modal insertarimagenes-->
<div id="Modalimg" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog " role="document">
    <form autocomplete="off" action="<?php echo base_url();?>publicacion/publicacion_modal/agregarImage" id="form_publicacion" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Imagenes</h4>
        </div>
        <div class="modal-body">
        <input type="hidden" name="txtId" id="idnuevo" value="0">
            <div class="control-group">
            <label class="control-label">Imagenes de Revista</label>
            <div class="controls">
            <input type="file" name="userFiles[]" multiple class="form-control input-sm">
            </div></div>
        </div>
        <div class="modal-footer">
          <input class="form-control" type="submit" name="fileSubmit" value="Subir Imagen (es)"/>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Modal insertarimagenesAJAX-->
<div id="ModalimgA" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog " role="document">
    <form autocomplete="off" action="<?php echo base_url();?>publicacion/publicacion_modal/subirA" id="form_publicacion" method="post" accept-charset="utf-8"  enctype="multipart/form-data" class="dropzone">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Imagenes AJAX</h4>
        </div>
        <div class="modal-body">
        <input type="text" name="txtId" id="idnuevo1" value="0">
            <div class="dz-message needsclick">
        <strong>Selecciona los Archivos.</strong><br /><br />
        <span class="note needsclick">
                <span class="glyphicon glyphicon-open" aria-hidden="true" style="font-size:60px;"></span>
                </span>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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

<!--Modal ver-->
<div id="verModalPu" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form autocomplete="off">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de Publicación</h4>
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