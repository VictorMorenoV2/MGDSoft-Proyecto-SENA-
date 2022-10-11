<?php 

    class pqr {

        public function inhabilitar($id){

            include "../config/conexion.php";
            $sql = "DELETE FROM pqr WHERE idPQR = '$id'";
            mysqli_query($conexion,$sql);

            header('Location: ../adminPQR.php');
        
        }

    }
    
?>