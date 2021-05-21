<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
  <div class="wrapper"><!-- Left side column. contains the logo and sidebar -->
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
          <a href="<?php echo base_url();?>mensajes/mensajes_modal" class="btn btn-primary btn-block margin-bottom">Volver a Principal</a>

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
                <li class="active"><a href="<?php echo base_url();?>mensajes/mensajes_modal/enviados"><i class="fa fa-envelope-o"></i> Enviados
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
              <h3 class="box-title">Nuevo Mensaje</h3>
            </div>
            <!-- /.box-header -->
            <form method="post" action="<?php echo base_url();?>mensajes/mensajes_modal/guardar">
            <div class="box-body">
              <div class="form-group">
                <select class="form-control" name="destinatario">
                  <option>   ----  Seleccione Destinatario  ----   </option>
                  <?php
                    foreach ($destinatarios as $desti) {
                      if ($desti->rol_id=='2' and $desti->id_facultad==$this->session->facultad) {

                        echo '<option value="'.$desti->id_usuario.'">'.$desti->email.' (DIRECTOR INSITUTO DE INVESTIGACIÓN)'.'</option>';
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Asunto :" name="asunto">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" name="mensaje">
                      
                    </textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Adjuntar Archivo
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Descartar</button>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --><!-- Control Sidebar --><!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>