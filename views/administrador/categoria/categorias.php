<?php
include '../../../config/conexion.php';

session_start();

if(!isset($_SESSION['idUsuario'])){

   
    echo'<script>alert("POR FAVOR INICIE SESIÓN CON SUS CREDENCIALES") </script>';
    echo'<script> window.location="../../../unirse.html"</script>';

  
     session_destroy();
     die();
  }

?>
<!DOCTYPE html>
<html lang="es">
	<head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Categorías</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"> </script>
		<script src="../../../assets/js/bootstrap.min.js" ></script>
        <script src="../../../package/dist/sweetalert2.all.min.js" ></script>
        <script src="../../../assets/js/sweetAlert.js"></script>
        <link rel="stylesheet" href="../../../package/dist/sweetalert2.min.css">

        <link rel="stylesheet" href="../../../assets/css/styleAdminn2.css">
        <link rel="stylesheet" href="../../../assets/css/categorias.css">

        
        

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
      <a href="../../../index.php">
        <div class="slidebar-menu" id="sidebar">
            <span  class='bx bxs-home' ></span><p>INICIO</p>
        </div>
      </a>  
       <a href="../../../index.php">
       <div class="slidebar-menu">
            <span class="fas fa-users"></span><p>Usuarios</p>
        </div>
       </a>
       <a href="../producto/productos.php">
        <div class="slidebar-menu">
            <span  class='bx bxs-shopping-bags'></span><p>Productos</p>
        </div>
       </a>
       <a href="categorias.php">
        <div class="slidebar-menu">
            <span  class="fas fa-clipboard-list"></span><p>Categorias</p>
        </div>
       </a>
       <a href="../../../adminPQR.php">
        <div class="slidebar-menu">
            <span class='bx bx-message-rounded-error' ></span><p>PQR</p>
        </div>
       </a>
       <a href="../../../agendamientoadmin.php">
        <div class="slidebar-menu">
            <span  class='bx bxs-map-pin'></span><p>Citas</p>
        </div>
       </a>
       <a href="../../../controllers/cerrar.php">
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
                    <h2>Categorías Activas</h2>
                    <!--<input type="text" class="busqueda" placeholder="Realizar busqueda &#128270">-->
                    <a href="../../../reportes/categorias/reporteExcel.php" class="btn">Generar reporte excel <i class='bx bxs-notepad' id="ai"></i></a>
                    <a href="../../../reportes/categorias/reportePdf.php" class="btn">Generar reporte pdf <i class='bx bxs-notepad' id="ai"></i></a>
                    <a id="btnAbrirModal" class="btn1">Agregar categoría<i class='bx bx-barcode-reader' id="ai"></i></a>
                    
                </div>
                 <div class="carticas">  
                     <?php  $quer="SELECT * FROM categoria WHERE estado='Si' ";
                        $resultado=mysqli_query($conexion,$quer);
                        while($traer=mysqli_fetch_array($resultado)){?>

                 
                            <div class="contenedorCategoria">
                                        <div class="cartaCategoria">
                                                <img  src="<?php echo $traer['imagenCategoria']?>" class="imgCategoria">
                                                        <div class="introCategoria">
                                                                <h1 class="h1Categoria"><?php echo $traer['nombreCategoria']?></h1>
                                                                <p class="pCategoria"><?php echo $traer['descripcionCategoria']?></p>
                                                                <div class="uform">   
                                                                <form method='POST' action='actCategorias.php?idCategoria=<?php echo $traer['idCategoria']?>'>
                                                                        <label class='content-input'>
                                                                            
                                                                            <input type='checkbox'  checked  name='estado' id='estado' value='Si'>
                                                                        
                                                                            <i></i>
                                                                            
                                                                        </label>
                                                                        <input type='submit' name='actualizar' value='&#9881'>
                                                                        
                                                                    
                                                                </form> 
                                                                </div>

                                                                <div class="pre">
                                                                <a class="compra" href="../../../controllers/categoriaUpdate.php?idCategoria=<?php echo $traer['idCategoria']?>"><i class='bx bx-info-circle' ></i></a>
                                                                <a class="compra2" onclick="fntDelCategoria(<?php echo $traer['idCategoria']?>)"><i class='bx bx-trash'></i></a>      
                                                                 </div>
                                                            </div>
                                        </div>
                                
                                    
                            </div>  
                    
                        <?php }?>

                </div>             
                    

                <div class="detail-foter">
            
                 <!-- <h4 class="mostrar">Mostrar</h4> 
                  <input type="number" class="numero"> 
                  <h4 class="mostrar1">registros</h4>
                  <a class="btn5"><i class='bx bx-chevrons-left' id="ia"></i></a><a class="btn6"><i class='bx bx-chevrons-right' id="ia" ></i></a>
                        -->
                </div>
            </div>
               
            <div class="card customer">
                <h2>Actividades administrativas</h2>
                <div class="customer-wrapper">

                    <img class="customer-image" src="https://picsum.photos/200/200?random=2">    
                    <div class="customer-name">
                    <h4>Usuarios</h4>
                    <p>Gestionar datos </p>
                    </div>
                    <p class="customer-date">Hoy</p>
                </div>    
          
                <div class="customer-wrapper">
                    <img class="customer-image" src="https://picsum.photos/200/200?random=3">
                    <div class="customer-name">
                    <h4>Productos</h4>
                    <p>Actualizar novedades del inventario </p>
                    </div>
                    <p class="customer-date">Hoy</p>
                </div>

                <div class="customer-wrapper">
                   <img class="customer-image" src="https://picsum.photos/200/200?random=4">   
                   <div class="customer-name">
                   <h4>Categorias</h4>
                   <p>Clasificar los productos</p>
                   </div>
                   <p class="customer-date">Hoy</p>
                </div>

                <div class="customer-wrapper">
                    <img class="customer-image" src="https://picsum.photos/200/200?random=5">
                    <div class="customer-name">
                    <h4>PQR</h4>
                    <p>Contestar peticiones de los usuarios</p>
                    </div>
                    <p class="customer-date">Hoy</p>
                </div>
            </div>



            <!--- CATEGORIAS INACTIVAS -->
            <div class="card detail1">
                <div class="detail1-header">
                    <h2>Categorías Inactivas</h2>
                        
                </div>
                 <div class="carticas">  
                     <?php  $quer="SELECT * FROM categoria WHERE estado='No' or estado='' ";
                        $resultado=mysqli_query($conexion,$quer);
                        while($traer=mysqli_fetch_array($resultado)){?>

                 
                            <div class="contenedorCategoria">
                                        <div class="cartaCategoria">
                                                <img class="imagens" src="<?php echo $traer['imagenCategoria']?>" class="imgCategoria">
                                                        <div class="introCategoria">
                                                                <h1 class="h1Categoria"><?php echo $traer['nombreCategoria']?></h1>
                                                                <p class="pCategoria"><?php echo $traer['descripcionCategoria']?></p>
                                                                <div class="uform">   
                                                                <form method='POST' action='actCategorias.php?idCategoria=<?php echo $traer['idCategoria']?>'>
                                                                        <label class='content-input'>
                                                                            
                                                                            <input type='checkbox'    name='estado' id='estado' value='Si'>
                                                                        
                                                                            <i></i>
                                                                            
                                                                        </label>
                                                                        <input type='submit' name='actualizar' value='&#9881'>
                                                                        
                                                                    
                                                                </form> 
                                                                </div>

                                                                <div class="pre">
                                                                <a class="compra" href="../../../controllers/categoriaUpdate.php?idCategoria=<?php echo $traer['idCategoria']?>"><i class='bx bx-info-circle' ></i></a>
                                                                <a class="compra2" onclick="fntDelCategoria(<?php echo $traer['idCategoria']?>)"><i class='bx bx-trash'></i></a>      
                                                                 </div>
                                                            </div>
                                        </div>
                                
                                    
                            </div>  
                    
                        <?php }?>

                </div>             
                    

             
            </div>          


    </main>   
                
    
    <dialog id="modal">

    <form action="../../../models/categoriaModel.php" method="POST">
                <h3>Registrar categoría</h3>
                <h1 class="h">Nombre</h1>
                <input type="text" placeholder="Registre el nombre de la categoría" name="nombre"  value="" class="box" required>
                 <h1 class="h">Descripción</h1>
                 <textarea type="text" placeholder="Registre la descripción de la categoría" name="descripcion" value="" class="box" required ></textarea>
                 <h1 class="h">Imagen de la categoría</h1>
                 <input type="file" placeholder="Imagen" name="imagen" value="" class="box" required>
                 <button id="btnCerrarModal" class="btn14">Cancelar</button>
                  <input type="submit" value="Registrar categoria" name="registrar" class="btn13">
      
                 
    </form>
