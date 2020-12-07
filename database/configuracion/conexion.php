<?php
    require ('C:\laragon\www\SistemaEventosFormativos\database\configuracion\config.php');

    class Conexion{
        protected $conexion_db;

        public function __construct(){
            $this->conexion_db = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
            if ($this->conexion_db->connect_errno){
                echo "Falla al conectar my SQL : " . $this->conexion_db->connect_error;
                return ;
            }
            $this->conexion_db->set_charset(DB_CHARSET);
        }
    }
