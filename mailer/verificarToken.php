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
                    <input class="recordar" type="password" id="password" name="contrasena" placeholder="Ingrese la contraseña nueva">

                    <div id="sign">
                        <button name="enviar" id="confirmar" class="btn">Verificar
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                            <span id="span4"></span>
                        </button>
                    </div>
                </form>
                <a href="../index.html" id="abcd">
                        <button  class="btn">Cancelar
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                            <span id="span4"></span>
                        </button>
                    </a>
                </div>
                </header>
        
    

        
        <script src="../assets/js/script.js"></script>
        <script>
            
            let btn = document.getElementById("confirmar");
            btn.addEventListener("click", function(e){ 

                    //function validar(){

                        var contrasena, expresion;
                        contrasena=document.getElementById("password").value;
                        var caracteres=0;
                        var errores=0;
                        expresion = /\w/;/// a-z // 0 9

                        if(contrasena.length<7){
                            alert("La contraseña debe tener mas de 7 caracteres");
                            errores=errores+1;
                            e.preventDefault();
                        // return true;
                        }
                        //if(!expresion.test(contrasena)){
                        if(!contrasena.indexOf("*")){///victor*moreno*
                            alert("Contraseña invalida, recuerde que debe tener una longitud de 8 letras o numeros");
                        
                            errores=errores+1;
                            e.preventDefault();
                           
                        }else if(errores=0){
                            alert("La contraseña se creo con exito y todos los campos estan correctos");
                            return true;
                        }
                

               /*// if(!contrasena.equals(contrasena.toUpperCase())){
                //    alert("La contraseña debe tener 1 letra minuscula");
                //}
                //hola=alert("la contraseña tiene"+caracteres);
                //return hola;
                if(contrasena == contrasena.toUpperCase()){
                    errores=errores+1;
                }
                if(contrasena == contrasena.toLowwerCase()){
                    errores=errores+1;
                }
                if(errores>1){
                    alert("La contraseña es incorrecta");
                    return true;
                }*/
            //}
        }); 


        </script>


</body>
</html>