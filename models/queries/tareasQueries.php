<?php

namespace App\models\queries;

class TareasQueries
{

    static function selectAll()
    {
        return "select tareas.*, prioridades.nombre as Prioridad, estados.nombre as Estado, empleados.nombre as Empleado from tareas inner join prioridades on tareas.idPrioridad=prioridades.id inner join estados on tareas.idEstado=estados.id inner join empleados on tareas.idEmpleado=empleados.id ORDER BY tareas.idPrioridad ASC, `tareas`.`fechaEstimadaFinalizacion` ASC;";
    }
    
    
    static function insert($tarea)
    {
        $titulo = $tarea->get('titulo');
        $descripcion = $tarea->get('descripcion');
        $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
        $fechaFinalizacion = $tarea->get('fechaFinalizacion');
        $creadorTarea = $tarea->get('creadorTarea');
        $observaciones = $tarea->get('observaciones');
        $idEmpleado = $tarea->get('idEmpleado');
        $idEstado = $tarea->get('idEstado');
        $idPrioridad = $tarea->get('idPrioridad');
        $created_at = $tarea->get('created_at');
        $updated_at = $tarea->get('updated_at');
        $sql = "insert into tareas (titulo, descripcion, fechaEstimadaFinalizacion, fechaFinalizacion, creadorTarea, observaciones, idEmpleado, idEstado, idPrioridad, created_at, updated_at) values ";
        $sql .= "('$titulo','$descripcion', '$fechaEstimadaFinalizacion','$fechaFinalizacion','$creadorTarea','$observaciones','$idEmpleado','$idEstado','$idPrioridad','$created_at','$updated_at')";
        return $sql;
    }
    static function whereId($id)
    {
        return "select * from tareas where id=$id";
    }
    static function update($tarea)
    {
        $id = $tarea->get('id');
        $titulo = $tarea->get('titulo');
        $descripcion = $tarea->get('descripcion');
        $fechaEstimadaFinalizacion = $tarea->get('fechaEstimadaFinalizacion');
        $fechaFinalizacion = $tarea->get('fechaFinalizacion');
        $creadorTarea = $tarea->get('creadorTarea');
        $observaciones = $tarea->get('observaciones');
        $idEmpleado = $tarea->get('idEmpleado');
        $idEstado = $tarea->get('idEstado');
        $idPrioridad = $tarea->get('idPrioridad');
        $updated_at = $tarea->get('updated_at');
        $sql = "update tareas set titulo='$titulo', descripcion='$descripcion', fechaEstimadaFinalizacion='$fechaEstimadaFinalizacion', fechaFinalizacion='$fechaFinalizacion', creadorTarea='$creadorTarea', observaciones='$observaciones', idEmpleado='$idEmpleado', idEstado='$idEstado', idPrioridad='$idPrioridad', updated_at='$updated_at' where id=$id";
        return $sql;
    }
    static function delete($tarea)
    {
        $id = $tarea->get('id');
        return "delete from tareas where id=$id";
    }
    static function whereIdPrioridad($IdPrioridad)
    {
        return "select * from tareas where IdPrioridad=$IdPrioridad";
    }
    static function whereIdEstado($Id)
    {
        return "select * from tareas where IdEstado=$Id";
    }
    static function filtro($filtro){
        $where = '';
        if(!empty($filtro['titulo'])){
            $where .= "titulo='$filtro[titulo]'";
        }
        if(!empty($filtro['descripcion'])){
            if ($where != "") {
                $where .= " AND ";
            }
            $where .= "descripcion='$filtro[descripcion]'";
        }
         if(!empty($filtro['fechainicio']) && !empty($filtro['fechaFinalizacion']) ){
             if ($where != "") {
                 $where .= " AND ";
             }
             $where .= "tareas.fechaEstimadaFinalizacion BETWEEN '$filtro[fechainicio]' AND '$filtro[fechaFinalizacion]' " ;
         } 
         if(!empty($filtro['prioridad'])){
            if ($where != "") {
                $where .= " AND ";
            }
            $where .= "idPrioridad='$filtro[prioridad]'";
        }
        if(!empty($filtro['empleado'])){
            if ($where != "") {
                $where .= " AND ";
            }
            $where .= "idEmpleado='$filtro[empleado]'";
        }
        if(!empty($filtro['estado'])){
            if ($where != "") {
                $where .= " AND ";
            }
            $where .= "idEstado='$filtro[estado]'";
        }
        return "select tareas.*, prioridades.nombre as Prioridad, estados.nombre as Estado, empleados.nombre as Empleado from tareas inner join prioridades on tareas.idPrioridad=prioridades.id inner join estados on tareas.idEstado=estados.id inner join empleados on tareas.idEmpleado=empleados.id where $where ORDER BY tareas.idPrioridad ASC, tareas.fechaEstimadaFinalizacion ASC;";
    }
    static function updateEstado($tarea)
    {
        $id = $tarea->get('id');
        $idEstado = $tarea->get('idEstado');
        $updated_at = $tarea->get('updated_at');
        $sql = "update tareas set idEstado='$idEstado', updated_at='$updated_at' where id=$id";
        return $sql;
    }
    static function updateEmpleado($tarea)
    {
        $id = $tarea->get('id');
        $idEmpleado = $tarea->get('idEmpleado');
        $updated_at = $tarea->get('updated_at');
        $sql = "update tareas set idEmpleado='$idEmpleado', updated_at='$updated_at' where id=$id";
        return $sql;
    }

    
   
   

}