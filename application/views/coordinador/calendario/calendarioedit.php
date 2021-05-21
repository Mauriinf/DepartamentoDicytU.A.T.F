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
        Calendario
        <small>Editar Calendario</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12" align="right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" onClick="window.location='<?php echo base_url();?>calendario/calendario_modal';"><span class="fa fa-reply"></span> Volver</button>
            </div>            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <form autocomplete="off" action="<?php echo base_url();?>calendario/calendario_modal/editar" id="form_calendario" method="post" accept-charset="utf-8">
            <input type="hidden" name="txtId" value="<?php echo $event->id_evento;?>">
            <div class="control-group">
            <label class="control-label">Titulo</label>
            <div class="controls">
            <input type="text" name="nomeven" id="nomeven" class="form-control input-sm" value="<?php echo $event->titulo?>">
            </div></div>
            <div class="control-group">
            <label class="control-label">Fecha y Hora inicial</label>
            <div class="controls">
            <input type="date" name="fini" id="fini" class="form-control input-sm" value="<?php echo $event->fecha_inicio?>">
            </div></div>
            <div class="control-group">
            <label class="control-label">Fecha y Hora final</label>
            <div class="controls">
            <input type="date" name="ffin" id="ffin" class="form-control input-sm" value="<?php echo $event->fecha_final?>">
            </div></div>
            <div class="control-group">
            <label class="control-label">Color de Etiqueta</label>
            <div class="controls">
            <select  name="fondo" id="fondo" onChange="cambiaFondo(this)" class="form-control">
              <?php if ($event->color=='#FF0000') { ?>
              <option value="#FF0000" selected>Rojo</option>
              <option value="#00CCFF">Celeste</option>
              <option value="#FF9900">Naranja</option>
              <option value="#003333">Verde Petroleo</option>
              <?php } elseif ($event->color=='#00CCFF') { ?>
              <option value="#FF0000">Rojo</option>
              <option value="#00CCFF" selected>Celeste</option>
              <option value="#FF9900">Naranja</option>
              <option value="#003333">Verde Petroleo</option>
              <?php } elseif ($event->color=='#FF9900') { ?>
              <option value="#FF0000">Rojo</option>
              <option value="#00CCFF">Celeste</option>
              <option value="#FF9900" selected>Naranja</option>
              <option value="#003333">Verde Petroleo</option>
              <?php } elseif ($event->color=='#003333') { ?>
              <option value="#FF0000">Rojo</option>
              <option value="#00CCFF">Celeste</option>
              <option value="#FF9900">Naranja</option>
              <option value="#003333" selected>Verde Petroleo</option>
              <?php } else { ?>
              <option value="#FF0000">Rojo</option>
              <option value="#00CCFF">Celeste</option>
              <option value="#FF9900">Naranja</option>
              <option value="#003333">Verde Petroleo</option>
              <?php }?>
            </select>
            </div></div>
            <input type="text" name="textfield" id="color" class="form-control input-sm" readonly>
            <div class="control-group">
            <label class="control-label">Habilitar Link</label>
            <div class="controls" align="center">
            <label class="control-label"><input type="radio" name="link" value="calendario_modal/ver/">Si</label>
            <label class="control-label"><input type="radio" name="link" value="">No</label>
            </div></div>
          <div align="left"><button type="submit" id="btnSave" class="btn btn-primary">Guardar Datos</button> </div>       
    </form>
            </div>
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
