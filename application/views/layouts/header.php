<!DOCTYPE HTML>
<HTML lang="es">
    <head>
        <link rel='stylesheet' href='<?php echo base_url("assets/css/w3.css"); ?>' />
        <link rel='stylesheet' href='<?php echo base_url("assets/css/animate.css"); ?>' />
        <script type='text/javascript' src='<?php echo base_url("assets/js/jquery.js"); ?>'></script>
        <?php
            if(!empty($head_files)){
                foreach($head_files as $file){
                    print($file . "\n");
                }
            }
        ?>
    </head>

    <script>
      function abrirMenu(){
        $('#main').css('margin-left','25%');
        $('.w3-sidenav').css('width', "25%");
        $(".w3-sidenav").css("display", "block");
        $(".w3-opennav").css("display", "none");
      }

      function cerrarMenu(){
        $('#main').css('margin-left','0%');
        $('.w3-sidenav').css('width', "0%");
        $(".w3-sidenav").css("display", "none");
        $(".w3-opennav").css("display", "inline-block");
      }
    </script>

    <body>

    <nav class="w3-sidenav w3-indigo w3-card-2" style="display:none">
      <a href="javascript:void(0)"
      onclick="cerrarMenu()"
      class="w3-closenav w3-large">Cerrar<i class="material-icons">&#xE5CD;</i></a>
      <a href='<?php echo site_url(); ?>'>Inicio</a>
      <a href='<?php echo site_url("ticket/crearTicket"); ?>'>Crear Ticket</a>
      <a href='<?php echo site_url("ticket/consultar"); ?>'>Consultar Ticket</a>
      <a href='<?php echo site_url("sucursal"); ?>'>Sucursal</a>
      <a href='<?php echo site_url("usuario/index"); ?>'>Ingresar</a>
      <div class="w3-dropdown-hover">
      <a href="#">Equipo <i class="fa fa-caret-down"></i></a>
      <div class="w3-dropdown-content w3-indigo w3-border w3-card-4">
          <a href="<?php echo site_url('equipo/index'); ?>">Crear equipo</a>
          <a href="<?php echo site_url('equipo/modificar'); ?>">Actualizar</a>
          <a href="<?php echo site_url('equipo/addEntrada'); ?>">Agregar Entrada</a>
          <a href="<?php echo site_url('equipo/consultarHojaVida'); ?>">Consultar Hoja de vida</a>
        </div>
      </div>
      <?php
        if(!empty($this->session->userdata('logueado'))){
          echo "<a href='" . site_url("usuario/cerrarSesion") . "'>Cerrar sesión <i class='material-icons'>&#xE853;</i></a>";
        }
      ?>
    </nav>

    <div id="main">
      <header class="w3-blue" >
        <div class="w3-row">
          <article class="w3-col l1">
            <span class="w3-opennav w3-xlarge" onclick="abrirMenu()">&#9776;</span>
          </article>

          <article class="w3-col l11">
            <h1 class='w3-center' style='margin: 0px;'>Mesa de ayuda</h1>
          </article>
        </div>
      </header>

        <div class='w3-center'>
           <img src="<?php echo base_url('assets/img/logo_lagobo.png') ?>" />
        </div>

