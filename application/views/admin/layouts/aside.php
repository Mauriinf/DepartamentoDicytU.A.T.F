  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image" >
        
          <img src="<?php echo base_url("uploads/user_img/");?><?php echo $this->session->userdata('img');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <a ><i class="fa fa-circle text-success"></i> Conectado</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="<?php echo base_url();?>panel"><i class="fa fa-dashboard"></i> <span> Inicio</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i> <span> Administración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>facultades/facultades_modal"><i class="fa fa-circle-o text-aqua"></i> Facultades</a></li>
            <li><a href="<?php echo base_url();?>carreras/carreras_modal"><i class="fa fa-circle-o text-aqua"></i> Carreras</a></li>
            <li><a href="<?php echo base_url();?>cargos/cargos_modal"><i class="fa fa-circle-o text-aqua"></i> Cargos</a></li>
            <li><a href="<?php echo base_url();?>personal/personal_modal"><i class="fa fa-circle-o text-aqua"></i> Personal</a></li>
            <li><a href="<?php echo base_url();?>portada/portada_modal"><i class="fa fa-circle-o text-aqua"></i> Portada</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url();?>convocatorias/convocatoria_modal"><i class="fa fa-dashboard"></i> <span> Convocatorias</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i> <span> Proyectos / Trabajos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>proyectos/proyectos_modal/proy"><i class="fa fa-circle-o text-aqua"></i> Proyectos</a></li>
            <li><a href="<?php echo base_url();?>proyectos/proyectos_modal/docente"><i class="fa fa-circle-o text-aqua"></i> Trabajo Docentes</a></li>
            <li><a href="<?php echo base_url();?>proyectos/proyectos_modal/estudiante"><i class="fa fa-circle-o text-aqua"></i> Trabajo Estudiantes</a></li>
            <li><a href="<?php echo base_url();?>proyectos/proyectos_modal"><i class="fa fa-circle-o text-aqua"></i> Agregar Proyectos / Trabajos </a></li>
            <li><a href="<?php echo base_url();?>proyectos/proyectos_modal/sociedad"><i class="fa fa-circle-o text-aqua"></i> Sociedades Cienctificas</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url();?>calendario/calendario_modal"><i class="glyphicon glyphicon-calendar"></i> <span> Calendario de Avances</span></a></li>
        <li><a href="<?php echo base_url();?>avances/avances_modal"><i class="glyphicon glyphicon-scale"></i> <span> Avances</span></a></li>
        <li><a href="<?php echo base_url();?>publicacion/publicacion_modal"><i class="fa fa-newspaper-o"></i> <span> Publicaciones</span></a></li>
        
        <li><a href="<?php echo base_url();?>recursos/recursos_modal"><i class="fa fa-book"></i> <span> Recursos  Bibliográficos</span></a></li>
        <li><a href="<?php echo base_url();?>becas/becas_modal"><i class="glyphicon glyphicon glyphicon-globe"></i> <span> Cursos</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>reportes/reportes/facultades"><i class="fa fa-circle-o text-aqua"></i> Facultades</a></li>
            <li><a href="<?php echo base_url()?>reportes/reportes/carreras"><i class="fa fa-circle-o text-aqua"></i> Carreras</a></li>
            <li><a href="<?php echo base_url()?>reportes/reportes/personal"><i class="fa fa-circle-o text-aqua"></i> Personal</a></li>
            <li><a href="<?php echo base_url()?>reportes/reportes/usuario"><i class="fa fa-circle-o text-aqua"></i> Usuarios</a></li>
            <li><a href="<?php echo base_url()?>reportes/reportes"><i class="fa fa-circle-o text-aqua"></i> Proyectos / Trabajos</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url();?>mensajes/mensajes_modal">
            <i class="fa fa-envelope"></i> <span> Mensajes</span>
            <span class="pull-right-container">             
              <small class="label pull-right bg-red"><?php
                  $this->db->from('mensajes');
                  $this->db->where('id_remitente',$this->session->id);
                  $this->db->where('eliminado','1');
                  echo $this->db->count_all_results();
                  ?></small><!--eliminados-->
              <small class="label pull-right bg-yellow"><?php
                  $this->db->from('mensajes');
                  $this->db->where('id_emisor',$this->session->id);
                  $this->db->where('eliminado','0');
                  echo $this->db->count_all_results();
                  ?></small><!--enviados-->
              <small class="label pull-right bg-primary"><?php
                  $this->db->from('mensajes');
                  $this->db->where('id_remitente',$this->session->id);
                  $this->db->where('leido','0');
                  echo $this->db->count_all_results();
                  ?></small><!--recibidos-->
            </span>
           </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-circle-o"></i> <span> Cuentas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>administrador/usuarios_modal"><i class="fa fa-circle-o text-aqua"></i> Usuarios</a></li>
            
          </ul>
        </li>
        <li><a href="<?php echo base_url();?>Welcome/database_backup"><i class="glyphicon glyphicon-download"></i> <span> Respaldo de Seguridad</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>