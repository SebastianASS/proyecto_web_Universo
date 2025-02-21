<?php 
session_start(); // Inicia la sesión si no está iniciada
?>

<?php require_once '../../includes/conexion.php'; ?>
<?php require_once '../../includes/functions.php';?>
<?php $publicaciones = conseguirPublicacionesGeneral($db)?>
<?php $categorias = conseguirCategorias($db)?>

<?php if (!isset($_SESSION['usuario'])) {
      header('Location: ../../index.php');
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-user.inicio.css">
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
                 <li><a class="dropdown-item1" href="user.usuario.php">Perfil</a></li>
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
                
            </ol>
        </nav>

       
        <div id="contenedor-info">  <!-- Contenedor Formulario -->
<div id="contenedor-nav"> <!-- Contenedor Nav -->
            <nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" id="categoria-boton" data-bs-toggle="dropdown" aria-expanded="false">
            Categoria
          </a>
          <ul class="dropdown-menu">
            <?php if(!empty($categorias)):?>
              <?php  foreach($categorias as $categoria):?>
            <li>
              <a class="dropdown-item" href="#" data-idCat="<?= $categoria['id']?>">
                <?= htmlspecialchars($categoria['nombre']) ?>
              </a>
           </li>
            <?php endforeach; ?>
            <?php else: ?>
            <li><a class="dropdown-item" href="#">No hay categorías disponibles</a></li>
            <?php endif; ?>
          </ul>   
      </ul>
      <form class="d-flex" role="search" id="searchForm">
            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" id="searchQuery">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>
  </div>
</nav>
</div><!-- Contenedor Nav -->


<div class="cartas"> <!--Contenedor cartas-->
  <?php if(!empty($publicaciones)): ?>
    <?php foreach($publicaciones as $publicacion): ?>
      <div class="card" style="width: 17rem;">
        <img src="<?= $publicacion['imagen_ruta'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" id="titulo-cartas"><?= $publicacion['titulo'] ?></h5>
          <p class="card-text" id="texto-entrada"><?= $publicacion['descripcion'] ?></p>
          <button type="button" class="btn btn-primary btnVerMas" style="width: 70%;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $publicacion['id'] ?>" data-titulo="<?= $publicacion['titulo'] ?>" data-descripcion="<?= $publicacion['descripcion'] ?>" data-imagen="<?= $publicacion['imagen_ruta'] ?>">Ver más</button>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div><!--Contenedor cartas-->
         

</div><!-- Contenedor Formulario -->

        <!-- Footer -->
        <footer id="footer">
            <div id="texto-footer">
                &copy; 2025 Sebastián Solano. Todos los derechos reservados.
            </div>
        </footer>
        <!-- Footer -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles de la publicación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Carrusel -->
        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img id="modalImagen" src="" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!-- Fin del Carrusel -->

        <!-- Título y Descripción -->
        <div class="mb-3">
          <h3 id="tituloP"></h3>
          <p id="descripcionP"></p>
        </div>

        <!-- Comentarios -->
        <div id="comentarios">
    <!-- Los comentarios se cargarán aquí dinámicamente -->
</div>
<!-- Comentarios -->  

        <!-- Formulario para comentar -->
        <div class="mb-3">
          <form action="../../backend/controllers/user/comentario.php" method="POST">
           <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $_SESSION['usuario']['id'];?>">
           <input type="hidden" name="id_publicacion" id="id_publicacion" value="">
            <label for="message-text" class="col-form-label">Comentario:</label>
            <textarea class="form-control" id="message-text" name="comentario"></textarea>
            <button type="submit" class="btn btn-primary" id="btn-comentar">Comentar</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


    </div>

    <script>
 document.addEventListener('DOMContentLoaded', function() {
    const cartasContainer = document.querySelector('.cartas');

    // Función para actualizar el modal con la información de la publicación seleccionada
    function actualizarModal(publicacion) {
        document.getElementById('tituloP').innerText = publicacion.titulo;
        document.getElementById('descripcionP').innerText = publicacion.descripcion;
        document.getElementById('id_publicacion').value = publicacion.id;

        const carruselInner = document.querySelector('#carouselExampleIndicators .carousel-inner');
        carruselInner.innerHTML = `
            <div class="carousel-item active">
                <img src="${publicacion.imagen_ruta}" class="d-block w-100" alt="...">
            </div>
        `;

        // Cargar comentarios
        fetch(`../../backend/api/get_comentarios.php?id_publicacion=${publicacion.id}`)
            .then(response => response.json())
            .then(comentarios => {
                const comentariosContainer = document.getElementById('comentarios');
                comentariosContainer.innerHTML = ''; // Limpiar los comentarios anteriores

                if (comentarios.length > 0) {
                    comentarios.forEach(comentario => {
                        const comentarioDiv = document.createElement('div');
                        comentarioDiv.classList.add('comentario');
                        comentarioDiv.innerHTML = `
                            <h7 class="nombre-usuario">
                                ${comentario.nombre} ${comentario.apellidoUno}
                            </h7>
                            <p>${comentario.comentario}</p>
                        `;
                        comentariosContainer.appendChild(comentarioDiv);
                    });
                } else {
                    comentariosContainer.innerHTML = '<p>No hay comentarios para esta publicación.</p>';
                }
            })
            .catch(error => console.error('Error al obtener los comentarios:', error));
    }

    // Evento para los botones "Ver más"
    cartasContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('btnVerMas')) {
            const publicacion = {
                id: event.target.getAttribute('data-id'),
                titulo: event.target.getAttribute('data-titulo'),
                descripcion: event.target.getAttribute('data-descripcion'),
                imagen_ruta: event.target.getAttribute('data-imagen')
            };
            actualizarModal(publicacion);
        }
    });

    // Evento para filtrar por categoría
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            const categoriaId = this.getAttribute('data-idCat');

            fetch(`../../backend/api/get_categorias.php?categoria_id=${categoriaId}`)
                .then(response => response.json())
                .then(publicaciones => {
                    cartasContainer.innerHTML = ''; // Limpiar cartas 
                    if (publicaciones.length > 0) {
                        publicaciones.forEach(publicacion => {
                            const cartaHTML = `
                                <div class="card" style="width: 17rem;">
                                    <img src="${publicacion.imagen_ruta}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title" id="titulo-cartas">${publicacion.titulo}</h5>
                                        <p class="card-text" id="texto-entrada">${publicacion.descripcion}</p>
                                        <button type="button" class="btn btn-primary btnVerMas" style="width: 70%;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${publicacion.id}" data-titulo="${publicacion.titulo}" data-descripcion="${publicacion.descripcion}" data-imagen="${publicacion.imagen_ruta}">Ver más</button>
                                    </div>
                                </div>
                            `;
                            cartasContainer.innerHTML += cartaHTML;
                        });
                    } else {
                        cartasContainer.innerHTML = '<p>No hay publicaciones para esta categoría.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error al obtener las publicaciones:', error);
                    cartasContainer.innerHTML = '<p>Error al cargar las publicaciones.</p>';
                });
        });
    });
});

