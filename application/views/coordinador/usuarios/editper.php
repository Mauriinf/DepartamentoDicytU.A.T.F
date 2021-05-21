<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Datos Personales
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
              <form autocomplete="off" action="<?php echo base_url('administrador/usuarios_modal/editarper');?>" id="from_usuario" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="txtId" value="<?php echo $usuario->id_usuario;?>">
                <?php if($usuario->imagen==''){
                $datos=base_url('uploads/user_img/blanco.jpg');}
                else{
                $datos=base_url('uploads/user_img/'.$usuario->imagen);
                }?>
                    <div class="control-group">
                    <label class="control-label">Nombre Completo</label>
                    <div class="controls">
                    <input type="text" name="nomu" id="nomu" class="form-control input-sm" value="<?php echo $usuario->nombre_completo;?>">
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Apellido Paterno</label>
                    <div class="controls">
                    <input type="text" name="apat" id="apat" class="form-control input-sm" value="<?php echo $usuario->apellido_pat;?>">
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Apellido Materno</label>
                    <div class="controls">
                    <input type="text" name="amat" id="amat" class="form-control input-sm" value="<?php echo $usuario->apellido_mat;?>">
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Carnet de Identidad</label>
                    <div class="controls">
                    <input type="text" name="ci" id="ci" class="form-control input-sm" value="<?php echo $usuario->ci;?>">
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Direccion</label>
                    <div class="controls">
                    <input type="text" name="direc" id="direc" class="form-control input-sm" value="<?php echo $usuario->direccion;?>">
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Telefono</label>
                    <div class="controls">
                    <input type="text" name="telf" id="telf" class="form-control input-sm" value="<?php echo $usuario->telefono;?>">
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                    <input type="text" name="email" id="email" class="form-control input-sm" value="<?php echo $usuario->email;?>">
                    </div></div>
                    <div class="control-group">
                    <label class="control-label">Usuario</label>
                    <div class="controls">
                    <input type="text" name="usu" id="usu" class="form-control input-sm" value="<?php echo $usuario->usuario;?>">
                    </div></div>
                    <label>Imagen</label>
                    <img src="<?php echo $datos;?>" width="200px" height="200px">
                    <input type="file" name="fileimagens" class="form-control input-sm">
                    <div class="control-group">
                    <label class="control-label">Contraseña</label>
                    <div class="controls">
                    <?php $des=base64_decode($usuario->contrasena);?>
                    <span class="fa fa-eye-slash icon" onclick="mostrarPassword()" style="cursor:pointer; position:absolute;left:95%;font-size:25px;"></span>
                    <input type="password" name="contra" id="contra" class="form-control input-sm" value="<?php echo $des;?>">
                    </div></div>         
            <br>
            <button  type="submit" id="btnDelete" class="btn btn-primary">Modificar</button>
              </form>
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
   <script type="text/javascript">
function mostrarPassword(){
    var cambio = document.getElementById("contra");
    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  }
</script>
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>