<?php
namespace App\models\entities;

use App\models\db\TareasDb;
use App\models\queries\TareasQueries;

class Tarea {
    private $id;
    private $titulo;
    private $descripcion;
    private $fechaEstimadaFinalizacion;
    private $fechaFinalizacion;
    private $creadorTarea;
    private $observaciones;
    private $idEmpleado;
    private $idEstado;
    private $idPrioridad;
    private $created_at;
    private $updated_at;
    private $model;

    private $prioridad; /// objeto Prioridad
    private $estado; /// objeto Estado
    private $empleado; /// objeto Empleado



    function set($prop, $value) {
        $this->{$prop} = $value;
    }

    function get($prop) {
        return $this->{$prop};
    }

    static function all() {
        $sql = TareasQueries::selectAll();
        $db = new TareasDb();
        $result = $db->query($sql);
        $tareas = [];
        while ($row = $result->fetch_assoc()) {
            $tarea = new Tarea();

            $prioridad = new Prioridad();
            $prioridad->set('id', $row['idPrioridad']);
            $prioridad->set('nombre', $row['Prioridad']);

            $estado = new Estado();
            $estado->set('id', $row['idEstado']);
            $estado->set('nombre', $row['Estado']);

            $empleado = new Empleado();
            $empleado->set('id', $row['idEmpleado']);
            $empleado->set('nombre', $row['Empleado']);

            $tarea->set('id', $row['id']);
            $tarea->set('titulo', $row['titulo']);
            $tarea->set('descripcion', $row['descripcion']);
            $tarea->set('fechaEstimadaFinalizacion', $row['fechaEstimadaFinalizacion']);
            $tarea->set('fechaFinalizacion', $row['fechaFinalizacion']);
            $tarea->set('creadorTarea', $row['creadorTarea']);
            $tarea->set('observaciones', $row['observaciones']);
            $tarea->set('idEmpleado', $row['idEmpleado']);
            $tarea->set('empleado', $empleado);
            $tarea->set('idEstado', $row['idEstado']);
            $tarea->set('estado', $estado);
            $tarea->set('idPrioridad', $row['idPrioridad']);
            $tarea->set('prioridad', $prioridad);
            $tarea->set('created_at', $row['created_at']);
            $tarea->set('updated_at', $row['updated_at']);
            array_push($tareas, $tarea);
        }
        $db->close();
        return $tareas;
    }
    static function filtro($filtro) {
        $sql = TareasQueries::filtro($filtro);
        $db = new TareasDb();
        $result = $db->query($sql);
        $tareas = [];
        while ($row = $result->fetch_assoc()) {
            $tarea = new Tarea();
            $prioridad = new Prioridad();
            $prioridad->set('id', $row['idPrioridad']);
            $prioridad->set('nombre', $row['Prioridad']);

            $estado = new Estado();
            $estado->set('id', $row['idEstado']);
            $estado->set('nombre', $row['Estado']);

            $empleado = new Empleado();
            $empleado->set('id', $row['idEmpleado']);
            $empleado->set('nombre', $row['Empleado']);
            
            $tarea->set('id', $row['id']);
            $tarea->set('titulo', $row['titulo']);
            $tarea->set('descripcion', $row['descripcion']);
            $tarea->set('fechaEstimadaFinalizacion', $row['fechaEstimadaFinalizacion']);
            $tarea->set('fechaFinalizacion', $row['fechaFinalizacion']);
            $tarea->set('creadorTarea', $row['creadorTarea']);
            $tarea->set('observaciones', $row['observaciones']);
            $tarea->set('idEmpleado', $row['idEmpleado']);
            $tarea->set('empleado', $empleado);
            $tarea->set('idEstado', $row['idEstado']);
            $tarea->set('estado', $estado);
            $tarea->set('idPrioridad', $row['idPrioridad']);
            $tarea->set('prioridad', $prioridad);
            $tarea->set('created_at', $row['created_at']);
            $tarea->set('updated_at', $row['updated_at']);
            array_push($tareas, $tarea);
        }
        $db->close();
        return $tareas;
    }

    static function find($id) {
        $sql = TareasQueries::whereId($id);
        $db = new TareasDb();
        $result = $db->query($sql);
        $tarea = null;
        while ($row = $result->fetch_assoc()) {
            $tarea = new Tarea();
            $tarea->set('id', $row['id']);
            $tarea->set('titulo', $row['titulo']);
            $tarea->set('descripcion', $row['descripcion']);
            $tarea->set('fechaEstimadaFinalizacion', $row['fechaEstimadaFinalizacion']);
            $tarea->set('fechaFinalizacion', $row['fechaFinalizacion']);
            $tarea->set('creadorTarea', $row['creadorTarea']);
            $tarea->set('observaciones', $row['observaciones']);
            $tarea->set('idEmpleado', $row['idEmpleado']);
            $tarea->set('idEstado', $row['idEstado']);
            $tarea->set('idPrioridad', $row['idPrioridad']);
            $tarea->set('created_at', $row['created_at']);
            $tarea->set('updated_at', $row['updated_at']);
        }
        $db->close();
        return $tarea;
    }

    function save() {
        $sql = TareasQueries::insert($this);
        $db = new TareasDb();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }

    function update() {
        $sql = TareasQueries::update($this);
        $db = new TareasDb();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }
    function delete()
    {
        $sql = TareasQueries::delete($this);
        $db = new TareasDb();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }
    function updateEstado() {
        $sql = TareasQueries::updateEstado($this);
        $db = new TareasDb();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }
    function updateEmpleado() {
        $sql = TareasQueries::updateEmpleado($this);
        $db = new TareasDb();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }
}
?>
