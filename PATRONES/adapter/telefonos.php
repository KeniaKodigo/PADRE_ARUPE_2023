<?php
/*
* En este caso traemos un ejemplo con cargadores de celulares, de 12V y 24V
* el celular a primeras funciona perfectamente con el cargador de 24V pero
* nos encotramos con el problema de que para cargadores de 12V existe una
* incompatibilidad, por ende decidimos crear un transformador que nos funcione
* como adaptador para poder usarlo.
*/

#clases principales
class Cargador12V{
    public function conectar(){
        echo "Cargando el telefono con cargador de 12 volteos";
    }
}

class Cargador24V{
    public function conectar(){
        echo "Cargando el telefono con cargador de 24 volteos";
    }
}


/**
 * Creamos la clase adaptador para el cargador de 12V que extiende de la 24V 
 * para que se pueda implementar en la clase Telefono
 */
class AdapterCargador12V extends Cargador24V{
    private $cargador12; //atributo privado que va a ser referencia a la clase que se quiere adaptar

    public function __construct(Cargador12V $cargador12){
        $this->cargador12 = $cargador12;
    }

    /** polimorfismo  */
    public function conectar(){
        echo "Cargando con adaptador de 12 volteos ";
    } 
}

/**
 * En la clase Telefono, el metodo cargar() toma como parametro un objeto la clase
 * Cargador24V, por ende podemos instanciar la clase adaptadora ya que extiende de ella
 */
class Telefono{
    function cargar(Cargador24V $cargador24){
        return $cargador24->conectar();
    }
}

$telefono2 = new Telefono();
echo $telefono2->cargar(new AdapterCargador12V(new Cargador12V));
echo "\n";
$telefono3 = new Telefono();
echo $telefono3->cargar(new Cargador24V());

/*$telefono = new Telefono();
$carga12 = new Cargador12V();
echo $telefono->cargar(new AdapterCargador12V($carga12));*/

?>