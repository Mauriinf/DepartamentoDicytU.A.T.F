<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
<script type="text/javascript">
function select_id($id){
  $('#idca').val($id);
}
</script>
<script type="text/javascript">
  function select_idre($id){
  $('#idre').val($id);
}
</script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Avances
        <small></small>
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
            <div class="col-md-12">
                <input type="hidden" name="txtId" value="<?php echo $usuario->id_usuario;?>">
                <b>Datos del Usuario: </b><?php echo $usuario->nombre_completo.' '.$usuario->apellido_pat.' '.$usuario->apellido_mat;?>
                    <hr><?php if ($avance==false) {
                        echo 'No Existe Avances';
                      }else{?>
                    <table class="table table-bordered">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Fecha y Hora de Inicio</th>
                        <th>Fecha y Hora Final</th>
                        <th width="150px">Progreso</th>
                        <th>Archivo</th>
                        <th>Fecha de Presentacion</th>
                        <th>Accion</th>
                      </tr>                        
                      </thead>
                      <tbody>
                       <?php $no=1; foreach ($avance as $row) {?>
                      <tr>
                      <td><?= $no++;?></td>
                      <td><?= $row->titulo;?></td>
                      <td><?= $row->fecha_inicio;?></td>
                      <td><?= $row->fecha_final;?></td>
                      <td><center><span class="badge bg-green"><?= $row->avance;?> %</span></center><div style="height:13px" class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: <?= $row->avance;?>%"></div>
                    </div></td>
                      <td>

                      <a href="<?php echo base_url();?>avances/avances_modal/download/<?php echo $row->archivo; ?>" target="blank" class="btn btn-block btn-warning btn-xs"><span class="glyphicon glyphicon-cloud-download"></span> Descargar</a></td>
                      <td><?= $row->fecha;?></td>
                      <td>
                        <div class="btn-group">
                          <a data-toggle="modal" onclick="select_id(<?= $row->id_detalle; ?>)" data-target="#ModalCali" class="btn btn-default" title="Calificar"><span class="glyphicon glyphicon-pencil"></span></a>
                          <a data-toggle="modal" onclick="select_idre(<?= $row->id_detalle; ?>)" data-target="#ModalRE" class="btn btn-warning" title="Rehabilitar"><span class="glyphicon glyphicon-refresh"></span></a>
                        </div>
                      </td>
                      </tr>
                      <?php } } ?>
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
<!--Modal Calificar-->
<div id="ModalCali" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form action="<?php echo base_url('avances/avances_modal/calificar');?>" method="post" accept-charset="utf-8">
    <div class="modal-content">
      <div class="modal-header  bg-primary" >
        <h4 class="modal-title">Calificar</h4>
      </div>
      <div class="modal-body">
      <input type="hidden"  name="idusu" value="<?php echo $usuario->id_usuario;?>">
      <input type="hidden"  name="idca" id="idca" value="0">
          <label>Puntage</label>
          <input type="input" name="ptg" class="form-control input-sm">
          <label>Segun Usted Que Porcentage de Avance Tiene el Usuario</label>
          <select name="porce" class="form-control input-sm">
            <option value="1">1 %</option>
            <option value="20">20 %</option>
            <option value="60">60 %</option>
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btnDelete" class="btn btn-primary">Calificar</button>
      </div>
    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- /.modal rehabilitar -->
<div class="modal modal-warning fade" id="ModalRE">
          <div class="modal-dialog">
          <form action="<?php echo base_url('avances/avances_modal/rehabilitar');?>" method="post" accept-charset="utf-8">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Rehabilitar</h4>
              </div>
              <div class="modal-body">
              <input type="hidden"  name="idre" id="idre" value="0">
                <p>Esta Seguro de Rehabilitar este Avance para Usuario ?????</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline">Rehabilitar</button>
              </div>
            </div>
            <!-- /.modal-content --></form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  <!-- /.content-wrapper -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>