</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');
    const searchQuery = document.getElementById('searchQuery');
    const cartasContainer = document.querySelector('.cartas');

    // Evento para el formulario de búsqueda
    searchForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitamos que el formulario se envíe de manera tradicional
        const query = searchQuery.value.trim(); // Obtenemos y limpiamos la consulta

        console.log("Buscando:", query); // Depuración: verifica la consulta


        fetch(`../../backend/api/buscar_publicaciones.php?searchQuery=${encodeURIComponent(query)}`)
            .then(response => {
                console.log("Respuesta del servidor:", response);
                if (!response.ok) {
                    throw new Error('Error en la solicitud'); 
                }
                return response.text(); 
            })
            .then(text => {
                console.log("Texto de la respuesta:", text); 
                try {
                    const publicaciones = JSON.parse(text); 
                    console.log("Publicaciones encontradas:", publicaciones); 
                    cartasContainer.innerHTML = '';

                    if (publicaciones.length > 0) {
                       
                        publicaciones.forEach(publicacion => {
                            const cartaHTML = `
                                <div class="card" style="width: 17rem;">
                                    <img src="${publicacion.imagen_ruta}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title" id="titulo-cartas">${publicacion.titulo}</h5>
                                        <p class="card-text" id="texto-entrada">${publicacion.descripcion}</p>
                                        <button type="button" class="btn btn-primary btnVerMas" style="width: 70%;" 
                                                data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                                data-id="${publicacion.id}" 
                                                data-titulo="${publicacion.titulo}" 
                                                data-descripcion="${publicacion.descripcion}" 
                                                data-imagen="${publicacion.imagen_ruta}">
                                            Ver más
                                        </button>
                                    </div>
                                </div>
                            `;
                            cartasContainer.innerHTML += cartaHTML; 
                        });
                    } else {
                
                        cartasContainer.innerHTML = '<p>No se encontraron publicaciones.</p>';
                    }
                } catch (error) {
                    console.error('Error al parsear JSON:', error); 
                    cartasContainer.innerHTML = '<p>Error al cargar las publicaciones.</p>';
                }
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
                cartasContainer.innerHTML = '<p>Error al cargar las publicaciones.</p>';
            });
    });
});
</script>



    <script type="text/javascript" src="../../assets/jquery/jquery-3.7.1.js"></script>
    
</body>
</html>