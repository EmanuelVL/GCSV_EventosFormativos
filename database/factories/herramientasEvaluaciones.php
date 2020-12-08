<?php
    require_once ('C:\laragon\www\SistemaEventosFormativos\database\configuracion\conexion.php');

    class Evaluacion extends conexion{
        public function __construct(){
            parent ::__construct();
        }

        // Ver lista de eventos terminados de un usuario
        public function listaEventosTerminadosParticipante($idUsuario){
            $resultado = $this->conexion_db->query("CALL listaEFTerminados($idUsuario)");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        // Ver lista de eventos terminados de un usuario
        public function listaEventosTerminadosInstructor($idUsuario){
            $resultado = $this->conexion_db->query("CALL listaEFTerminadosInstructores($idUsuario)");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        // Se evaluaron a los participantes?
        public function participantes($idEF){
            $resultado = $this->conexion_db->query("SELECT * FROM usuario INNER JOIN detalleeventoparticipante ON usuario.idUsuario = detalleeventoparticipante.idUsuario WHERE detalleeventoparticipante.idEF = $idEF");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        // Se evaluaron a los participantes?
        public function participantesEF($idEF){
            $resultado = $this->conexion_db->query("SELECT * FROM detalleeventoparticipante WHERE detalleeventoparticipante.idEF = $idEF");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }


        public  function guardarAutoevaluacion($idEF, $idUsuario, $AP1, $AP2, $AP3, $AP4, $AP5){
        $resultado = $this->conexion_db->query("INSERT INTO autoevaluacion VALUES($idUsuario,$idEF, $AP1, $AP2, $AP3, $AP4, $AP5)");
        
        }
        public function guardarEvaluacionDocente($idEF, $idUsuario, $DP1, $DP2, $DP3, $DP4, $DP5){
        $resultado = $this->conexion_db->query("INSERT INTO evaluaciondocente VALUES($idUsuario,$idEF, $DP1, $DP2, $DP3, $DP4, $DP5)");
        
        }
        public function guardarEvaluacionPrograma($idEF, $idUsuario, $PP1, $PP2, $PP3, $PP4, $PP5){
        $resultado = $this->conexion_db->query("INSERT INTO evaluacionprograma VALUES($idUsuario,$idEF, $PP1, $PP2, $PP3, $PP4, $PP5)");
        
        }

        public  function guardarEvaluacionParticipante($idEF, $idUsuario){
        $resultado = $this->conexion_db->query("UPDATE detalleeventoparticipante SET aprobado=1 WHERE  detalleeventoparticipante.idUsuario = $idUsuario AND detalleeventoparticipante.idEF = $idEF");
        
        }

        
    }

