<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
  <div class="wrapper">
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mensajes
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="<?php echo base_url();?>mensajes/mensajes_modal/nuevo" class="btn btn-primary btn-block margin-bottom"> Nuevo Mensaje</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> Buzon</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?php echo base_url();?>mensajes/mensajes_modal"><i class="fa fa-inbox"></i> Recibidos
                  <span class="label label-primary pull-right"><?php
                  foreach ($cuenta as $numero) {
                    echo $numero;
                  }?></span></a></li>
                <li><a href="<?php echo base_url();?>mensajes/mensajes_modal/enviados"><i class="fa fa-envelope-o"></i> Enviados
                  <span class="label label-warning pull-right"><?php
                  foreach ($cuentaen as $numeroen) {
                    echo $numeroen;
                  }?></span></a></li>
                <li><a href="<?php echo base_url();?>mensajes/mensajes_modal/eliminados"><i class="fa fa-trash-o"></i> Eliminados
                  <span class="label label-danger pull-right"><?php
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
              <h3 class="box-title"> Leer Mensaje</h3>
            </div>
            <!-- /.box-header -->
            <?php
                      foreach($dato as $mensaje) {?>
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
              
                <h3>Asunto : <?= $mensaje->titulo;?></h3>
                <h5>De : <?= $mensaje->usuario;?>
                  <span class="mailbox-read-time pull-right"> Fecha <?= $mensaje->fecha;?></span></h5>
              </div>
              <div class="mailbox-read-message">
                <?= $mensaje->mensaje;?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <ul class="mailbox-attachments clearfix">
              <?php if($mensaje->archivo!='') { ?>
                <li>
                <div><b> Archivo Adjunto</b></div>
                  <div class="mailbox-attachment-info">
                    <a href="<?= base_url('uploads/mensajes/');?><?= $mensaje->archivo;?>" target="_blank" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?= $mensaje->archivo;?></a>
                        <span class="mailbox-attachment-size">
                          <a href="<?= base_url('uploads/mensajes/');?><?= $mensaje->archivo;?>" target="_blank" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <?php } else{echo '';}?>
              </ul>
            </div>
            <!-- /.box-footer -->
            <!-- /.box-footer -->
            <?php }?>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --><!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>