<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<?php include_once dirname(__FILE__).'/../layouts/aside.php';?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper"><!-- Left side column. contains the logo and sidebar --><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --><!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $cantfacultad?></h3>

              <p>Facultades</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo base_url();?>facultades/facultades_modal" class="small-box-footer">Visualizar Facultades <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $cantcarrera?></h3>

              <p>Carreras</p>
            </div>
            <div class="icon">
              <i class="fa fa-clipboard"></i>
            </div>
            <a href="<?php echo base_url();?>carreras/carreras_modal" class="small-box-footer">Visualizar Carreras <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <!-- ./col -->
        <!--./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue mari">
            <div class="inner">
              <h3><?php echo $cantproyectos?></h3>

              <p>Proyectos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url();?>proyectos/proyectos_modal/proy" class="small-box-footer">Visualizar Proyectos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green oil">
            <div class="inner">
              <h3><?php echo $cantproyectodocente?></h3>

              <p>Trabajos Docentes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url();?>proyectos/proyectos_modal/docente" class="small-box-footer">Visualizar Trabajos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $cantproyectoestudiante?></h3>

              <p>Trabajos Estudiantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url();?>proyectos/proyectos_modal/estudiante" class="small-box-footer">Visualizar Trabajos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box">
              <div class="wrap" >
        <div class="widget">
          <div class="fecha">
            <p id="diaSemana" class="diaSemana"></p>
            <p id="dia" class="dia"></p>
            <p>de </p>
            <p id="mes" class="mes"></p>
            <p> del </p>
            <p id="year" class="year"></p>
          </div>
          <div class="reloj">
            <p id="horas" class="horas" style="font-size:30px;"></p>
            <p style="font-size:30px;"> : </p>
            <p id="minutos" class="minutos" style="font-size:30px;"></p>
            <p style="font-size:30px;"> : </p>
              
              <p id="segundos" class="segundos" style="font-size:30px;"></p><p>&nbsp;&nbsp;</p><p id="ampm" class="ampm"></p>
            
          </div>
        </div>
      </div>
          </div>
        </div>
        <!--./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->     
    </section>
    <!-- /.content -->
  </div>  
<!-- ./wrapper -->
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>