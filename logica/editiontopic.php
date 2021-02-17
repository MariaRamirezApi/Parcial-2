<?php
require "persistencia/editiontopicDAO.php";

class editiontopic{
    private $idEditionTopic;
    private $accepted;
    private $rejected;
    private $edition_idEdition;
    private $topic_idTopic;
    private $conexion;
    private $editiontopicDAO;

    public function getIdEditionTopic()
    {
        return $this->idEditionTopic;
    }

    public function getAccepted()
    {
        return $this->accepted;
    }
    
    public function getRejected()
    {
        return $this->rejected;
    }
    
    public function getEdition_idEdition()
    {
        return $this->edition_idEdition;
    }
    
    public function getTopic_idTopic()
    {
        return $this->topic_idTopic;
    }

    function editiontopic ($pIdEditionTopic="", $pAccepted="", $pRejected="", $pEdition_idEdition="", $pTopic_idTopic="") {
        $this -> idEditionTopic = $pIdEditionTopic;
        $this -> accepted = $pAccepted;
        $this -> rejected = $pRejected;
        $this -> edition_idEdition = $pEdition_idEdition;
        $this -> topic_idTopic = $pTopic_idTopic;
        $this -> conexion = new Conexion();
        $this -> editiontopicDAO = new editiontopicDAO ($pIdEditionTopic, $pAccepted, $pRejected, $pEdition_idEdition, $pTopic_idTopic);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> editiontopicDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> accepted = $resultado[0];
        $this -> rejected = $resultado[1];
        $this -> edition_idEdition = $resultado[2];
        $this -> topic_idTopic = $resultado[3];
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> editiontopicDAO -> consultar());
        $this -> conexion -> cerrar();
        $editions_topics = array();
        while (($resultado = $this -> conexion -> extraer()) != null){
            array_push($editions_topics,new editiontopic($resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4]));
        }
        
        return $editions_topics;
    }
    
    
}
?>