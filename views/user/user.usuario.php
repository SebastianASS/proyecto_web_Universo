<?php 
session_start(); // Inicia la sesión si no está iniciada
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
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-user.usuario.css">
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
                <li><a class="dropdown-item1" href="#">Perfil</a></li>
                <li><a class="dropdown-item1" href="../../backend/controllers/auth/cerrar.php">Cerrar sesion</a></li>
              </ul>
            </div>
          </div>
          <?php endif;?>

        </header>
        <div class="clearfix"></div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user.inicio.php" id="link-inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page" id="link-inicio">Perfil</li>
            </ol>
        </nav>

       
        <div id="contenedor-info">  <!-- Contenedor informacion -->

            <div id="contenedor-secundario">

            <h2 id="titulo-cajaSecundaria">Mi perfil: </h2>
             
            <div class="componente">
    <label for="nombreTextarea" id="etiqueta">Nombre:</label>
    <textarea id="nombreTextarea" rows="4" cols="50" readonly><?= $_SESSION['usuario']['nombre']?></textarea>
</div>

<div class="componente">
    <label for="apellidoUnoTextarea" id="etiqueta">Primer Apellido:</label>
    <textarea id="apellidoUnoTextarea" rows="4" cols="50" readonly><?= $_SESSION['usuario']['apellidoUno'] ?></textarea>
</div>

<div class="componente">
    <label for="apellidoDosTextarea" id="etiqueta">Segundo apellido:</label>
    <textarea id="apellidoDosTextarea" rows="4" cols="50" readonly><?=$_SESSION['usuario']['apellidoDos'] ?></textarea>
</div>

<div class="componente">
    <label for="edadTextarea" id="etiqueta">Edad:</label>
    <textarea id="edadTextarea"  rows="4" cols="50" readonly><?=$_SESSION['usuario']['edad'] ?></textarea>
</div>

<div class="componente">
    <label for="correoTextarea" id="etiqueta">Correo:</label>
    <textarea id="correoTextarea"  rows="4" cols="50" readonly><?=$_SESSION['usuario']['correo'] ?></textarea>
</div>


            <div class="componenteBt">
            <button type="button" id="tbnEditar" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#exampleModalEditar" data-bs-whatever="@mdo"  
        data-id="<?= $_SESSION['usuario']['id'] ?>" 
        data-nombre="<?= $_SESSION['usuario']['nombre'] ?>" 
        data-apellidoUno="<?= $_SESSION['usuario']['apellidoUno'] ?>" 
        data-apellidoDos="<?= $_SESSION['usuario']['apellidoDos'] ?>" 
        data-edad="<?= $_SESSION['usuario']['edad'] ?>" 
        data-correo="<?= $_SESSION['usuario']['correo'] ?>" 
        data-contraseña="<?= $_SESSION['usuario']['contraseña'] ?>">Editar</button>            </div>

            </div>

         
        </div><!-- Contenedor informacion -->

        <!-- Footer -->
        <footer id="footer">
            <div id="texto-footer">
                &copy; 2025 Sebastián Solano. Todos los derechos reservados.
            </div>
        </footer>
        <!-- Footer -->


        <!-- Modal para "Editar Usuario" -->
<div class="modal fade" id="exampleModalEditar" tabindex="-1" aria-labelledby="exampleModalLabelEditar" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabelEditar">Editar Usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../../backend/controllers/user/user.editar-usuario.php" method="POST" id="formularioUsuario">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre1" name="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-apellidoUno" class="col-form-label">Primer Apellido:</label>
                                    <input type="text" class="form-control" id="apellidoUno1" name="apellidoUno">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-apellidoDos" class="col-form-label">Segundo apellido:</label>
                                    <input type="text" class="form-control" id="apellidoDos1" name="apellidoDos">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-edad" class="col-form-label">Edad:</label>
                                    <input type="number" min="12" max="110" class="form-control" id="edad1" name="edad">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-correo" class="col-form-label">Correo:</label>
                                    <input type="email" class="form-control" id="correo1" name="correo">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-contraseña" class="col-form-label">Contraseña:</label>
                                    <input type="password" class="form-control" placeholder="Si deseas cambiar tu contraseña, escribela aquí" id="contraseña1" name="contraseña">
                                </div>
                                <input type="hidden" id="id1" name="id">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                                  <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
                                </div>                
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>
<!---Modal para editar--->


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const btnEditar = document.querySelectorAll('.btn-editar');

    btnEditar.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = btn.getAttribute('data-id');
            const nombre = btn.getAttribute('data-nombre');
            const apellidoUno = btn.getAttribute('data-apellidoUno');
            const apellidoDos = btn.getAttribute('data-apellidoDos');
            const edad = btn.getAttribute('data-edad');
            const correo = btn.getAttribute('data-correo');
            const contraseña = btn.getAttribute('data-contraseña');

            console.log("ID del usuario: ", id);
            console.log("ID del usuario: ", nombre);
            console.log("ID del usuario: ", apellidoUno);
            console.log("ID del usuario: ", apellidoDos);
            console.log("ID del usuario: ", edad);
            console.log("ID del usuario: ", correo);
            console.log("ID del usuario: ", contraseña);

            document.getElementById('id1').value = id;
            document.getElementById('nombre1').value = nombre;
            document.getElementById('apellidoUno1').value = apellidoUno;
            document.getElementById('apellidoDos1').value = apellidoDos;
            document.getElementById('edad1').value = edad;
            document.getElementById('correo1').value = correo;
            //document.getElementById('contraseña1').value = contraseña;
        });
    });
});

    </script>

    <script type="text/javascript" src="../../jquery/jquery-3.7.1.js"></script>
</body>
</html>