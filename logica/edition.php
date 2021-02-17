<?php
require "persistencia/editionDAO.php";

class edition{
    private $idEdition;
    private $name;
    private $year;
    private $startDate;
    private $endDate;
    private $internationalCollaboration;
    private $numberOfKeynotes;
    private $conexion;
    private $editionDAO;
    
    public function getIdEdition()
    {
        return $this->idEdition;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getYear()
    {
        return $this->year;
    }
    
    public function getStartDate()
    {
        return $this->startDate;
    }
    
    public function getEndDate()
    {
        return $this->endDate;
    }
    
    public function getInternationalCollaboration()
    {
        return $this->internationalCollaboration;
    }
    
    public function getNumberOfKeynotes()
    {
        return $this->numberOfKeynotes;
    }
    
    function edition ($pIdEdition="", $pName="", $pYear="", $pStartDate="", $pEndDate="", $pInternationalCollaboration="",$pNumberOfKeynotes="") {
        $this -> idEdition = $pIdEdition;
        $this -> name = $pName;
        $this -> year = $pYear;
        $this -> startDate = $pStartDate;
        $this -> endDate = $pEndDate;
        $this -> internationalCollaboration = $pInternationalCollaboration;
        $this -> numberOfKeynotes = $pNumberOfKeynotes;
        $this -> conexion = new Conexion();
        $this -> editionDAO = new editionDAO ($pIdEdition, $pName, $pYear, $pStartDate, $pEndDate, $pInternationalCollaboration,$pNumberOfKeynotes);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> editionDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> name = $resultado[0];
        $this -> year = $resultado[1];
        $this -> startDate = $resultado[2];
        $this -> endDate = $resultado[3];
        $this -> internationalCollaboration = $resultado[4];
        $this -> numberOfKeynotes = $resultado[5];
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> editionDAO -> consultar());
        $this -> conexion -> cerrar();
        $editions = array();
        while (($resultado = $this -> conexion -> extraer()) != null){
            array_push($editions,new edition($resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4],$resultado[5],$resultado[7]));
        }
        
        return $editions;
    }
}
?>
