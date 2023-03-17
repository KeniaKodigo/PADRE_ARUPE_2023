<?php
/**
 * Crear un videjuego que va contener 2 enemigos:y  Zombies Esqueletos
 * Cada enemigo va tener logica diferente de juego en sus ataques y velocidad
 * para este ejemplo el juego consta de 2 niveles, facil y dificil
 * En el nivel facil se va a crear el primer enemigo "Esqueleto" y el nivel dificil los "zombies".
 */

/** Interfaz de mis productos */
interface Personaje{
    public function ataque();
    public function velocidad();
}

class Zombi implements Personaje{
    public function ataque()
    {
        echo "El zombi tiene un ataque de 30\n";
    }

    public function velocidad()
    {
        echo "El zombi tiene una velocidad de 0.20\n";
    }
}

class Esqueleto implements Personaje{
    public function ataque()
    {
        echo "El esqueleto tiene un ataque de 15\n";
    }

    public function velocidad()
    {
        echo "El esqueleto tiene una velocidad de 0.25\n";
    }
}

class Oso implements Personaje{
    public function ataque()
    {
        echo "El oso tiene un ataque de 20\n";
    }

    public function velocidad()
    {
        echo "El oso tiene una velocidad de 0.10\n";
    }
}

/** Creando la fabrica */
abstract class enemigoFabrica{
    /** Retornando un nuevo personaje de mi interfaz */
    abstract public function getPersonaje() : Personaje;

    public function imprimirPersonaje(){
        $personaje = $this->getPersonaje();
        $personaje->ataque();
        $personaje->velocidad();
    }

}

/** Clases que extienden de mi fabrica */
class nivelFacil extends enemigoFabrica{
    public function getPersonaje(): Personaje
    {
        return new Esqueleto;
    }
}

class nivelIntermedio extends enemigoFabrica{
    public function getPersonaje(): Personaje
    {
        return new Oso;
    }
}

class nivelDificil extends enemigoFabrica{
    public function getPersonaje(): Personaje
    {
        return new Zombi;
    }
}

/** Metodo que va utilizar el cliente o usuario */
function CrearPersonaje(enemigoFabrica $enemigo){
    return $enemigo->imprimirPersonaje();
}


echo CrearPersonaje(new nivelFacil); //crea objetos de tipo esqueleto
echo CrearPersonaje(new nivelIntermedio); //crea objetos de tipo oso
echo CrearPersonaje(new nivelDificil); //crea objetos de tipo zombie
 
?>