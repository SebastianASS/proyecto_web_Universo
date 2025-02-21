<?php
session_start();
require_once '../../includes/conexion.php';
require_once '../../includes/functions.php';
$categorias = conseguirCategorias($db);
$publicaciones = conseguirPublicaciones($db);
?>

<?php if (!isset($_SESSION['usuario'])) {
      header('Location: ../../index.php');
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-admin.publicaciones.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
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

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.inicio.php" id="link-inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page" id="link-inicio">Publicaciones y categorias</li>
            </ol>
        </nav>

        <!-- Contenedor Formulario -->
        <div id="contenedor-tablas">
            <!-- Botones de acción -->
            <div id="botones">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalDos" data-bs-whatever="@mdo" id="btnDos">Agregar Publicación</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" id="bt">Agregar Categoría</button>
            </div>

            <!-- Modal para "Agregar Categoria" -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../../backend/controllers/admin/agregar-categoria.php" method="POST">
                                <div class="mb-3">
                                    <label for="nombre-categoria" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre-categoria" name="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion-categoria" class="col-form-label">Descripción:</label>
                                    <textarea class="form-control" id="descripcion-categoria" name="descripcion"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<!-- Modal para "Editar Categoría" -->
<div class="modal fade" id="exampleModalEditar" tabindex="-1" aria-labelledby="exampleModalLabelEditar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabelEditar">Editar Categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../backend/controllers/admin/editar-categoria.php" method="POST">
                    <input type="hidden" id="categoria-id-editar" name="id">
                    <div class="mb-3">
                        <label for="categoria-nombre-editar" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="categoria-nombre-editar" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="categoria-descripcion-editar" class="col-form-label">Descripción:</label>
                        <textarea class="form-control" id="categoria-descripcion-editar" name="descripcion"></textarea>
                    </div>

                    <!-- Botones del modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal para "Editar Publicacion" -->
<div class="modal fade" id="exampleModalEditarPublicacion" tabindex="-1" aria-labelledby="exampleModalLabelEditarPublicacion" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabelEditarPublicacion">Editar Publicación</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../backend/controllers/admin/editar-publicacion.php" method="POST">
                    <input type="hidden" id="publicacion-id-editar" name="id">
                    <div class="mb-3">
                        <label for="publicacion-titulo-editar" class="col-form-label">Título:</label>
                        <input type="text" class="form-control" id="publicacion-titulo-editar" name="titulo">
                    </div>
                    <div class="mb-3">
                        <label for="publicacion-descripcion-editar" class="col-form-label">Descripción:</label>
                        <textarea class="form-control" id="publicacion-descripcion-editar" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="publicacion-fecha-editar" class="col-form-label">Fecha:</label>
                        <input type="text" class="form-control" id="publicacion-fecha-editar" name="fecha">
                    </div>
                    <div class="mb-3">
                        <label for="publicacion-imagen-editar" class="col-form-label">Imagen:</label>
                        <input type="text" class="form-control" id="publicacion-imagen-editar" name="imagen_ruta">
                    </div>
                    <div class="dropdownDos">
                        <a class="btn btn-secondary dropdown-toggle" id="categoria-boton-editar" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categoría
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownCategorias">
                            <?php if (!empty($categorias)): ?>
                                <?php foreach ($categorias as $categoria): ?>
                                    <li>
                                        <a class="dropdown-item" href="#" data-id="<?= $categoria['id']?>">
                                            <?= htmlspecialchars($categoria['nombre']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="#">No hay categorías disponibles</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <input type="hidden" id="categoria-id-editarP" name="categoria_idP">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal para eliminar categoría -->
<div class="modal fade" id="exampleModalEliminarCat" tabindex="-1" aria-labelledby="exampleModalLabelEliminarCat" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabelEliminarCat">Eliminar categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro de eliminar la categoría "<span id="nombre-categoria-eliminar"></span>"?
            </div>
            <form action="../../backend/controllers/admin/eliminar-categoria.php" method="POST">
                <input type="hidden" id="categoria-id-eliminarC" name="idCategoria">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal para eliminar publicación -->
<div class="modal fade" id="exampleModalEliminarPub" tabindex="-1" aria-labelledby="exampleModalLabelEliminarPub" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabelEliminarPub">Eliminar Publicación</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro de eliminar la publicación?"<span id="nombre-publicacion-eliminar"></span>
            </div>
            <!-- Formulario para eliminar la publicación -->
            <form action="../../backend/controllers/admin/eliminar-publicacion.php" method="POST">
                <input type="hidden" id="publicacion-id-eliminarP" name="idPublicacion">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="confirmar-eliminarP">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

            <!-- Modal para "Agregar Publicación" -->
            <div class="modal fade" id="exampleModalDos" tabindex="-1" aria-labelledby="exampleModalLabelDos" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabelDos">Agregar Publicación</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../../backend/controllers/admin/agregar-publicacion.php" method="POST">
                                <div class="mb-3">
                                    <label for="titulo-publicacion" class="col-form-label">Título:</label>
                                    <input type="text" class="form-control" id="titulo-publicacion" name="titulo">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion-publicacion" class="col-form-label">Descripción:</label>
                                    <textarea class="form-control" id="descripcion-publicacion" name="descripcion"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="imagen-publicacion" class="form-label">Insertar URL de la imagen</label>
                                    <input type="text" class="form-control" id="imagen-publicacion" name="imagen_ruta">
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" id="categoria-boton" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Categoría
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownCategorias">
                                        <?php if (!empty($categorias)): ?>
                                            <?php foreach ($categorias as $categoria): ?>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-id="<?= $categoria['id'] ?>">
                                                        <?= htmlspecialchars($categoria['nombre']) ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li><a class="dropdown-item" href="#">No hay categorías disponibles</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <input type="hidden" name="categoria_id" id="categoria_id" value="">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones de control -->
            <div id="botones-dos">
                <button type="button" class="btn btn-success" id="btnPublicaciones">Publicaciones</button>
                <button type="button" class="btn btn-danger" id="btnCategorias">Categorías</button>
            </div>

            <!-- Tabla de Publicaciones -->
            <div id="tablaPublicaciones" class="contenedor-tabla" style="display: none;">
                <table class="table">
                    <thead>
                        <tr>
                            <th id="cabezaE" scope="col">ID</th>
                            <th id="cabezaE" scope="col">Título</th>
                            <th id="cabezaDes" scope="col">Descripción</th>
                            <th id="cabezaE" scope="col">Fecha</th>
                            <th id="cabezaImg" scope="col">Imágenes</th>
                            <th id="cabezaE" scope="col">Categoría</th>
                            <th id="cabezaE" scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($publicaciones)): ?>
                            <?php foreach ($publicaciones as $publicacion): ?>
                                <tr>
                                    <th id="idE"><?= $publicacion['id'] ?></th>
                                    <td id="tituloE"><?= $publicacion['titulo'] ?></td>
                                    <td id="descripcionE"><?= $publicacion['descripcion'] ?></td>
                                    <td id="fechaE"><?= $publicacion['fecha'] ?></td>
                                    <td id="imagenesE"><?= $publicacion['imagen_ruta'] ?></td>
                                    <td id="categoriaE"><?= htmlspecialchars($publicacion['nombre_categoria']) ?></td>
                                    <td id="opcionesE">
                                        <div id="btnUpdate">
                                        <button type="button" id="bEditar" class="btn btn-secondary btn-editar-publicacion" 
        data-bs-toggle="modal" 
        data-bs-target="#exampleModalEditarPublicacion" 
        data-id="<?= $publicacion['id'] ?>" 
        data-titulo="<?= htmlspecialchars($publicacion['titulo']) ?>" 
        data-descripcion="<?= htmlspecialchars($publicacion['descripcion']) ?>" 
        data-fecha="<?= htmlspecialchars($publicacion['fecha']) ?>" 
        data-imagen="<?= htmlspecialchars($publicacion['imagen_ruta']) ?>" 
        data-categoria-id="<?= $publicacion['categoria_id'] ?>" 
        data-categoria-nombre="<?= htmlspecialchars($publicacion['nombre_categoria']) ?>">
    Editar
</button>
<button type="button" id="bEliminar" class="btn btn-secondary btn-eliminarP" data-bs-toggle="modal" data-bs-target="#exampleModalEliminarPub" data-idp="<?= $publicacion['id'] ?>" data-titulo="<?= htmlspecialchars($publicacion['titulo']) ?>">
    Eliminar
</button>                                            
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

            <!-- Tabla de Categorías -->
            <div id="tablaCategorias" class="contenedor-tabla" style="display: none;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($categorias)): ?>
                            <?php foreach ($categorias as $categoria): ?>
                                <tr>
                                    <td><?= $categoria['id'] ?></td>
                                    <td><?= htmlspecialchars($categoria['nombre']) ?></td>
                                    <td><?= htmlspecialchars($categoria['descripcion']) ?></td>
                                    <td>
                                    <button type="button" class="btn btn-secondary btn-editar" data-bs-toggle="modal" id="bEditar" data-bs-target="#exampleModalEditar"  data-id="<?= $categoria['id'] ?>" data-nombre="<?= htmlspecialchars($categoria['nombre']) ?>" data-descripcion="<?= htmlspecialchars($categoria['descripcion']) ?>">
                                      Editar
                                    </button>
                                        <button type="button" id="bEliminar" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#exampleModalEliminarCat" data-id="<?= $categoria['id'] ?>" data-nombre="<?= htmlspecialchars($categoria['nombre']) ?>">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">No hay categorías registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div id="texto-footer">
                &copy; 2025 Sebastián Solano. Todos los derechos reservados.
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        // Scripts para manejar la visualización de las tablas
        const btnPublicaciones = document.getElementById('btnPublicaciones');
        const btnCategorias = document.getElementById('btnCategorias');
        const tablaPublicaciones = document.getElementById('tablaPublicaciones');
        const tablaCategorias = document.getElementById('tablaCategorias');

        function mostrarTabla(tablaMostrar, tablaOcultar) {
            tablaMostrar.style.display = 'block';
            tablaOcultar.style.display = 'none';
        }

        // Mostrar la tabla de publicaciones por defecto
        mostrarTabla(tablaPublicaciones, tablaCategorias);

        btnPublicaciones.addEventListener('click', function() {
            mostrarTabla(tablaPublicaciones, tablaCategorias);
        });

        btnCategorias.addEventListener('click', function() {
            mostrarTabla(tablaCategorias, tablaPublicaciones);
        });

        // Script para manejar la selección de categorías en el dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    const categoriaId = this.getAttribute('data-id');
                    document.getElementById('categoria_id').value = categoriaId;
                    const dropdownToggle = document.querySelector('#categoria-boton');
                    dropdownToggle.textContent = this.textContent;
                });
            });
        });

        
        // Script para manejar la edición de categorías  
    document.addEventListener('DOMContentLoaded', function() {
    const btnEditar = document.querySelectorAll('.btn-editar');

    // Iterar sobre cada botón de editar
    btnEditar.forEach(btn => {
        btn.addEventListener('click', function() {
            // Obtener los datos del botón
            const id = btn.getAttribute('data-id');
            const nombre = btn.getAttribute('data-nombre');
            const descripcion = btn.getAttribute('data-descripcion');

            // Llenar los campos del modal con los datos de la categoría
            document.getElementById('categoria-id-editar').value = id;
            document.getElementById('categoria-nombre-editar').value = nombre;
            document.getElementById('categoria-descripcion-editar').value = descripcion;
        });
    });
});


        // Script para manejar la eliminación de categorías
        document.addEventListener('DOMContentLoaded', function () {
    const eliminarButtons = document.querySelectorAll('.btn-eliminar');

    eliminarButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const nombre = this.getAttribute('data-nombre');

            document.getElementById('categoria-id-eliminarC').value = id;
            document.getElementById('nombre-categoria-eliminar').textContent = nombre;
        });
    });

    // Manejar la confirmación de eliminación categoria
    document.getElementById('confirmar-eliminarC').addEventListener('click', function () {
        const id = document.getElementById('categoria-id-eliminarC').value;

        // Enviar una solicitud para eliminar la categoría
        fetch('../../backend/controllers/admin/eliminar-categoria.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'id=' + encodeURIComponent(id)
        })
        .then(response => response.text())
        .then(data => {
            // Recargar la página para actualizar la lista de categorías
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

    </script>


<!---Eliminar publicacion--->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const eliminarButtons = document.querySelectorAll('.btn-eliminarP');
    eliminarButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-idp');
            const titulo = this.getAttribute('data-titulo');

            console.log("ID de la publicación a eliminar:", id);


            document.getElementById('publicacion-id-eliminarP').value = id;
            document.getElementById('nombre-publicacion-eliminar').textContent = titulo;
        });
    });

    // Verificar si el botón de confirmar eliminación existe antes de agregar el evento
    const confirmarEliminarP = document.getElementById('confirmar-eliminarP');
    if (confirmarEliminarP) {
        confirmarEliminarP.addEventListener('click', function () {
            const id = document.getElementById('publicacion-id-eliminarP').value;

   
            console.log("ID de la publicación a eliminar (confirmación):", id);

            // Enviar una solicitud para eliminar la publicación
            fetch('../../backend/controllers/admin/eliminar-publicacion.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'id=' + encodeURIComponent(id)
            })
            .then(response => response.text())
            .then(data => {
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    } else {
        console.error("El botón 'confirmar-eliminarP' no existe en el DOM.");
    }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnEditarPublicacion = document.querySelectorAll('.btn-editar-publicacion');
    btnEditarPublicacion.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = btn.getAttribute('data-id');
            const titulo = btn.getAttribute('data-titulo');
            const descripcion = btn.getAttribute('data-descripcion');
            const fecha = btn.getAttribute('data-fecha');
            const imagen = btn.getAttribute('data-imagen');
            const categoriaId = btn.getAttribute('data-categoria-id');
            const categoriaNombre = btn.getAttribute('data-categoria-nombre');


            document.getElementById('publicacion-id-editar').value = id;
            document.getElementById('publicacion-titulo-editar').value = titulo;
            document.getElementById('publicacion-descripcion-editar').value = descripcion;
            document.getElementById('publicacion-fecha-editar').value = fecha;
            document.getElementById('publicacion-imagen-editar').value = imagen;

  
            const dropdownToggle = document.querySelector('#categoria-boton-editar');
            dropdownToggle.textContent = categoriaNombre; 
            document.getElementById('categoria-id-editarP').value = categoriaId; 
        });
    });

    // Manejar la selección de categorías en el dropdown
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            const categoriaId = this.getAttribute('data-id');
            const categoriaNombre = this.textContent;

            document.getElementById('categoria-id-editarP').value = categoriaId;
            document.getElementById('categoria-boton-editar').textContent = categoriaNombre;
            console.log("categoria_id:", document.getElementById('categoria-id-editarP').value);
        });
    });
});
</script>

<?php if (isset($_SESSION['mensaje_eliminar'])): ?>
    <script>
        alert("<?php echo $_SESSION['mensaje_eliminar']; ?>");
    </script>
    <?php unset($_SESSION['mensaje_eliminar']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['mensaje_editar_publicacion'])): ?>
    <script>
        alert("<?php echo $_SESSION['mensaje_editar_publicacion']; ?>");
    </script>
    <?php unset($_SESSION['mensaje_editar_publicacion']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_registro_publicacion'])): ?>
    <script>
        alert("<?php echo $_SESSION['error_registro_publicacion']; ?>");
    </script>
    <?php unset($_SESSION['error_registro_publicacion']); ?>
<?php endif; ?>



</body>
</html>
