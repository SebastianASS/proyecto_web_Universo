<?php require_once '../../includes/cabecera.php' ?>
<?php require_once '../../includes/functions.php'?>


<link rel="stylesheet" type="text/css" href="../../assets/css/style-registro.css">
<div id="contenedor-formulario">
        <form id="formulario-inicio" method="POST" action="../../backend/controllers/user/registro.php">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre">
              <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Primer apellido</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="apellidoUno">
              <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Segundo apellido</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="apellidoDos">
              <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="edad" class="form-label">Edad</label>
              <input type="number" class="form-control" id="edad" name="edad" min="10" max="100" step="1" value="18">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Correo</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo">
              <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="contraseña">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="mostrarContraseña">
                <label class="form-check-label" for="mostrarContraseña">Ver contraseña</label>
            </div>
            <a href="../../index.php" class="btn btn-secondary">Iniciar Sesion</a>
            <button type="submit" class="btn btn-primary">Registrarse</button>
          </form>
        </div>

        <?php require_once '../../includes/pie.php'?>

        <script>
        document.getElementById('mostrarContraseña').addEventListener('change', function() {
            var contraseñaInput = document.getElementById('exampleInputPassword1');
            if (this.checked) {
                contraseñaInput.type = 'text';
            } else {
                contraseñaInput.type = 'password';
            }
        });
    </script>
    <script type="text/javascript" src="../../assets/jquery/jquery-3.7.1.js"></script>

    <?php if (isset($_SESSION['error_registro'])): ?>
    <script>
        alert("<?php echo $_SESSION['error_registro']; ?>");
    </script>
    <?php unset($_SESSION['error_registro']); ?>
<?php endif; ?>

