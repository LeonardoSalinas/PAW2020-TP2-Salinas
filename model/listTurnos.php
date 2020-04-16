<?php


class listTurnos{
    public $array;

    function __construct()
    {
        $this->array = [];
    }

    public function addTurnos($turno){
        array_push( $this->array, $turno);
    }

   
}
?>