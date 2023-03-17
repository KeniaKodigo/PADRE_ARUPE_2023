<?php

abstract class TareasProgramador{
    abstract public function maquetar();
    abstract public function codificar();
    abstract public function testear();
}

abstract class TareasLider{
    abstract public function liderarProyectos();
}


class ScrumMaster extends TareasLider{
    public function liderarProyectos()
    {
        //code..
    }
}


?>