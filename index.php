<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
                <a href="#"><img src="assets/imagenes/galaxia.png" alt="" class="imagen1"></a>
              </div>
              <div id="titulo"><h1>GALAXIUM</h1>
              </div> 
        </header>   
        <div class="clearfix"></div> 
        
        <div id="formularioP">
        <form id="formulario-inicio" method="POST" action="./backend/controllers/auth/login.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="contraseña" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="mostrarContraseña">
                <label class="form-check-label" for="mostrarContraseña">Ver contraseña</label>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar</button>
            <a href="./views/user/registrarse.php" class="btn btn-secondary">Registrarse</a>
        </form>       
        </div>




        <footer id="footer">
             <div id="texto-footer">
                &copy; 2025 Sebastián Solano. Todos los derechos reservados.
             </div>
        </footer>
    </div>  
 
       <script>
        // JavaScript para mostrar/ocultar la contraseña
        document.getElementById('mostrarContraseña').addEventListener('change', function() {
            var contraseñaInput = document.getElementById('exampleInputPassword1');
            if (this.checked) {
                contraseñaInput.type = 'text';
            } else {
                contraseñaInput.type = 'password';
            }
        });
    </script>


     
        <?php if (isset($_SESSION['error_login'])): ?>
    <script>
        alert("<?php echo $_SESSION['error_login']; ?>");
    </script>
    <?php unset($_SESSION['error_login']); ?>
<?php endif; ?>


<?php if (isset($_SESSION['registro_exitoso'])): ?>
    <script>
        alert("<?php echo $_SESSION['registro_exitoso']; ?>");
    </script>
    <?php unset($_SESSION['registro_exitoso']); ?>
<?php endif; ?>


    

</body>

</html>


































