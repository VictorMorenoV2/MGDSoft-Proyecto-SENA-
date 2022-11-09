<html>
    <head>
        <title>LLANTAS MORENO LOPEZ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="assets/css/styleU.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"> </script>
 
    
    </head>
    <body>    
        <body>
            <div class="container">
                <h1  class="titulo">RECORDAR CONTRASEÑA</h1>
                <hr width="100%">

                 <br>

                 <header class="header">
                    <div id="menu-btn" class="fas fa-bars"></div>
                    <nav class="navbar">
                    </nav>
                   <div class="ingreso">
                    
                    <form method="POST" action="mailer/mailReset.php">
                    <input class="recordar" type="email" name="correo" placeholder="Ingrese su correo electronico">


                    <div id="sign">
                        <button name="enviar" class="btn">Enviar correo
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
        
    

        </body>
        <script src="./assets/js/script.js"></script>
        
    </head>