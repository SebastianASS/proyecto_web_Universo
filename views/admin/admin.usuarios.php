<?php 
session_start(); 
?>

<?php require_once '../../includes/conexion.php'; ?>
<?php require_once '../../includes/functions.php'; ?>
<?php $roles = conseguirRol($db); ?>
<?php $usuarios = conseguirUsuarios($db); ?>

<?php if (!isset($_SESSION['usuario'])) {
      header('Location: ../../index.php');
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-admin.usuarios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barriecito&family=Playwrite+AU+SA:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik+Vinyl&family=Shadows+Into+Light&family=Sixtyfour&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
    <title>GALAXIUM</title>
</head>
<body>
    <div class="container">
        <header class="cabecera">
            <div id="logo">
                <a href="#"><img src="../../assets/imagenes/galaxia.png" alt="" class="imagen1"></a>
            </div>

            <div id="titulo"><h1>GALAXIUM</h1></div>   

            <?php if (isset($_SESSION['usuario'])): ?>
                <div id="caja-drop">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bienvenido, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidoUno']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item1" href="../../backend/controllers/auth/cerrar.php">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </header>      
        <div class="clearfix"></div>

        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.inicio.php" id="link-inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page" id="link-inicio">Usuarios</li>
            </ol>
        </nav>

        <div id="contenedor-cuerpo"> 
            <!-- Botones de acción -->
            <div id="botones">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" id="btDos">Agregar Usuario</button>  
            </div>

            <!-- Modal para "Agregar Usuario" -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../../backend/controllers/admin/registrar-usuario.php" method="POST">
                                <div class="mb-3">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="apellidoUno" class="col-form-label">Primer Apellido:</label>
                                    <input type="text" class="form-control" id="apellidoUno" name="apellidoUno">
                                </div>
                                <div class="mb-3">
                                    <label for="apellidoDos" class="col-form-label">Segundo apellido:</label>
                                    <input type="text" class="form-control" id="apellidoDos" name="apellidoDos"> 
                                </div>
                                <div class="mb-3">
                                    <label for="edad" class="col-form-label">Edad:</label>
                                    <input type="number" min="12" max="110" class="form-control" id="edad" name="edad">
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="col-form-label">Correo:</label>
                                    <input type="email" class="form-control" id="correo" name="correo">
                                </div>
                                <div class="mb-3">
                                    <label for="contraseña" class="col-form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="contraseña" name="contraseña">
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="rolButton">
                                        Rol
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if (!empty($roles)): ?>
                                            <?php foreach ($roles as $rol): ?>    
                                                <li>
                                                    <a class="dropdown-item" href="#" data-id="<?= $rol['id'] ?>" data-descripcion="<?= htmlspecialchars($rol['descripcion']) ?>">
                                                        <?= htmlspecialchars($rol['descripcion']) ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li><a class="dropdown-item" href="#">No hay categorías disponibles</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <input type="hidden" name="rol" id="rol" value="">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla de usuarios -->
            <div id="tablaUsuarios" class="contenedor-tabla">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Primer Apellido</th>
                            <th scope="col">Segundo apellido</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios)): ?>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <th><?= $usuario['id'] ?></th>
                                    <td><?= $usuario['nombre'] ?></td>
                                    <td><?= $usuario['apellidoUno'] ?></td>
                                    <td><?= $usuario['apellidoDos'] ?></td>
                                    <td><?= $usuario['edad'] ?></td>
                                    <td><?= $usuario['correo'] ?></td>
                                    <td id="contrasena"><?= $usuario['contraseña'] ?></td>
                                    <td><?= htmlspecialchars($usuario['nombre_rol']) ?></td>
                                    <td>
                                        <div id="btnUpdate">
                                            <button type="button" class="btn btn-secondary1" data-bs-toggle="modal" data-bs-target="#exampleModalEditar" data-bs-whatever="@mdo" id="btEditar"  
                                                data-id="<?= $usuario['id'] ?>" 
                                                data-nombre="<?= htmlspecialchars($usuario['nombre']) ?>" 
                                                data-apellido-uno="<?= htmlspecialchars($usuario['apellidoUno']) ?>" 
                                                data-apellido-dos="<?= htmlspecialchars($usuario['apellidoDos']) ?>" 
                                                data-edad="<?= htmlspecialchars($usuario['edad']) ?>" 
                                                data-correo="<?= htmlspecialchars($usuario['correo']) ?>" 
                                                data-contraseña="<?= htmlspecialchars($usuario['contraseña']) ?>" 
                                                data-rol-id="<?= $usuario['rol'] ?>" 
                                                data-rol-nombre="<?= htmlspecialchars($usuario['nombre_rol']) ?>">Editar</button>
                                            <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#exampleModalEliminar" id="btEliminar" data-idU="<?= $usuario['id'] ?>">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No hay publicaciones registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal para "Editar Usuario" -->
            <div class="modal fade" id="exampleModalEditar" tabindex="-1" aria-labelledby="exampleModalLabelEditar" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabelEditar">Editar Usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../../backend/controllers/admin/actualiza-usuario.php" method="POST">
                                <input type="hidden" name="id" id="id-usuario">
                                <div class="mb-3">
                                    <label for="nombre-editar" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre-editar" name="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="apellido-uno-editar" class="col-form-label">Primer Apellido:</label>
                                    <input type="text" class="form-control" id="apellido-uno-editar" name="apellidoUno">
                                </div>
                                <div class="mb-3">
                                    <label for="apellido-dos-editar" class="col-form-label">Segundo Apellido:</label>
                                    <input type="text" class="form-control" id="apellido-dos-editar" name="apellidoDos">
                                </div>
                                <div class="mb-3">
                                    <label for="edad-editar" class="col-form-label">Edad:</label>
                                    <input type="number" min="12" max="110" class="form-control" id="edad-editar" name="edad">
                                </div>
                                <div class="mb-3">
                                    <label for="correo-editar" class="col-form-label">Correo:</label>
                                    <input type="email" class="form-control" id="correo-editar" name="correo">
                                </div>
                                <div class="mb-3">
                                    <label for="contraseña-editar" class="col-form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="contraseña-editar" placeholder="Si desea actualizar contraseña, agregar..." name="contraseña">
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" id="usuario-boton-editar" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Rol
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownUsuariosEditar">
                                        <?php if (!empty($roles)): ?>
                                            <?php foreach ($roles as $rol): ?>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-id="<?= $rol['id'] ?>" data-descripcion="<?= htmlspecialchars($rol['descripcion']) ?>">
                                                        <?= htmlspecialchars($rol['descripcion']) ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li><a class="dropdown-item" href="#">No hay roles disponibles</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <input type="hidden" name="rol" id="rol-editar" value="">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para "Eliminar Usuario" -->
            <div class="modal fade" id="exampleModalEliminar" tabindex="-1" aria-labelledby="exampleModalLabelEliminar" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabelEliminar">Eliminar usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Está seguro de eliminar este usuario?
                        </div>
                        <form action="../../backend/controllers/admin/eliminar-usuario.php" method="POST">
                            <input type="hidden" id="id-usuario-eliminar" name="idUsuario">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer id="footer">
            <div id="texto-footer">
                &copy; 2025 Sebastián Solano. Todos los derechos reservados.
            </div>
        </footer>
    </div>


    <!--script para actualizar el dropdown-->
    <script>
         document.addEventListener('DOMContentLoaded', function () {
         const rolButton = document.getElementById('rolButton'); 
         const rolInput = document.getElementById('rol'); 
         const dropdownItems = document.querySelectorAll('.dropdown-item'); 

        dropdownItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            const selectedRolId = this.getAttribute('data-id');
            const selectedRolDescripcion = this.getAttribute('data-descripcion');

            rolButton.textContent = selectedRolDescripcion;

            rolInput.value = selectedRolId;

            console.log('Rol seleccionado:', selectedRolDescripcion, 'ID:', selectedRolId);
           });
         });
       });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const exampleModalEditar = document.getElementById('exampleModalEditar');
            if (exampleModalEditar) {
                exampleModalEditar.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget; 
                    const id = button.getAttribute('data-id');
                    const nombre = button.getAttribute('data-nombre');
                    const apellidoUno = button.getAttribute('data-apellido-uno');
                    const apellidoDos = button.getAttribute('data-apellido-dos');
                    const edad = button.getAttribute('data-edad');
                    const correo = button.getAttribute('data-correo');
                    const contraseña = button.getAttribute('data-contraseña');
                    const rolId = button.getAttribute('data-rol-id');
                    const rolNombre = button.getAttribute('data-rol-nombre');

                    const modalTitle = exampleModalEditar.querySelector('.modal-title');
                    const modalBodyInputNombre = exampleModalEditar.querySelector('#nombre-editar');
                    const modalBodyInputApellidoUno = exampleModalEditar.querySelector('#apellido-uno-editar');
                    const modalBodyInputApellidoDos = exampleModalEditar.querySelector('#apellido-dos-editar');
                    const modalBodyInputEdad = exampleModalEditar.querySelector('#edad-editar');
                    const modalBodyInputCorreo = exampleModalEditar.querySelector('#correo-editar');
                    const modalBodyInputContraseña = exampleModalEditar.querySelector('#contraseña-editar');
                    const modalBodyInputRol = exampleModalEditar.querySelector('#usuario-boton-editar');

                    modalTitle.textContent = 'Editar Usuario ' + nombre;
                    modalBodyInputNombre.value = nombre;
                    modalBodyInputApellidoUno.value = apellidoUno;
                    modalBodyInputApellidoDos.value = apellidoDos;
                    modalBodyInputEdad.value = edad;
                    modalBodyInputCorreo.value = correo;
                    modalBodyInputRol.textContent = rolNombre;
                    modalBodyInputRol.setAttribute('data-rol-id', rolId);

                    const modalBodyInputId = exampleModalEditar.querySelector('#id-usuario');
                    modalBodyInputId.value = id;

                    const modalBodyInputRolHidden = exampleModalEditar.querySelector('#rol-editar');
                    modalBodyInputRolHidden.value = rolId;

                    console.log('Valor de rolId:', rolId);
                    console.log('Valor de modalBodyInputRolHidden:', modalBodyInputRolHidden.value);

                    const dropdownItems = exampleModalEditar.querySelectorAll('.dropdown-item');
                    dropdownItems.forEach(item => {
                        item.addEventListener('click', function(e) {
                            e.preventDefault();
                            const selectedRolId = this.getAttribute('data-id');
                            const selectedRolNombre = this.getAttribute('data-descripcion');

                            modalBodyInputRol.textContent = selectedRolNombre;

                            modalBodyInputRolHidden.value = selectedRolId;

                            console.log('Nuevo valor de rol seleccionado:', selectedRolId);
                        });
                    });
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const eliminarButtons = document.querySelectorAll('.btn-eliminar');
            eliminarButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-idU');
                    console.log("ID del usuario a eliminar:", id);
                    document.getElementById('id-usuario-eliminar').value = id;
                });
            });
        });
    </script>

<?php if (isset($_SESSION['error_actualizar'])): ?>
    <script>
        alert("<?php echo $_SESSION['error_actualizar']; ?>");
    </script>
    <?php unset($_SESSION['error_actualizar']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['exito_actualizar'])): ?>
    <script>
        alert("<?php echo $_SESSION['exito_actualizar']; ?>");
    </script>
    <?php unset($_SESSION['exito_actualizar']); ?>
<?php endif; ?>

    <script type="text/javascript" src="jquery/jquery-3.7.1.js"></script>
</body>
</html>