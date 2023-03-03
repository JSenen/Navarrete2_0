<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $title ?></title>
    <meta name="description" content="<?php $description ?>">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
  </head>
  <body>
    <header>
      <div class="container">
        <div class="logo">
          <a href="index.php"><img src="./img/logo.png" alt="NAVARRETE 2.0"></a>
          <a href="index.php"><img src="./img/moustache.png" alt="bigote"></a>
        </div>
       
<!-- NAV BAR -->
        <ul class="menu cf">
          <li><a href="index.php">Inicio</a></li>
          <li><a href="">Equipos</a></li>
          <li><a href="">Telefonía</a>
              <ul class="submenu">
                <li><a href="./telefonia.php">Grabar</a></li>
                <li><a href="./telefonia.php">Listado</a></li>
                <li><a href="./telefonia.php">Extensiones</a></li>
              </ul>  		
          </li>
          <li><a href="">Videoconferencias</a>
              <ul class="submenu">
                <li><a href="">Solicitar</a></li>
              </ul>	
              <ul class="submenu">
                <li><a href="">Planificadas</a></li>
              </ul>	
          </li>
          <li><a href="">Incidencias</a></li>
          <li><a href="">Otros</a></li>
        </ul>
<!-- END NAVBAR -->     
        
      </div><!-- /.container -->
    </header>