<?php require_once 'conexion.php' ?>
<?php require_once 'functions.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <!--Fuente-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Barriecito&family=Playwrite+AU+SA:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik+Vinyl&family=Shadows+Into+Light&family=Sixtyfour&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
     <!--Fuente-->
    <title>GALAXIUM</title>
</head>
<body>
    <div class="container">
        <header class="cabecera">
              <div id="logo">
                <a href="#"><img src="../../assets/imagenes/galaxia.png" alt="" class="imagen1"></a>
              </div>
              <div id="titulo"><h1>GALAXIUM</h1></div>    
               <div id="inicio bg-dark">
                
               <?php if(isset($_SESSION['usuarios'])):?>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdowwn-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                    Bienvenido, <?=$_SESSION['usuarios']['nombre'].' '.
                                    $_SESSION['usuarios']['apellidos'];?>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="crear-entradas.php" class="boton boton-verde">Crear entrada</a>
                                            <a class="dropdown-item" href="crear-categoria.php">Crear categoria</a>
                                            <a class="dropdown-item" href="mis-datos.php">Mis datos</a>
                                            <a class="dropdown-item" href="cerrar.php">Cerrar sesion</a>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                            <?php endif;?>
                        </ul>

               </div>
              
        </header>      
        <div class="clearfix"></div>