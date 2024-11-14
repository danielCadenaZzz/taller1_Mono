<?php
require '../controllers/tareascontroller.php';
require '../models/db/tareas_db.php';
require '../models/entities/tarea.php';
require '../models/queries/tareasQueries.php';
require '../views/tareasView.php';

use App\views\TareasViews;

$tareasViews = new TareasViews();
$msg = $tareasViews->getMsgDeleteTarea($_GET['cod']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar tarea</title>
    <link rel="stylesheet" href="css/inicio.css">

</head>
<body>
    <header>
        <h1 class="estado">Eliminar</h1>
    </header>
    <section>
        <?php echo $msg;?>
        <br>
        <a href="inicio.php">Volver al inicio</a>
    </section>
</body>
</html>