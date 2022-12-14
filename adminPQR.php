<?php include './config/conexion.php'; 

session_start();

if(!isset($_SESSION['idUsuario'])){

   
    echo'<script>alert("POR FAVOR INICIE SESIÓN CON SUS CREDENCIALES") </script>';
    echo'<script> window.location="unirse.html"</script>';

  
     session_destroy();
     die();
  }




?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"> </script>

    <link rel="stylesheet" href="assets/css/styleAdminPQR.css">

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
       <a href="agendamientoAdmin.php">
        <div class="slidebar-menu">
            <span  class='bx bxs-map-pin'></span><p>Citas</p>
        </div>
       </a>
       <a href="controllers/cerrar.php">
        <div class="slidebar-menu">
            <span  class='bx bx-log-out-circle' ></span><p>Salir</p>
        </div>
       </a>
    </div>

    <main>
    <?php 
            $quer="SELECT COUNT(*) AS conteo FROM usuario";
            $resultado=mysqli_query($conexion,$quer);
            //$traer=mysqli_fetch_array($resultado);
            while($row = mysqli_fetch_assoc($resultado)){ 
        

        {?>
          
        <div class="dashboard-container">
            <div class="card total1">
                <div class="info">
                    <div class="info-detail">
                        <h3>Usuarios</h3>
                        <p>Registrados en el sistema</p>
                        <h2><?php echo $row['conteo'] ?><span> Usuarios</span></h2>
                    </div>
                    <div class="info-image">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
            <?php  }}?>


            <?php 
            
                    $quer="SELECT SUM(cantidad) AS conteo FROM producto";
                    $resultado=mysqli_query($conexion,$quer);
                    //$traer=mysqli_fetch_array($resultado);
                    while($row = mysqli_fetch_assoc($resultado)){ 
            
            
            {?>
            <div class="card total2">
                <div class="info">
                    <div class="info-detail">
                        <h3>Productos</h3>
                        <p>Con existencias en inventario</p>
                        <h2><?php echo $row['conteo']?><span> Productos</span></h2>
                    </div>
                    <div class="info-image1">
                        <i class='bx bxs-car'></i>
                    </div>
                </div>

            </div>

            <?php  }}?>
            <?php   
            
                $quer="SELECT COUNT(*) AS conteo FROM categoria";
                $resultado=mysqli_query($conexion,$quer);
                //$traer=mysqli_fetch_array($resultado);
                while($row = mysqli_fetch_assoc($resultado)){ 
            
        
            {?>
            <div class="card total3">
                <div class="info">
                    <div class="info-detail">
                        <h3>Categorias</h3>
                        <p>Clasificacion de productos</p>
                        <h2><?php echo $row['conteo']?><span> Categorias</span></h2>
                    </div>
                    <div class="info-image">
                        <i class='bx bx-barcode-reader'></i>
                    </div>
                </div>
            </div>

            <?php  }}?>

            <?php 
                    $quer="SELECT COUNT(*) AS conteo FROM pqr";
                    $resultado=mysqli_query($conexion,$quer);
                    //$traer=mysqli_fetch_array($resultado);
                    while($row = mysqli_fetch_assoc($resultado)){ 
            
            {?>
            <div class="card total4">
                <div class="info">
                    <div class="info-detail">
                        <h3>PQR</h3>
                        <p>Peticiones,quejas o reclamos</p>
                        <h2><?php echo $row['conteo']?><span> PQR</span></h2>
                    </div>
                    <div class="info-image1">
                        <i class='bx bxs-comment-detail'></i>
                    </div>
                </div>
            </div>
            
            <?php  }}?>


            <div class="card detail">
                <div class="detail-header">
                    <h2>Preguntas, quejas o reclamos</h2>
                </div>
                
                <table class="tableAdmin">
            <tr>
                <td id="encabezadoA">Nombre</td>
                <td id="encabezado">Apellido</td>
                <td id="encabezado">Telefono</td>
                <td id="encabezado">Correo</td>
                <td id="encabezado">Comentario</td>
                <td id="encabezadoB">Respuesta</td>  
                <td id="encabezadoC">Acciones</td>
            </tr>
            <br>
            <?php 

            $sql="SELECT * FROM pqr";
            $result=mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
            ?>    

            <tr>
                <td id="camposA"><?php echo $mostrar['nombreUsuario'] ?></td>
                <td id="campos"><?php echo $mostrar['apellidoUsuario'] ?></td>
                <td id="campos"><?php echo $mostrar['telefonoUsuario'] ?></td>
                <td id="campos"><?php echo $mostrar['correo'] ?></td>
                <td id="campos"><?php echo $mostrar['descripcionPQR'] ?></td>
                <td id="camposB"><a href="mailto: <?php echo $mostrar['correo'] ?>"><i class='bx bxs-message-rounded-dots' ></i></a></td>
                <td id="camposC"><a href="controllers/pqr.php?idPQR=<?php echo $mostrar['idPQR'] ?>"><i class='bx bxs-trash' id='icono2'></i></a></td>
            </tr>

            <?php } ?>

        </table>
    </main>

</body>
</html>