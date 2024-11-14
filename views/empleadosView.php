<?php

namespace App\views;

use App\controllers\EmpleadoController;


class EmpleadosViews
{
    function getSelect($a=false)
    {
        $select = '<select name="empleado">';
        if($a){
            $select .= '<option value="">Seleccione una opción</option>';
        }
        $empleadoController = new EmpleadoController();
        $empleados = $empleadoController->Empleado();
        foreach ($empleados as $empleado) {
            $id = $empleado->get('id');
            $nombre = $empleado->get('nombre');
            $select .= "<option value=\"$id\">$nombre</option>";
        }
        $select .= '</select>';
        return $select;
    }
}
