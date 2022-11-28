<?php


session_start();
include '../../config/conexion.php';



if(isset($_SESSION['carrito'])){

  if(isset($_GET['id'])){

      $arreglocarrito=$_SESSION['carrito'];
      $encontro=false;
      $numero=0;
      for($i=0; $i<count($arreglocarrito);$i++){

          if($arreglocarrito[$i]['id'] == $_GET['id']){
            $encontro=true;
            $numero=$i;

          }
      }
      if ($encontro==true) {
            $arreglocarrito[$numero]['cantidad']=$arreglocarrito[$numero]['cantidad']+1;
            $_SESSION['carrito']=$arreglocarrito; 
       }else{
            //no estaba el registro
            $nombre="";
            $precio="";
            $descripcion="";
            $imagen="";
            $res=$conexion->query('SELECT * FROM producto WHERE idProducto='.$_GET['id']);
            $traer=mysqli_fetch_row($res);
            $nombre=$traer[1];
            $precio=$traer[2];
            $descripcion=$traer[3];
            $imagen=$traer[4];
        
            $arreglonuevo = array(
                
                'id' => $_GET['id'],
                'nombre'=> $nombre,
                'precio'=> $precio,
                'descripcion'=> $descripcion,
                'imagen'=> $imagen,
                'cantidad'=>1,
             );

             array_push($arreglocarrito, $arreglonuevo);
             $_SESSION['carrito']=$arreglocarrito;
       }
  }

}else{

  if(isset($_GET['id'])){

    $nombre="";
    $precio="";
    $descripcion="";
    $imagen="";
    $res=$conexion->query('SELECT * FROM producto WHERE idProducto='.$_GET['id']);
    $traer=mysqli_fetch_row($res);
    $nombre=$traer[1];
    $precio=$traer[2];
    $descripcion=$traer[3];
    $imagen=$traer[4];

    $arreglocarrito[] = array(
        
        'id' =>$_GET['id'],
        'nombre'=>$nombre,
        'precio'=>$precio,
        'descripcion'=>$descripcion,
        'imagen'=>$imagen,
        'cantidad'=>1,
     );
  
     $_SESSION['carrito']=$arreglocarrito;
 }


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

    <div class="col-md-8">
<table  class="table table-dark table-hover" width="500px" >
       
       <thead >
         <tr >
           <th>IMAGEN</th>
           <th>NOMBRE</th>
           <th>DESCRIPCIÓN</th>
           <th>CANTIDAD</th>
           <th>PRECIO</th>
           <th>SUB TOTAL</th>
           <th>ELIMINAR</th>
         </tr>
       </thead>   
       <tbody>
            <?php
            $total=0;
            $recargo=5000;
            if(isset($_SESSION['carrito'])){
                $arreglocarrito=$_SESSION['carrito'];

                for($i=0; $i<count($arreglocarrito); $i++){
                  $total=$total+($arreglocarrito[$i]['precio']* $arreglocarrito[$i]['cantidad']);
            ?>
                  <tr>
                   <td><img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($arreglocarrito[$i]['imagenProducto']) ?>"  height="100px"> </td>
                   <td><?php  echo $arreglocarrito[$i]['nombre'];?></td>
                   <td><?php echo $arreglocarrito[$i]['descripcion'];?></td>
                  <td>
                    <div  class="input-goup mb-3" style="max width: 50px;"> 
                        <input type="number" width="50px" class="form-control text-center txtCantidad"  data-precio="<?php echo $arreglocarrito[$i]['precio'];?>" data-id="<?php echo $arreglocarrito[$i]['id'];?>" value="<?php echo $arreglocarrito[$i]['cantidad'];?>" placeholder="" arial-label="Example text with button addon" aria-describedby="button-addon1">
    
                  </div>                  
                  </td>
  
                   <td>$<?php echo $arreglocarrito[$i]['precio'];?></td>
                   <td class="cant<?php echo $arreglocarrito[$i]['id'];?>">$<?php echo $arreglocarrito[$i]['precio']* $arreglocarrito[$i]['cantidad']; ?></td>
                   <td><a href="#" class="btn btn-danger btnEliminar" data-id="<?php echo $arreglocarrito[$i]['id'];?>">X</a></td>
                  </tr>
                
             <?php }}?>
       </tbody>  
    </table>
</div>

    
    
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