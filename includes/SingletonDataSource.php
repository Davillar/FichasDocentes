<?php

namespace es\ucm;

/**
 * Clase que permite establecer una conexion unica con la BBDD de la aplicacion
 */

class SingletonDataSource{
    
    private static $data;
    
    public static function getInstance(){
        if(!isset($data) || $data == NULL){
            $data = new \es\ucm\DataSource();
        }
        return $data;
    }
}