<link rel="stylesheet" href="../assets/css/styleEditAgendamiento.css">
<?php

    include "../models/agendarModel2.php";
    $crud = new cita();

    $resultado = $crud->editar($_GET['id']);

    while($row=$resultado->fetch_assoc()){

?>
    <div class="contenedorFormulario">

        <h1>EDITAR CITA</h1>
            <form action="updateAgendamieto.php" method="GET">
                <input type="hidden" value = "<?php echo $row['id'] ?>" name="id"><br>
                <label>Hora de inicio</label><br><input type="text" value = "<?php echo $row['start'] ?>" name="start" id="campo"><br>
                <label>Hora de fin</label><br><input type="text" value = "<?php echo $row['end'] ?>" name="end" id="campo"><br>
                <label>Tiempo</label><br><input type="text" value = "<?php echo $row['time'] ?>" name="time" id="campo"><br>
                <input type="submit" value = 'enviar' id="send">
            </form>

        <?php } ?>

    </div>