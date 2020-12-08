<?php
    require_once ('C:\laragon\www\SistemaEventosFormativos\database\configuracion\conexion.php');

    class Modulo extends conexion{
        public function __construct(){
            parent ::__construct();
        }

        // INSERT
        public function addModulo($nombre, $contenido, $duracion){
            $this->conexion_db->query("INSERT INTO modulo(nombreModulo, contenidoModulo, duracionModulo) VALUES ('$nombre', '$contenido', '$duracion')");
        }

        // SELECT
        public function listaTodosModulos(){
            $resultado = $this->conexion_db->query("SELECT * FROM modulo");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

    }

    if($_POST){
        $nombre = $_POST['nombreModulo'];
        $contenido  = $_POST['contenidoModulo'];
        $duracion = $_POST['duracion'];
        $modulo1 = new Modulo();
        $modulo1->addModulo($nombre, $contenido, $duracion);
        header('location:modulos');
    }
?>
