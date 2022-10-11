<?php

    class cita {

        public function inhabilitar($agendar){

            include "../config/conexion.php";
            $sql = "DELETE FROM agendar WHERE id = '$agendar'";
            mysqli_query($conexion,$sql);

            header('Location: ../agendamientoadmin.php');
    
        }

        public function editar($agendar){

            include "../config/conexion.php";
            $sql = "SELECT * FROM agendar WHERE id = '$agendar'";
            $resultado = $conexion->query($sql);

            return $resultado;

        }
        public function actualizar($start, $end, $time, $id){

            include "../config/conexion.php";
            $sql = "UPDATE agendar 
            SET start = '$start', end = '$end', time = '$time'
            WHERE id = '$id'"; 
            mysqli_query($conexion,$sql);

            header('Location: ../agendamientoadmin.php');            

        }



    }

?>