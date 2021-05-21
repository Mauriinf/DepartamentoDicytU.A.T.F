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
        <li><a href="<?php echo base_url();?>panel/usuario"><i class="fa fa-dashboard"></i> <span> Inicio</span></a></li>
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
          </ul>
        </li>
        <li><a href="<?php echo base_url();?>calendario/calendario_modal"><i class="glyphicon glyphicon-calendar"></i> <span> Calendario de Avances</span></a></li>
        <li><a href="<?php echo base_url();?>avances/avances_modal/ver/<?php echo $this->session->id;?>"><i class="glyphicon glyphicon-scale"></i> <span> Avances</span></a></li>
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
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>