<?php
    require_once ('C:\laragon\www\SistemaEventosFormativos\database\configuracion\conexion.php');

    class Constancia extends conexion{
        public function __construct(){
            parent ::__construct();
        }

        // Ver lista de eventos terminados de un usuario
        public function listaEventosTerminados($idUsuario){
            $resultado = $this->conexion_db->query("CALL listaEFTerminados($idUsuario)");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        // Se evaluaron a los participantes?
        public function participantesCalificados($idEF){
            $resultado = $this->conexion_db->query("SELECT * FROM eventoformativo WHERE eventoformativo.idEF = $idEF");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        // Usuario realizó autoevaluacion?
        public function autoevaluacionRealizada($idEF, $idUsuario){
            $resultado = $this->conexion_db->query("CALL autoevalRealizada($idEF, $idUsuario)");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        // Usuario realizó evaluación al docente?
        public function evaluaciondocenteRealizada($idEF, $idUsuario){
            $resultado = $this->conexion_db->query("CALL evaldocRealizada($idEF, $idUsuario)");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        // Usuario realizó evaluación al programa?
        public function evaluacionprogramaRealizada($idEF, $idUsuario){
            $resultado = $this->conexion_db->query("CALL evalproRealizada($idEF, $idUsuario)");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        // Usuario aprobó Evento Formativo?
        public function participanteAprobado($idEF, $idUsuario){
            $resultado = $this->conexion_db->query("CALL participanteAprobado($idEF, $idUsuario)");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        // SELECT con datos de un Usuario
        public function selectUsuario($idUsuario){
            $resultado = $this->conexion_db->query("SELECT * FROM usuario WHERE usuario.idUsuario = $idUsuario");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        // SELECT con datos de un Evento Formativo
        public function selectEF($idEF){
            $resultado = $this->conexion_db->query("CALL selectEF($idEF)");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
    }
