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
        <?php 
            $id=$_SESSION['idUsuario'];
            $query="SELECT * FROM usuario WHERE idUsuario=$id";
            $resultado=mysqli_query($conexion,$query);

            if(mysqli_num_rows($resultado)==1){
                $row=mysqli_fetch_array($resultado);
                $nombre= $row['nombre'];
                $apellido= $row['apellido'];
                $identificacion= $row['identificacion'];
                $telefono= $row['telefono'];
                $correo= $row['correoElectronico'];
                $direccion= $row['direccionUsuario'];
                $contrasena= $row['contrasena'];    
                $imagen=$row['imagen'];
                
             }else{
                echo "<h1>ERROR</h1>";
             }
             if(isset($_POST['guardar'])){

                $id=$_SESSION['idUsuario'];
                $nom=$_POST['nombre'];
                $ape=$_POST['apellido'];
                $iden=$_POST['identificacion'];
                $tele=$_POST['telefono'];
                $corre=$_POST['correo'];
                $direc=$_POST['direccion'];
                $contr=$_POST['contrasena'];
                $contr=hash('sha256',$contr);
                
                $img = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


                $query=" UPDATE usuario SET nombre = '$nom', apellido = '$ape', identificacion = '$iden', telefono = '$tele', correoElectronico = '$corre', direccionUsuario = '$direc', contrasena = '$contr', imagen = '$img' WHERE idUsuario=$id ";
           
                mysqli_query($conexion,$query);
                echo'
                <script> 
                alert("Usuario actualizado exitosamente");
                window.location="infoCliente.php";
                </script>';

                
             
            }

        ?>



      <div class="container">
            <div class="row">
                <form method="post" id="perfil"  enctype="multipart/form-data">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
                        <div class="panel panel-success"><br>
                            <h2 class="panel-title"><center><font size="5"><i class='glyphicon glyphicon-user'></i>BIENVENIDO DE NUEVO</font></center></h2>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 " align="center"> 
                                            <div  class="imgPerfil" id="load_img">
                                                <img class="img-responsive" src="data:image/jpg;base64, <?php echo base64_encode($imagen) ?>" alt="Logo">                                               
                                            </div>
                                                <br>				
                                                    <div class="row">
                                                        <div class="  col-0-12 col-md-12">
                                                            <div class="form-group">
                                                            <input class='filestyle' type="file" name="imagen" >
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                            </div>
                                                                     <div class="col-mx-12 col-md-9 col-lg-9 "> 
                                                                                    <table class="table table-condensed">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td class='col-md-3'>Nombres</td>
                                                                                        <td><input type="text" class="form-control input-sm" name="nombre" value="<?php echo $nombre?>" required></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Apellidos</td>
                                                                                        <td><input type="text" class="form-control input-sm" name="apellido" value="<?php echo $apellido?>" required></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Número de identificación</td>
                                                                                        <td><input type="number" class="form-control input-sm" name="identificacion" value="<?php echo $identificacion?>" ></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Número de celular</td>
                                                                                        <td><input type="number" class="form-control input-sm" required name="telefono" value="<?php echo $telefono?>"></td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td>Correo electronico</td>
                                                                                        <td><input type="email" class="form-control input-sm" required name="correo" value="<?php echo $correo?>"></td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td>Dirección de residencia</td>
                                                                                        <td><input type="text" class="form-control input-sm" name="direccion" value="<?php echo $direccion?>" required></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Contraseña</td>
                                                                                        <td><input type="password" class="form-control input-sm" name="contrasena" value="<?php echo $contrasena?>" required></td>
                                                                                    </tr>
                                                                                    
                                                                                    </tbody>
                                                                                </table>
                                                                                <button type="submit" name="guardar" class="btn btn-sm btn-success"><i class='bx bxs-wrench'></i> Actualizar Información</button>
                                                                                <button type="submit" class="btn btn-sm btn-danger"><i class='bx bx-trash' ></i>Eliminar Cuenta</button>
                                                                        </div>
                                                             <div class='col-md-12' id="resultados_ajax"></div>
                                            </div>
                                        </div>
                                            <div class="panel-footer text-center">
                                                
                                                
                                            
                                                
                                                
                                                </div>
                                        
                                    </div>
                                    </div>
                </form>                    
        </div>
    </main>
    
</body>
</html>