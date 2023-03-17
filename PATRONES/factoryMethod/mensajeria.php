<?php
/**
 * Declaramos una interfaz que controle los tipos de transporte que van a trabajar
 * con mi metodo de fabrica, (Camion y Avion se consideran como productos)
 */
interface Transporte{
    public function envio();
}
/**
 * Implementamos la interfaz a los tipos de transporte que voy a trabajar
 */
class Camion implements Transporte{
    public function envio()
    {
        echo "El envio ya esta listo y se hara a traves de un camion";
    }
}

class Avion implements Transporte{
    public function envio()
    {
        echo "El envio ya esta listo y se hara a traves de un avion";
    }
}

class Barco implements Transporte{
    public function envio()
    {
        echo "El envio ya esta listo y se hara a traves de un barco";
    }
}



/**
 * La clase abstracta declara el factory method
 * super clase que declara la fabrica principal
 */
abstract class Mensajeria{
    /**
     * Nuestro metodo abstracto, sera nuestra fabrica que retorne un tipo de transporte 
     */
    abstract function getEntregaByTransporte() : Transporte;

    /**
     * Este metodo devuelve un tipo de transporte (camion o  avion), llamamos el metodo abstracto
     * y retornamos el metodo que contiene la interfaz Transporte: envio()
     */
    public function EnviarEntrega(){
        $transporte = $this->getEntregaByTransporte();
        return $transporte->envio();
    }
}
/**
 * Clases que extienden de la clase abstracta, que retornan un nuevo trasnporte
 */
class mensajeriaTerrestre extends Mensajeria{
    public function getEntregaByTransporte(): Transporte
    {
        //creamos un objeto del producto de tipo Transporte
        return new Camion();
    }
}

class mensajeriaAerea extends Mensajeria{
    public function getEntregaByTransporte(): Transporte
    {
        return new Avion();
    }
}

class mensajeriaMaritima extends Mensajeria{
    public function getEntregaByTransporte(): Transporte
    {
        return new Barco();
    }
}



/**
 * Metodo para imprimir el tipo de mensajeria que necesito
 * va tener como parametro la clase abstracta de la fabrica 
 */
function entregaMensajeria(Mensajeria $mensajeria){
    return $mensajeria->EnviarEntrega();
}
echo entregaMensajeria(new mensajeriaTerrestre);
echo "\n";
echo entregaMensajeria(new mensajeriaAerea);
echo "\n";
echo entregaMensajeria(new mensajeriaMaritima);

?>