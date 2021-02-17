<?php
class topicDAO{    
    private $idTopic;
    private $name;
    
    function topic($pIdTopic, $pName) {
        $this -> idTopic = $pIdTopic;
        $this -> name = $pName;        
    }
    
    function consultar(){
        return "select name from topic where idTopic= '" . $this-> idTopic . "'";
    }
    
    function colsultarTodos(){
        return "select idTopic, name from topic";
    }
}
?>