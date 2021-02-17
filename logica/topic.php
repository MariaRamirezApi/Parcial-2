<?php
require "persistencia/editionDAO.php";

class topic{
    private $idTopic;
    private $name;
    private $conexion;
    private $topicDAO;
    
    public function getIdTopic()
    {
        return $this->idTopic;
    }

    public function getName()
    {
        return $this->name;
    }

    function topic($pIdTopic="", $pName="") {
        $this -> idTopic = $pIdTopic;
        $this -> name = $pName;        
        $this -> conexion = new Conexion();
        $this -> topicDAO = new topicDAO ($pIdTopic, $pName);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> topicDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> name = $resultado[0];       
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> editionDAO -> consultar());
        $this -> conexion -> cerrar();
        $topics = array();
        while (($resultado = $this -> conexion -> extraer()) != null){
            array_push($topics,new edition($resultado[0],$resultado[1]));
        }
        
        return $topics;
    }
    
    
}
?>