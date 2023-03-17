<?php
/**
 * Declaramos la interfaz para que sea la base
 * de nuestros componentes
 */

/** interfaz para las clases concretas, las que queremos decorar */
interface Pizza{
    public function descripcion();
}

//Los componente concretos de la pizza
class Margarita implements Pizza{
    public function descripcion()
    {
        return "Pizza Margarita ";
    }
}

class Vegetariana implements Pizza{
    public function descripcion()
    {
        return "Pizza vegetariana ";
    }
}

class Hawaina implements Pizza{
    public function descripcion()
    {
        return "Pizza Hawaiana";
    }
}

/**
 * Declaramos nuestra clase decoradora
 */
class PizzaTopings implements Pizza{
    //El decorador delega como va querer su pizza
    protected $pizza; //atributo protegido que hace referencia a la interfaz de las clases concretas
    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function descripcion()
    {
        return $this->pizza->descripcion(); //"Pizza Hawaina"
    }
}

/**
 * Clases concretas para las decoraciones
 * 
 * clases opcionales para la decoracion de las clases concretas
 */
class ExtraQueso extends PizzaTopings{
    /** sobreescribiendo el metodo de la clase Padre */
    public function descripcion()
    {
        return parent::descripcion() . "con extra queso"; //"Pizza Hawaina con extra queso"
    }
}

class Jalapeno extends PizzaTopings{
    public function descripcion()
    {
        return parent::descripcion() . " con jalapeno";
    }
}


function hacerPizza(Pizza $pizza){
    echo "Su orden: " . $pizza->descripcion();
}

//Instanciando
$pizza = new Vegetariana();
$pizza = new ExtraQueso($pizza);
hacerPizza($pizza);
echo "\n";
//pedimos instancia de la clase concreta
$pizza2 = new Margarita();
//pedimos las decoraciones
$pizza2 = new Jalapeno($pizza2);
echo hacerPizza($pizza2);

?>