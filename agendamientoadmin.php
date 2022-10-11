<?php include "config/conexion.php"; ?>
<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"> </script>
    <link rel="stylesheet" href="assets/css/agendamientoadmin.css">
    <title>Administrador LML</title>
</head>
<body>
    
    <nav class="navbar">
        <h4>Llantas Moreno Lopez</h4>
        <div class="profile">
            <span class="fas fa-search"></span>
            <img class="profile-image" src="https://picsum.photos/200/200?random=1">
            <p class="profile-name">Administrador</p>
        </div>
    </nav>

    <input type="checkbox" id="toggle">
    <label class="side-toggle" for="toggle"><span class="fas fa-bars"></span></label>

    <div class="slidebar">
      <a href="index.php">
        <div class="slidebar-menu" id="sidebar">
            <span  class='bx bxs-home' ></span><p>INICIO</p>
        </div>
      </a>  
       <a href="index.php">
       <div class="slidebar-menu">
            <span class="fas fa-users"></span><p>Usuarios</p>
        </div>
       </a>
       <a href="views/administrador/producto/productos.php">
        <div class="slidebar-menu">
            <span  class='bx bxs-shopping-bags'></span><p>Productos</p>
        </div>
       </a>
       <a href="views/administrador/categoria/categorias.php">
        <div class="slidebar-menu">
            <span  class="fas fa-clipboard-list"></span><p>Categorias</p>
        </div>
       </a>
       <a href="adminPQR.php">
        <div class="slidebar-menu">
            <span class='bx bx-message-rounded-error' ></span><p>PQR</p>
        </div>
       </a>
       <a href="agendamientoadmin.php">
        <div class="slidebar-menu">
            <span  class='bx bxs-map-pin'></span><p>Citas</p>
        </div>
       </a>
       <a href="index.html">
        <div class="slidebar-menu">
            <span  class='bx bx-log-out-circle' ></span><p>Salir</p>
        </div>
       </a>
    </div>

    <main>
    <div class="dashboard-container">
            <div class="card total1">
                <div class="info">
                    <div class="info-detail">
                        <h3>Usuarios</h3>
                        <p>Registrados en el sistema</p>
                        <h2>50<span> Usuarios</span></h2>
                    </div>
                    <div class="info-image">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="card total2">
                <div class="info">
                    <div class="info-detail">
                        <h3>Productos</h3>
                        <p>Con existencias en inventario</p>
                        <h2>20<span> Productos</span></h2>
                    </div>
                    <div class="info-image1">
                        <i class='bx bxs-car'></i>
                    </div>
                </div>

            </div>
            <div class="card total3">
                <div class="info">
                    <div class="info-detail">
                        <h3>Categorias</h3>
                        <p>Clasificacion de productos</p>
                        <h2>8<span> Categorias</span></h2>
                    </div>
                    <div class="info-image">
                        <i class='bx bx-barcode-reader'></i>
                    </div>
                </div>
            </div>
            <div class="card total4">
                <div class="info">
                    <div class="info-detail">
                        <h3>PQR</h3>
                        <p>Peticiones,quejas o reclamos</p>
                        <h2>2<span> PQR</span></h2>
                    </div>
                    <div class="info-image1">
                        <i class='bx bxs-comment-detail'></i>
                    </div>
                </div>
            </div>

    <div class="card detail">
                <div class="detail-header">
                    <h2>Agendamientos registrados</h2>
                </div>
                <table class="tableAdmin">
   
   <tr>
        <td id="encabezadoA" >Usuario</td>
        <td id="encabezadoT" >Titulo</td>
        <td id="encabezadoD" >Descripcion</td>
        <td id="encabezado" >Inicio</td>
        <td id="encabezado" >Fin</td>
        <td id="encabezado" >Tiempo</td>
        <td id="encabezadoB" >Acciones</td>
    </tr>
    <?php 
    $sql="SELECT u.idUsuario, a.id as idA, u.nombre, a.title, a.descripcion, a.start, a.end, a.time from agendar a inner join usuario u on u.idUsuario = a.idUsuario"; 
    $resultado= mysqli_query($conexion,$sql);
    while ($mostrar = mysqli_fetch_array ($resultado)) {?>
    <tr>
        <td id="camposA"><?php echo $mostrar["nombre"]?></td>
        <td id="camposT"><?php echo $mostrar["title"]?></Atd>
        <td id="camposD"><?php echo $mostrar["descripcion"]?></td>
        <td id="campos"><?php echo $mostrar["start"]?></td>
        <td id="campos"><?php echo $mostrar["end"]?></td>
        <td id="campos"><?php echo $mostrar["time"]?></td>
        <td id="camposB"><a href="controllers/editaragendamiento.php?id=<?php echo $mostrar['idA'] ?>"><i class='bx bxs-user-detail' id='icono1'></i></a>
            <a href="controllers/agendar2.php?id=<?php echo $mostrar['idA'] ?>"><i class='bx bxs-trash' id='icono2'></i></a></td>

    </tr>
    <?php } ?>
   </table>
            </div>
        

    </main>

</body>
</html>