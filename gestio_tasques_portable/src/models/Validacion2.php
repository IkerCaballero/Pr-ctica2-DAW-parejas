<?php

class Validacion {
    public static function validarTarea($datos) {
        $errores = [];

        if ($datos['texto'] == '') {
            $errores[] = "El texto es obligatorio";
        }

        if (empty($datos['tema'])) {
            $errores[] = "El tema es obligatorio";
        }

        if (!in_array($datos['estado'], ['pendiente', 'iniciada', 'finalizada'])) {
            $errores[] = "Estado no válido";
        }

        if (!empty($datos['fecha_limite'])) {
            $fecha = DateTime::createFromFormat('Y-m-d', $datos['fecha_limite']);

            if (!$fecha) {
                $errores[] = "Fecha límite incorrecta";
            }
        }
        return $errores;
    }

}
