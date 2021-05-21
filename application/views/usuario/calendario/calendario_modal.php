<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Calendario
        <small>Avances</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
      $data=$this->session->flashdata('ok');
      if($data!=""){?>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $data;?>
        <span aria-hidden="true"></span>
        </div>
      <?php } ?>
      <!-- Default box -->
      <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Descripcion de Avances</h4>
            </div>
            <div class="box-body">
              <div id="external-events">
                <div class="bg"align="center" style="background-color:#003333; color:#FFF; position: relative; border-radius: 3px 3px 3px 3px; font-size:16px; height:27px; padding:3px;"><b>Calendario Academico</b></div><div style="font-size:3px; color:#FFFFFF;">.</div>
                <div class="bg-aqua" align="center" style="position: relative; border-radius: 3px 3px 3px 3px; font-size:16px; height:27px; padding:3px;"><b>Entrega de Avances</b></div><div style="font-size:3px; color:#FFFFFF;">.</div>
                <div class="bg-yellow" align="center" style="position: relative; border-radius: 3px 3px 3px 3px; font-size:16px; height:57px; padding:3px;"><b>Fecha Modificada de Avance</b></div><div style="font-size:3px; color:#FFFFFF;">.</div>
                <div class="bg-red" align="center" style="position: relative; border-radius: 3px 3px 3px 3px; font-size:16px; height:57px; padding:3px;"><b>Entrega Final de<br>Proyecto / Trabajo</b></div><div style="font-size:3px; color:#FFFFFF;">.</div>
              </div>
            </div>
          </div>            
          </div>
       <div class="col-md-8" >
        <div class="box-body" >
         <div id="calendario"></div>
        </div></div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>