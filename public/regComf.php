<?php
require '../controllers/tareascontroller.php';
require '../models/db/tareas_db.php';
require '../models/entities/tarea.php';
require '../models/queries/tareasQueries.php';
require '../views/tareasView.php';

use App\views\TareasViews;

$tareaViews = new TareasViews();
$datosFormulario = $_POST;
$msg = empty($datosFormulario['cod'])
  ? $tareaViews->getMsgNewTarea($datosFormulario)
  : $tareaViews->getMsgUpdateTarea($datosFormulario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar acción</title>
    <link rel="stylesheet" href="css/inicio.css">

</head>
<body>
    <header>
        <h1 class="estado">Estado de acción</h1>
    </header>
    <section>
        <?php echo $msg;?>
        <br>
        <a href="inicio.php">Volver al inicio</a>
    </section>
</body>
</html>