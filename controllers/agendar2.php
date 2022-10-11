<?php

    include "../models/agendarModel2.php";
    $cita = new cita();

    $cita->inhabilitar($_GET['id']);

?>