</dialog>



    <script>

                const btnAbrirModal = document.querySelector("#btnAbrirModal");
                const btnCerrarModal = document.querySelector("#btnCerrarModal");
                const modal = document.querySelector("#modal");

                btnAbrirModal.addEventListener("click",()=>{

                    modal.showModal();
                });

                btnCerrarModal.addEventListener("click",()=>{
                    modal.close();
                });

    </script>
    

                                           
<!--<div id="modalAdd" class="modalu">

<form action="#" method="POST">
            <h3>Editar Producto</h3>
            <h1 class="h">Nombre</h1> <?php //echo ['idProducto']?>
            <input type="text" placeholder="Registre el nombre del producto" name="nombre"  value="<?php// echo $traer['nombreProducto'];?>" class="box" required>
            <h1 class="h">Descripción</h1>
            <input type="text" placeholder="Registre la descripción del producto" name="descripcion" value="<?php //echo $traer['descripcionProducto'];?>" class="box" required >
            <h1 class="h">Precio</h1>
            <input type="number" placeholder="Precio unitario" name="precio"  value="<?php// echo $traer['precioProducto'];?>" class="box" required>
            <h1 class="h">Imagen del producto</h1>
            <input type="file" placeholder="Imagen" name="imagen" value="<?php //echo $traer['imagenProducto'];?>" class="box" required>
            <button id="btnCerrarModal" class="btn14">Cancelar</button>
            <input type="submit" value="Registrar producto" name="Guardar" class="btn13">            
</form>
</div>-->


    <script>

    /*    const btnEditarModal = document.querySelector("#editarpr");
        const btnCerrarEditar = document.querySelector("#btnCerrarModal");
        const modal2 = document.querySelector("#productoUpdate");

        btnEditarModal.addEventListener("click",()=>{

            modal2.showModal();
        });

        btnCerrarEditar.addEventListener("click",()=>{
            modal2.close();
        });*/


        /*const modalAdd = document.querySelector('#modalAdd');

        const openModal = () =>{
            modalAdd.style.display='flex';
        }

        const closeModal = ()=>{
            modalAdd.style.display='none';
        }
*/
</script>

</body>


</html>