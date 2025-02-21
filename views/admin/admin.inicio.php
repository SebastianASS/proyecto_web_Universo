<?php 
session_start(); 
?>
<?php require_once '../../includes/conexion.php'; ?>
<?php if (!isset($_SESSION['usuario'])) {
      header('Location: ../../index.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-admin.inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barriecito&family=Playwrite+AU+SA:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik+Vinyl&family=Shadows+Into+Light&family=Sixtyfour&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
    
    <!-- Título -->
    <title>GALAXIUM</title>
</head>
<body>
    <div class="container">
        
        <!-- Cabecera -->
        <header class="cabecera">
            <div id="logo">
                <a href="#"><img src="../../assets/imagenes/galaxia.png" alt="" class="imagen1"></a>
            </div>
            <div id="titulo"><h1>GALAXIUM</h1></div>  
            
            <?php if(isset($_SESSION['usuario'])):?>
            <div id="caja-drop" >
            <div class="dropdown">
              <button class="btn dropdown-toggle"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Bienvenido, <?=$_SESSION['usuario']['nombre'].' '.
                                    $_SESSION['usuario']['apellidoUno'];?>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                 <li><a class="dropdown-item1" href="../../backend/controllers/auth/cerrar.php">Cerrar sesion</a></li>
              </ul>
            </div>
          </div>
          <?php endif;?>    
        </header> 
        <div class="clearfix"></div>

        <div id="breadcrumb">
           <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page"><a href="" id="link-inicio">Inicio</a></li>
              </ol>
           </nav>  
        </div>     


        <div id="cuerpo">
            <div id="botones">
             <a href="admin.publicaciones.php" class="opciones"><div id="opcionUno">Gestionar Publicaciones</div></a>
             <a href="admin.usuarios.php" class="opciones"><div id="opcionDos">Gestionar <br> usuarios</div></a>
           </div>
        </div>


        <footer id="footer">
             <div id="texto-footer">
                &copy; 2025 Sebastián Solano. Todos los derechos reservados.
             </div>
        </footer>
</div>
    <script type="text/javascript" src="../../assets/jquery/jquery-3.7.1.js"></script>
</body>
</html>

       
       