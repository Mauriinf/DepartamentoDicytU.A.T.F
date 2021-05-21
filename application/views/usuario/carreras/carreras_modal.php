<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

<script type="text/javascript">
function select_data($id,$nombre,$abre,$estado){
  $('#txtId').val($id);
  $('#nombrefac').val($nombre);
  $('#abrefac').val($abre);
  $('#estado').val($estado);
}
function refresh(){
  $('#nombrefac').val("");
  $('#abrefac').val("");
}
function select_id($id){
  $('#idBor').val($id);
}
function select_ver($nombre,$abre,$estado){
  $('#nombrever').val($nombre);
  $('#abrever').val($abre);
  $('#estaver').val($estado);
}
</script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Carreras
        <small>Listado carreras</small>
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
              <table id="listafac" class="table table-bordered table-responsive" style="margin-top: 20px;">
    <thead>
      <tr>
        <td>ID</td>
        <td>Imagen<br>Facultad</td>
        <td>Facultad</td>
        <td>Imagen<br>Carrera</td>
        <td>Carrera</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($carreras as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td><img src="<?= base_url('uploads/facultades/')?><?= $row->imagen?>" width="50px" height="50px"></td>
      <td><?= $row->nombref;?></td>
      <td><?php if ($row->imagenc=='') {?>
      <img src="<?= base_url('uploads/carrera/')?><?= 'blanco.jpg';?>" width="50px" height="50px"></td>
      <?php } else{ ?>
      <img src="<?= base_url('uploads/carrera/')?><?= $row->imagenc?>" width="50px" height="50px"></td>
      <?php } ?>
      <td><?= $row->nombre_carrera;?></td>
      </tr>
    <?php } ?>      
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


<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>