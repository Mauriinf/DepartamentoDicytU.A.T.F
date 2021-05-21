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
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-12" align="left">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#Modal"><span class="fa fa-plus"></span> Agregar Avances</button>
              <a href="<?php echo base_url();?>calendario/calendario_modal/lista"><button type="button" class="btn btn-info btn-flat" data-toggle="modal"><span class="fa fa-eye"></span> Ver Lista de Avances</button></a>
            </div>            
          </div>
        </div>
        
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
  <!--Modal insertar-->
<div id="Modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <form autocomplete="off" action="<?php echo base_url();?>calendario/calendario_modal/guardar" id="form_calendario" method="post" accept-charset="utf-8">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Avances</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
            <label class="control-label">Titulo</label>
            <div class="controls">
            <input type="text" name="nomeven" id="nomeven" class="form-control input-sm" placeholder="Ej: Primer Avance, Segundo Avance,...">
            </div></div>
            <div class="control-group">
            <label class="control-label">Fecha y Hora inicial</label>
            <div class="controls">
            <input type="date" name="fini" id="fini" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Fecha y Hora final</label>
            <div class="controls">
            <input type="date" name="ffin" id="ffin" class="form-control input-sm">
            </div></div>
            <div class="control-group">
            <label class="control-label">Color de Etiqueta</label>
            <div class="controls">
            <select  name="fondo" id="fondo" onChange="cambiaFondo(this)" class="form-control">
              <option value=""></option>
              <option value="#003333">Verde Petroleo (Calendario Academico)</option>
              <option value="#00CCFF">Celeste (Entrega de Avances)</option>
              <option value="#FF9900">Naranja (Fecha Modificada de Avance)</option>
              <option value="#FF0000">Rojo (Entrega Final)</option>
            </select></div></div>
            <input type="text" name="textfield" id="color" class="form-control input-sm" readonly>
            <div class="control-group">
            <label class="control-label">Habilitar Link</label>
            <div class="controls">
            <div align="center">
            <label class="control-label"><input type="radio" name="link" value="calendario_modal/ver/">Si </label>
            <label class="control-label"><input type="radio" name="link" value=""> No</label>
            </div>
            </div></div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Guardar Datos</button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <!--Modal detalle-->
<div id="ModalDe" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <form autocomplete="off" action="<?php echo base_url();?>calendario/calendario_modal/guardar" method="post" accept-charset="utf-8">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Subir Avances</h4>
        </div>
        <div class="modal-body">
            <label>Titulo</label>
            <input type="file" name="nomeven" class="form-control input-sm">
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Guardar Datos</button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>