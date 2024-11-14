<?php
require '../controllers/tareascontroller.php';
require '../controllers/empleadocontroller.php';
require '../controllers/prioridadcontroller.php';
require '../controllers/estadocontroller.php';

require '../models/db/tareas_db.php';
require '../models/entities/tarea.php';
require '../models/entities/prioridad.php';
require '../models/entities/estado.php';
require '../models/entities/empleado.php';

require '../models/queries/tareasQueries.php';
require '../models/queries/empleadoQueries.php';
require '../models/queries/estadoQueries.php';

require '../views/tareasView.php';
require '../views/estadosView.php';
require '../views/empleadosView.php';
require '../views/prioridadesView.php';
require '../models/queries/prioridadQueries.php';

use App\views\TareasViews;
use App\views\PrioridadesViews;
use App\views\EmpleadosViews;
use App\views\EstadosViews;

$tareasView = new TareasViews();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar styling */
        #sidebar {
            width: 320px;
            background: #ffffff;
            padding: 20px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        #sidebar h2 {
            font-size: 20px;
            color: #4a90e2;
            margin-bottom: 20px;
            text-align: center;
        }

        #sidebar .campoFormulario {
            margin-bottom: 15px;
        }

        .textoEjem {
            font-size: 14px;
            color: #4b4b4b;
        }

        .inputFecha, .inputTexto, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f9fdf8;
        }

        .inputFecha:focus, .inputTexto:focus, select:focus {
            border-color: #4a90e2;
            outline: none;
        }

        /* Botón de formulario */
        .botonFormulario {
            text-align: center;
            margin-top: 20px;
        }

        .btnFormulario {
            padding: 8px 20px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btnFormulario:hover {
            background: #357abd;
        }

        /* Botón "Crear Tarea" en la parte superior */
        .crearTareaBtn {
            display: block;
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            background: #28a745;
            color: white;
            text-align: center;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }

        .crearTareaBtn:hover {
            background: #218838;
        }

        /* Main content */
        #mainContent {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .tabla {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .tabla th, .tabla td {
            padding: 12px;
            border-bottom: 1px solid #e0f2e9;
            text-align: center;
            font-size: 15px;
        }

        .tabla th {
            background: #4a90e2;
            color: white;
            font-weight: bold;
        }

        .tabla tr:nth-child(odd) {
            background-color: #f3fdf7;
        }

        .tabla tr:nth-child(even) {
            background-color: #eaf7ed;
        }

    </style>
</head>
<body>
    <!-- Sidebar con el botón de "Crear Tarea" y el formulario de filtros -->
    <div id="sidebar">
        <a href="TareaForm.php" class="crearTareaBtn">Crear Tarea</a>
        <h2>Filtrar Tareas</h2>
        <form action="#" method="get" id="formTareas">
            <div class="campoFormulario">
                <label for="fechainicio" class="textoEjem">Fecha de inicio</label>
                <input type="date" name="fechainicio" id="fechainicio" class="inputFecha">
            </div>
            <div class="campoFormulario">
                <label for="fechaFinalizacion" class="textoEjem">Fecha de fin</label>
                <input type="date" name="fechaFinalizacion" id="fechaFinalizacion" class="inputFecha">
            </div>
            <div class="campoFormulario">
                <label for="titulo" class="textoEjem">Título</label>
                <input type="text" name="titulo" id="titulo" class="inputTexto">
            </div>
            <div class="campoFormulario">
                <label for="descripcion" class="textoEjem">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="inputTexto">
            </div>
            <div class="campoFormulario">
                <label for="personaResponsable" class="textoEjem">Persona responsable</label>
                <?php echo (new EmpleadosViews())->getSelect(true); ?>
            </div>
            <div class="campoFormulario">
                <label for="estado" class="textoEjem">Estado</label>
                <?php echo (new EstadosViews())->getSelect(true); ?>
            </div>
            <div class="campoFormulario">
                <label for="prioridad" class="textoEjem">Prioridad</label>
                <?php echo (new PrioridadesViews())->getSelect(true); ?>
            </div>
            <div class="botonFormulario">
                <button type="submit" id="btnFiltrar" class="btnFormulario">Filtrar</button>
            </div>
        </form>
    </div>

    <!-- Contenido principal con la tabla de tareas -->
    <div id="mainContent">
        <?php echo $tareasView->getTable($_GET); ?>
    </div>
</body>
</html>
