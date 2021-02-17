<?php
class editiontopicDAO{    
    private $idEditionTopic;
    private $accepted;
    private $rejected;
    private $edition_idEdition;
    private $topic_idTopic;
    
    function editiontopicDAO ($pIdEditionTopic, $pAccepted, $pRejected, $pEdition_idEdition, $pTopic_idTopic) {
        $this -> idEditionTopic = $pIdEditionTopic;
        $this -> accepted = $pAccepted;
        $this -> rejected = $pRejected;
        $this -> edition_idEdition = $pEdition_idEdition;
        $this -> topic_idTopic = $pTopic_idTopic;
    }
    
    function consultar(){
        return "select accepted, rejected, edition_idEdition, topic_idTopic
                from editiontopic
                where idEditionTopic= '" . $this-> idEditionTopic . "'";
    }
    
    function colsultarTodos(){
        return "select idEditionTopic, accepted, rejected, edition_idEdition, topic_idTopic from editiontopic";
    }
}
?>