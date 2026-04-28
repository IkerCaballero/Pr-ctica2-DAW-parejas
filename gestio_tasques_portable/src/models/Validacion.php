<?php

class Validacion {
    public static function validarTarea($datos) {
        $errores = [];

        if ($datos['texto'] == '') {
            $errores[] = "El texto es obligatorio";
        }

        if ($datos['tema'] == '') {
            $errores[] = "El tema es obligatorio";
        }

        if (
            $datos['estado'] != 'pendiente' &&
            $datos['estado'] != 'iniciada' &&
            $datos['estado'] != 'finalizada'
         ){
            $errores[] = "Estado no válido"; }

        if ($datos['fecha_limite'] != '') {
            $fecha = DateTime::createFromFormat('Y-m-d', $datos['fecha_limite']);

            if (!$fecha) {
                $errores[] = "Fecha límite incorrecta";
            }
        }

        return $errores;
    }
}
