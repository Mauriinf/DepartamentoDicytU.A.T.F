<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
 <div class="wrapper"><!-- Left side column. contains the logo and sidebar --><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mensajes
        <small><?php
                  foreach ($cuenta as $numero) {
                    if($numero >'1'){
                      echo $numero.' nuevos mensajes';
                    }
                    else{
                    echo $numero.' nuevo mensaje';
                  }
                  }?></small>
      </h1>
      <?php
      $data=$this->session->flashdata('ok');
      if($data!=""){?>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $data;?>
        <span aria-hidden="true"></span>
        </div>
      <?php } ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="<?php echo base_url();?>mensajes/mensajes_modal/nuevo" class="btn btn-primary btn-block margin-bottom"> Nuevo Mensaje</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Buzon</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo base_url();?>mensajes/mensajes_modal"><i class="fa fa-inbox"></i> Recibidos
                  <span class="label label-primary pull-right"><?php
                  foreach ($cuenta as $numero) {
                    echo $numero;
                  }?></span></a></li>
                <li><a href="<?php echo base_url();?>mensajes/mensajes_modal/enviados"><i class="fa fa-envelope-o"></i> Enviados
                  <span class="label label-warning pull-right"><?php
                  foreach ($cuentaen as $numeroen) {
                    echo $numeroen;
                  }?></span></a></li>
                <li class="active"><a href="<?php echo base_url();?>mensajes/mensajes_modal/eliminados"><i class="fa fa-trash-o"></i> Eliminados
                  <span class="label label-danger pull-right">
                  <?php
                  foreach ($cuentael as $numeroel) {
                    echo $numeroel;
                  }?></span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Eliminados</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <form autocomplete="off" name="holas" action="<?php echo base_url('mensajes/mensajes_modal/borrar');?>" method="POST">
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <button type="submit" class="btn btn-default btn-sm" onclick="return confirm('Esta seguro de eliminar Mensaje (s)...!!!')"><i class="fa fa-trash-o"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" id="actualiza" class="btn btn-default btn-sm" onClick="location.reload();" style="cursor: pointer;"><i class="fa fa-refresh"></i></button>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages" id="listaMensajes">
                <table class="table table-hover table-striped" id="mensajes" class="display">
                 <thead>
                  <tr>
                    <td><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button></td>
                    <td class="mailbox-name"><b>Usuario</b></td>
                    <td class="mailbox-subject"><b>Titulo</b>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><b>Fecha Eliminada</b></td>
                  </tr> 
                  </thead>
                  <tbody>
                  <?php
                  if($entrada==false){?>
                   <tr align="center">
                    <td class="mailbox-subject" colspan="5"><b>No Exiten Mensajes de entrada</b>
                    </td>
                  </tr>
                  <?php
                }
                   else{
                  foreach ($entrada as $dato):?>
                  <tr>
                    <td><input type="checkbox" value="<?php echo $dato->id_mensaje;?>" name="idmensaje[]"></td>
                    <td class="mailbox-name"><a href="<?php echo base_url();?>mensajes/mensajes_modal/ver/<?php echo $dato->id_mensaje;?>"><?php echo $dato->usuario;?></a></td>
                    <td class="mailbox-subject"><b><?php echo $dato->titulo;?></b>
                    </td>
                    <td class="mailbox-attachment"><?php if($dato->archivo=='') {echo '';}else{echo '<i class="fa fa-paperclip"></i>';}?></td>
                    <td class="mailbox-date"><?php echo $dato->fecha_borrado;?></td>
                  </tr>
                <?php endforeach; }?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            </form>
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <div class="pull-right">
                  <?php echo $this->pagination->create_links();?>
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>