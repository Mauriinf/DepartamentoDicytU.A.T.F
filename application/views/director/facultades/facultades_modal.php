<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

<script type="text/javascript">
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
        Facultades
        <small>Listado Facultades</small>
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
              <table id="listafac" class="table table-bordered btn-hover">
    <thead>
      <tr>
        <td>ID</td>
        <td>Nombre de Facultad</td>
        <td>Imagen</td>
        <td>Imagen Relacionada a<br>su Facultad</td>
        
      </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach ($facultades as $row) {?>
      <tr>
      <td><?= $no++;?></td>
      <td><?= $row->nombre_facultad?></td>
      <td><img src="<?= base_url('uploads/facultades/').$row->imagen;?>" width="50px" height="50px"/></td>
      <td><img src="<?= base_url('uploads/facultades/').$row->imagenr;?>" width="50px" height="50px"/></td>
      
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