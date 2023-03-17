<?php
/** creamos la interfaz donde se manejaran los productos */
interface Chair{
    public function hasLegs(); 
    public function sitOn();
}

interface Sofa{
    public function hasLegs();
    public function sitOn();
}

interface Table{
    public function hasLegs();
}

class VictoriaChair implements Chair{
    public function hasLegs(){
        return "Esta es una silla victoria y tiene patas";
    }
    
    public function sitOn(){
        return "Esta es una silla victoria y te podes sentar";
    }
}

class ModernChair implements Chair{
    public function hasLegs(){
        return "Esta es una silla moderna y tiene patas";
    }
    
    public function sitOn(){
        return "Esta es una silla moderna y te podes sentar";
    }
}

class TableSiman implements Table{
    public function hasLegs(){
        return "Compraste la mesa en siman";
    }
}

class TableOmnisport implements Table{
    public function hasLegs(){
        return "Compraste la mesa en omnisport";
    }
}

class VictoriaSofa implements Sofa{
    public function hasLegs(){
        return "Esta es un sofa victoria y tiene patas";
    }
    public function sitOn(){
        return "Esta es un sofa victoria y te podes sentar";
    }
}

class ModernSofa implements Sofa{
    public function hasLegs(){
        return "Esta es un sofa moderno y tiene patas";
    }
    public function sitOn(){
        return "Esta es un sofa moderno y te podes sentar";
    }
}

/** fabrica abstracta  */
abstract class FabricaAbstract{
    abstract function createChair() : Chair;
    
    abstract function createSofa() : Sofa;

    abstract function createTable() : Table;
}

/** subclases de la fabrica abstracta */
class VictoriaFabrica extends FabricaAbstract{

    public function createChair(): Chair
    {
        return new VictoriaChair();
    }

    public function createSofa(): Sofa
    {
        return new ModernSofa();
    }

    public function createTable(): Table{
        return new TableOmnisport();
    }
}

class ConstruirCasa extends FabricaAbstract{
    public function createChair(): Chair
    {
        return new ModernChair();
    }

    public function createSofa(): Sofa
    {
        return new VictoriaSofa();
    }

    public function createTable(): Table
    {
        return new TableSiman();
    }
}

/** metodo donde se solicita crear la familia de la fabrica abstracta */
function entregarFamilia(FabricaAbstract $fabrica){
    $chair = $fabrica->createChair();
    $sofa = $fabrica->createSofa();

    $cadena = "";
    $cadena .= "Mi casa tiene: " . "\n" . $chair->hasLegs() . "\n" . $sofa->sitOn();
    echo $cadena;
}


entregarFamilia(new VictoriaFabrica());
?>