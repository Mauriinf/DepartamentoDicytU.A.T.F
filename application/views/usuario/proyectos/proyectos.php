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
      <td><img src="<?= base_url('uploads/facultades/');?><?= $row->imagen;?>" width="50px" height="50px" alt="">
      </td>
      <td><?= $row->titulo_investigacion; ?></td>
      <?php
      if($row->autor=='1'){  $auto=$row->nombre_autor;} else { $auto=$row->nombre_completo.' '.$row->apellido_pat; }?>
      <td><?= $auto?></td>
      <td><?= $row->nombre_facultad;?></td>
      <td><?= $row->nombre_carrera;?></td>
      <td><?= $row->fecha;?></td>
      <?php $dataproyecto=$row->id_investigacion.'*'.$row->nombre_facultad.'*'.$row->nombre_carrera.'*'.$row->titulo_investigacion.'*'.$row->nombre_completo.'*'.$row->apellido_pat.'*'.$row->nombre_investigador.'*'.$row->objetivo_general.'*'.$row->resumen.'*'.$row->conclusiones.'*'.$row->fecha.'*'.$row->nombre_autor.'*'.$row->gestion.'*'.$row->tutor.'*'.$row->tipo_investigacion;?>
        <div class="btn-group">
          <button type="button" class="btn btn-info btn-view-proyecto" data-toggle="modal" data-target="#verModalP" value="<?php echo $dataproyecto;?>">
          <span class="fa fa-eye"></span></button>
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
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>