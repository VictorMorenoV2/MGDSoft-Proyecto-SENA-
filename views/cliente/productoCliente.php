<?php
include '../../config/conexion.php';

session_start();

if(!isset($_SESSION['idUsuario'])){

   
    echo'<script>alert("POR FAVOR INICIE SESIÓN CON SUS CREDENCIALES") </script>';
    echo'<script> window.location="../../unirse.html"</script>';

  
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
    <title>Cliente</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"> </script>
    <script src="../../assets/js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/perfilCliente.css">
    <link href='../../assets/css/main.css' rel='stylesheet' />
    <script src='../../assets/js/main.js'></script>
    <script src='../../assets/js/es.js'></script>
    <script src='../../assets/js/moment.js'></script>
    <script src='../../assets/js/moment.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   

</head>
<body>
    <nav class="navbar">
        <h4>Llantas Moreno Lopez</h4>
        <div class="profile">
            <span class="fas fa-search"></span>
            <img class="profile-image" src="https://picsum.photos/200/200?random=1">
            <p class="profile-name">Cliente</p>
        </div>
    </nav>

    <input type="checkbox" id="toggle">
    <label class="side-toggle" for="toggle"><span class="fas fa-bars"></span></label>

    <div class="slidebar">
      <a href="infoCliente.php">
        <div class="slidebar-menu" id="sidebar">
            <span  class='bx bxs-home' ></span><p>INICIO</p>
        </div>
      </a>
      <a href="infoCliente.php">
       <div class="slidebar-menu">
            <span class='bx bxs-user-detail'></span><p>Información</p>
      </div>
        
       <a href="cliente.php">
       <div class="slidebar-menu">
            <span class="bx bxs-map-pin"></span><p>Citas</p>
        </div>
       </a>
       <a href="productoCliente.php">
       <div class="slidebar-menu">
            <span class="bx bxl-shopify"></span><p>Productos</p>
        </div>
       </a>
       <a href="../../contacto.html">
        <div class="slidebar-menu">
            <span class='bx bx-message-rounded-error' ></span><p>PQR</p>
        </div>
       </a>
      
       <a href="../../controllers/cerrar.php">
        <div class="slidebar-menu">
            <span  class='bx bx-log-out-circle' ></span><p>Salir</p>
        </div>
       </a>
    </div>
   

    <main>
          <!--  <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                    <div class="card shadow-sm">
                        <img src="../../assets/img/camion.jpg">
                        <div class="card-body">
                       <center> <p class="card-title">Prueba</p></center>
                        <p class="card-text">Cantidad: 12</p>
                        <p class="card-text">$600.000</p>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, nesciunt.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">    
                            <button href="" class="btn btn-primary" id="ag">Agregar</button>     
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>-->
            <section class="carta">
                <h3>Productos</h3>
                <input id="searchbar" onkeyup="search_animal()" type="text" name="search" class="busqueda" placeholder="Realizar busqueda &#128270">
                  
                <hr>
                    <div class="row">
            <?php  $quer="SELECT * FROM producto";
                    $resultado=mysqli_query($conexion,$quer);
                    while($traer=mysqli_fetch_array($resultado)){?>
                <div class="col-3 g" id="cor">
                <div class="card">
                    <img class="card-img-top" id="hola" src="data:image/jpg;base64, <?php echo base64_encode($traer['imagenProducto']) ?>"  height="250px" width="200px" >
                    <div class="card-body">
                    <h4> <?php echo $traer ['nombreProducto']?> </h4>     
                    <h5 class="card-title">$<?php echo $traer ['precioProducto']?></h5>
                    <h5 class="card-title">Cantidad: <?php echo $traer ['cantidad']?></h5>
                    <p class="card-text"><?php echo $traer ['descripcionProducto']?></p>
                    <!-- <a href="carro.php?id=<?php// echo $traer['idProducto']?>" value="agregar" class="btn btn-danger" name="carrito" id="ag">Agregar</a> -->
                
                    </div>
                </div>  
            </div>

            <?php }?>
            </div>
        </section>
    </main>
    
    <script>
                
        function search_animal() {
            let input = document.getElementById('searchbar').value;
            input=input.toLowerCase();
            let x = document.getElementsByClassName('g');
            
            for (i = 0; i < x.length; i++) { 
                if (!x[i].innerHTML.toLowerCase().includes(input)) {
                    x[i].style.color="black";
                    x[i].style.display="none";
                }
                else {
                    x[i].style.color="blue"; 
                    x[i].style.display="block";               
                }
            }
        }
</script>
    </script>
</body>
</html>