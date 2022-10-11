<?php

    include "../models/pqrModel.php";
    $pqr = new pqr();

    $pqr->inhabilitar($_GET['idPQR']);
?>