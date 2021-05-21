<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Proyectos
        <small>Editar Proyectos</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <form autocomplete="off" action="<?php echo base_url('proyectos/proyectos_modal/editar');?>" id="proyectos" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="txtId" value="<?php echo $proyecto->id_investigacion;?>">
                <div class="control-group">
                <label class="control-label">Titulo</label>
                <div class="controls">
                <input type="text" name="titulo" value="<?php echo $proyecto->titulo_investigacion;?>" class="form-control input-sm">
                </div></div>
                <div class="control-group">
                <label class="control-label">Objetivo General</label>
                <div class="controls">
                <textarea id="editor1" class="form-control textarera-sm" style="height: 300px" name="objetivog">
                <?= $proyecto->objetivo_general;?>
                </textarea>
                </div></div>
                <div class="control-group">
                <label class="control-label">Resumen</label>
                <div class="controls">
                <textarea id="editor2" class="form-control textarera-sm" style="height: 300px" name="resumen">
                  <?= $proyecto->resumen;?>
                </textarea>
                </div></div>
                <div class="control-group">
                <label class="control-label">Conclusiones</label>
                <div class="controls">
                <textarea id="editor3" class="form-control textarera-sm" style="height: 300px" name="conclu">
                  <?= $proyecto->conclusiones;?>
                </textarea>
                </div></div>
                <div class="control-group">
                <label class="control-label">Tipo de Investigador</label>
                <div class="controls">
                <select name="tipo" id="tipo" class="form-control">
                  <option>..:: Seleccione tipo de investigador ::..</option>
                  <?php foreach ($estrat as $tipo):?>
                    <?php if($tipo->id == $proyecto->tipo_investigador): ?>
                  <option value="<?php echo $tipo->id; ?>" selected><?php echo $tipo->nombre_investigador; ?></option>
                <?php else: ?>
                  <option value="<?php echo $tipo->id; ?>"><?php echo $tipo->nombre_investigador; ?></option>
                <?php endif;?>
                  <?php endforeach?>
                </select>
                </div></div>
                <div class="control-group">
                <label class="control-label">Facultad</label>
                <div class="controls">
                <select name="facultadp" id="facultadp" class="form-control">
                  <option>..:: Seleccione Facultad ::..</option>
                  <?php foreach ($estrap as $facu):?>
                     <?php if($facu->id_facultad == $proyecto->id_facultad): ?>
                  <option value="<?php echo $facu->id_facultad; ?>" selected><?php echo $facu->nombre_facultad; ?></option>
                <?php else: ?>
                  <option value="<?php echo $facu->id_facultad; ?>"><?php echo $facu->nombre_facultad; ?></option>
                <?php endif;?>
                  <?php endforeach?>
                </select>
                </div></div>
                <div class="control-group">
                <label class="control-label">Carrera</label>
                <div class="controls">
                <select name="carrerap" id="carrerap" class="form-control">                  
                  <option>..:: Selecione Carrera ::..</option>
                  <?php foreach ($carrera as $carrera):?>
                     <?php if($carrera->id_carrera == $proyecto->id_carrera): ?>
                  <option value="<?php echo $carrera->id_carrera; ?>" selected><?php echo $carrera->nombre_carrera; ?></option>
                <?php else: ?>
                  <option value="<?php echo $carrera->id_carrera; ?>"><?php echo $carrera->nombre_carrera; ?></option>
                <?php endif;?>
                  <?php endforeach?>
                </select>
                </div></div>
                <label>Imagen</label>
                <?php if ($proyecto->id_facultad=='1') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/puras.png');?>" width="100px" height="100px" alt="">            
              <?php } elseif ($proyecto->id_facultad=='2') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/enfermeria.png');?>" width="100px" height="100px" alt="">
              <?php } elseif ($proyecto->id_facultad=='5') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/mineras.png');?>" width="100px" height="100px" alt="">
              <?php } elseif ($proyecto->id_facultad=='7') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/humanisticas.png');?>" width="100px" height="100px" alt="">
              <?php } elseif ($proyecto->id_facultad=='8') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/agronomia.png');?>" width="100px" height="100px" alt="">
              <?php } elseif ($proyecto->id_facultad=='12') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/ingenieria.png');?>" width="100px" height="100px" alt="">
              <?php } elseif ($proyecto->id_facultad=='13') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/economia.png');?>" width="100px" height="100px" alt="">
              <?php } elseif ($proyecto->id_facultad=='14') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/artes.png');?>" width="100px" height="100px" alt="">
              <?php } elseif ($proyecto->id_facultad=='15') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/geologia.png');?>" width="100px" height="100px" alt="">
              <?php } elseif ($proyecto->id_facultad=='16') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/derecho.png');?>" width="100px" height="100px" alt="">
              <?php } elseif ($proyecto->id_facultad=='17') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/medicina.png');?>" width="100px" height="100px" alt="">
              <?php } elseif ($proyecto->id_facultad=='18') { ?>
              <img class="img-fluid" src="<?= base_url('uploads/facultades/tecnica.png');?>" width="100px" height="100px" alt="">
              <?php } ?>
                <div class="control-group">                
                <label class="control-label">Autor: </label>
                <div class="controls">
                <input type="input" name="autor" value="<?= $proyecto->nombre_autor;?>" class="form-control input-sm" placeholder="Ej. UNIV. JUAN PEREZ - UNIV. CESAR FLORES...">
                </div></div>

                <div class="control-group">
            <label class="control-label">Gestion:</label>
            <div class="controls">
            <input type="text" name="gestion" value="<?= $proyecto->gestion;?>" class="form-control input-sm" placeholder="Ej. 2019, 2020, 2021...">
            </div></div>
            <div class="control-group">
            <label class="control-label">Tutor</label>
            <div class="controls">
            <input type="text" name="tutor" class="form-control input-sm" placeholder="Ej. Ing. JUAN PEREZ - Lic. CESAR FLORES..." value="<?php echo $proyecto->tutor;?>">
            </div></div>
            <div class="control-group">
            <label class="control-label">Tipo de investigacion</label>
            <div class="controls">
            <input type="text" name="tipoinves" class="form-control input-sm" placeholder="Ej. Basica, Experimental, Aplicada..." value="<?php echo $proyecto->tipo_investigacion;?>">
            </div></div><br>
            <div class="callout callout-danger">
          <p><b>* NOTA:</b> En Caso de no llenar con una Casilla escriba (NO DISPONIBLE)</p>
        </div>             
            <br>
            <button type="submit" id="btnDelete" class="btn btn-primary">Modificar</button>
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
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>