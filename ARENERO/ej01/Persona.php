<?php
class Persona{
    private $nombre;
    public function inicializr($name){
        $this->nombre = $name;
    }

    public function mostrar(){
        echo '<p>'.$this->nombre.'<p>';
    }
}
?>