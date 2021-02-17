<?php
class editionDAO{    
    private $idEdition;
    private $name;
    private $year;
    private $startDate;
    private $endDate;
    private $internationalCollaboration;
    private $numberOfKeynotes;
    
    function editionDAO ($pIdEdition, $pName, $pYear, $pStartDate, $pEndDate, $pInternationalCollaboration,$pNumberOfKeynotes) {    
        $this -> idEdition = $pIdEdition;
        $this -> name = $pName;
        $this -> year = $pYear;
        $this -> startDate = $pStartDate;
        $this -> endDate = $pEndDate;
        $this -> internationalCollaboration = $pInternationalCollaboration;
        $this -> numberOfKeynotes = $pNumberOfKeynotes;        
    }
    
    function consultar(){
        return "select name, year, startDate, endDate, internationalCollaboration, numberOfKeynotes
                from edition
                where idEdition= '" . $this-> idEdition . "'";
    }
    
    function colsultarTodos(){
        return "select idEdition, name, year, startDate, endDate, internationalCollaboration, numberOfKeynotes from edition";
    }
}
?>