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

        public function cursoParticipante($idUsuario,$idEF){
            $resultado = $this->conexion_db->query("SELECT * FROM autoevaluacion WHERE autoevaluacion.idUsuario = $idUsuario AND autoevaluacion.idEF = $idEF");
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

        public  function actualizarAutoevaluacion($idEF, $idUsuario, $AP1, $AP2, $AP3, $AP4, $AP5){
        $resultado = $this->conexion_db->query("UPDATE autoevaluacion SET r1 = $AP1, r2 = $AP2, r3 = $AP3, r4 = $AP4, r5 = $AP5 WHERE autoevaluacion.idUsuario = $idUsuario AND autoevaluacion.idEF = $idEF");
        
        }
        public function actualizarEvaluacionDocente($idEF, $idUsuario, $DP1, $DP2, $DP3, $DP4, $DP5){
        $resultado = $this->conexion_db->query("UPDATE evaluaciondocente SET r1 = $DP1, r2 = $DP2, r3 = $DP3, r4 = $DP4, r5 = $DP5 WHERE evaluaciondocente.idUsuario = $idUsuario AND evaluaciondocente.idEF = $idEF");
        
        }
        public function actualizarEvaluacionPrograma($idEF, $idUsuario, $PP1, $PP2, $PP3, $PP4, $PP5){
        $resultado = $this->conexion_db->query("UPDATE evaluacionprograma SET r1 = $PP1, r2 = $PP2, r3 = $PP3, r4 = $PP4, r5 = $PP5 WHERE evaluacionprograma.idUsuario = $idUsuario AND evaluacionprograma.idEF = $idEF");
        
        }

        public  function guardarEvaluacionParticipante($idEF, $idUsuario, $valor){
        $resultado = $this->conexion_db->query("UPDATE detalleeventoparticipante SET aprobado=$valor WHERE  detalleeventoparticipante.idUsuario = $idUsuario AND detalleeventoparticipante.idEF = $idEF");
        
        }

        public  function guardarCalificacionParticipante($idEF, $idUsuario, $valor){
        $resultado = $this->conexion_db->query("UPDATE detalleeventoparticipante SET calificacion=$valor WHERE  detalleeventoparticipante.idUsuario = $idUsuario AND detalleeventoparticipante.idEF = $idEF");
        
        }

        
    }

