<?php
require '../controllers/tareascontroller.php';
require '../controllers/prioridadcontroller.php';
require '../controllers/estadocontroller.php';
require '../controllers/empleadocontroller.php';

require '../models/db/tareas_db.php';
require '../models/entities/tarea.php';
require '../models/entities/prioridad.php';
require '../models/entities/estado.php';
require '../models/entities/empleado.php';
require '../models/queries/tareasQueries.php';
require '../models/queries/prioridadQueries.php';
require '../models/queries/estadoQueries.php';
require '../models/queries/empleadoQueries.php';

require '../views/tareasView.php';
require '../views/prioridadesView.php';
require '../views/estadosView.php';
require '../views/empleadosView.php';

use App\views\TareasViews;

$tareasViews = new TareasViews();
$title = empty($_GET['cod']) ? 'Registrar Tarea' : 'Modificar Tarea';
$form = $tareasViews->getFormTarea($_GET);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Tareas</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #e8f7f2; /* Fondo suave verde claro */
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #333;
        }

        header {
            width: 100%;
            text-align: center;
            padding: 20px;
            background: linear-gradient(90deg, #4caf50, #81c784); /* Degradado verde */
            color: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 24px;
            font-weight: bold;
        }

        section {
            width: 90%;
            max-width: 600px;
            margin-top: 20px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f1fdf6; /* Fondo verde muy claro */
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #66bb6a; /* Verde más fuerte al hacer foco */
            background-color: #e8f5e9; /* Verde muy suave en foco */
        }

        /* Estilo para el botón */
        .btnFormulario {
            padding: 12px;
            background-color: #66bb6a; /* Verde medio */
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
            width: 100%;
            max-width: 150px;
            margin: 0 auto;
        }

        .btnFormulario:hover {
            background-color: #388e3c; /* Verde más oscuro al pasar el ratón */
        }

        .fieldGroup {
            margin-bottom: 15px;
        }

        .instructions {
            font-size: 13px;
            color: #777;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1><?php echo $title; ?></h1>
    </header>
    <section>
        <?php echo $form; ?>
    </section>
</body>
</html>
