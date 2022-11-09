<?php 
    include "../config/conexion.php";
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Token</title>
    <link href="../assets/css/styleU.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"> </script>
    <style>
        .titulo{
            transform: translateX(90px);
        }
        button{
            transform: translateX(30px)
        }
    </style>
</head>
<body>
  
            <div class="container">
                <h1  class="titulo">CONFIRMAR CAMBIO</h1>
                <hr width="100%">

                 <br>

                 <header class="header">
                    <div id="menu-btn" class="fas fa-bars"></div>
                    <nav class="navbar">
                    </nav>
                   <div class="ingreso">
                    
                    <form method="POST" action="token.php">

                    <input class="recordar" type="email" name="email" placeholder="Ingrese el correo">
                    <input class="recordar" type="number" name="token" placeholder="Ingrese el token que recibió">
                    <input class="recordar" type="password" name="contrasena" placeholder="Ingrese la contraseña nueva">

                    <div id="sign">
                        <button name="enviar" class="btn">Verificar
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                            <span id="span4"></span>
                        </button>
                    </div>
                </form>
                <a href="index.html" id="abcd">
                        <button class="btn">Cancelar
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                            <span id="span4"></span>
                        </button>
                    </a>
                </div>
                </header>
        
    

        
        <script src="../assets/js/script.js"></script>



</body>
</html>