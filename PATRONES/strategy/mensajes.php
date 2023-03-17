<?php
/**
 * Tenemos un sistema donde mostramos mensajes en distintos tipos de salidas 
 * como por consola, en formato json, en un archivo .txt, etc.
 * para tener por separado los tipos de salida necesitamos utilizar el patron strategy. 
 */

/** Interfaz strategy */
interface tipoSalida{
    public function formato();
}

/** creanado las clases que dependan de la interfaz */
class Consola implements tipoSalida{
    public function formato()
    {
        echo "El mensaje es por via consola";
    }
}

class JSON implements tipoSalida{
    public function formato()
    {
        echo "El mensaje es por via JSON";
    }
}

class Texto implements tipoSalida{
    public function formato()
    {
        echo "El mensaje es por via texto";
    }
}

/** Clase Concreta para recibir las estrategias */
class ImprimirFormato{
    private tipoSalida $formato;

    public function setFormato(tipoSalida $salida){
        $this->formato = $salida;
    }

    public function formato(){
        echo $this->formato->formato();
    }
}

$formato = new ImprimirFormato();

$formato->setFormato(new JSON());
echo $formato->formato();
echo "\n";
$formato->setFormato(new Consola());
echo $formato->formato();

?>