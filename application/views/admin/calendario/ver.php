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
        Evento
        <small>Subir Avance</small>
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
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" onClick="window.location='<?php echo base_url();?>calendario/calendario_modal';"><span class="fa fa-reply"></span> Volver</button>
            </div>            
          </div>
          <hr>
          <div class="row">
          <div class="col-md-3"></div>
            <div class="col-md-6">
    <?php if ($eventos==false) {?>
      <form autocomplete="off" action="<?php echo base_url();?>calendario/calendario_modal/subir" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title"><div align="center"><?php echo $eve->titulo;?></div></h4>
        </div>
        <div class="modal-body">
        <div class="col-md-4" align="right">
            <input type="hidden"  name="iddet" value="<?php echo $eve->id_evento;?>">
            <label>Subir Archivo: </label></div><div class="col-md-6">
            <input type="file" name="fileimagen" class="form-control input-sm"></div>
        </div><br>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Subir Avance</button>
        </div>
      </div><!-- /.modal-content -->
    </form>

       
    <?php } else{ ?>
      <div class="modal-header bg-primary">
          <h4 class="modal-title"><div align="center"><?php echo $eve->titulo;?></</div></h4>
        </div>
        <div class="modal-body">
            <label> Usted ya entrego su Avance </label>
        </div><br>
        <div class="modal-footer">
        </div>
      </div>
    <?php }?>      
    
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

<!--Modal Eliminar-->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form autocomplete="off" action="<?php echo base_url('calendario/calendario_modal/eliminar');?>" method="post" accept-charset="utf-8">
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
<div id="verModalEve" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <form autocomplete="off">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de Cargo</h4>
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