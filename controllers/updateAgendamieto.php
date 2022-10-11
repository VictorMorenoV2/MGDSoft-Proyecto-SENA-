<?php 

    include "../models/agendarModel2.php";

    $crud = new cita();
    $crud->actualizar($_GET['start'], $_GET['end'], $_GET['time'], $_GET['id'])

?>