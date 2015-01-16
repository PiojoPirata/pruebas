<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    function convertir_fecha($fecha){ //convierte la fecha a modo dd-mm-yyyy
        //$fecha = strtotime($fecha); 
        //$fecha = date('d/m/Y', $fecha);
        //$source = '2012-07-31';
        $date = new DateTime($fecha);
        
        $fecha= $date->format('d/m/Y'); // 31-07-2012
        
        return $fecha;


    }
?>
