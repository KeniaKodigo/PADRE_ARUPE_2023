<?php
/**
 * Estamos trabajando un videjuego donde los personajes tienen diferentes herramientas
 * como cascos, espadas, pistolas, utilizar el patron decorator para implementar las
 * herramientas a los personajes. Utilizar 2 personajes para el ejemplo
 * personajes: guerrero, batman
 */

interface personajes{
    public function herramientas();
}

/** Clases concretas */
class Guerrero implements personajes{
    public function herramientas()
    {
        echo "El guerreo cuenta con estas herramientas: ";
    }
}

class Batman implements personajes{
    public function herramientas()
    {
        echo "Batman cuenta con estas herramientas: ";
    }
}

class Iroman implements personajes{
    public function herramientas()
    {
        echo "Iroman cuenta con estas herramientas: ";
    }
}

/** Clase decoradora */
class decoratorPersonaje implements personajes{
    protected $personaje;
    public function __construct(personajes $personaje)
    {
        $this->personaje = $personaje;
    }

    public function herramientas()
    {
        return $this->personaje->herramientas();
    }
}

/** herramientas extras como decoraciones*/
class Espada extends decoratorPersonaje{
    public function herramientas(){
        return parent::herramientas() . "lleva una espada ";
    }
}

class Arma extends decoratorPersonaje{
    public function herramientas(){
        return parent::herramientas() . " lleva una arma";
    }
}

class Bomba extends decoratorPersonaje{
    public function herramientas(){
        return parent::herramientas() . " lleva una bomba";
    }
}


/** Metodo cliente */
function getPersonajes(personajes $personaje){
    return $personaje->herramientas();
}

/** Instanciando */
$guerrero = new Guerrero;
$guerrero = new Espada($guerrero);
$guerrero = new Arma($guerrero);

echo getPersonajes($guerrero);