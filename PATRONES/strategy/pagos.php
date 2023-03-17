<?php



/**
 * Declaramos la interfaz strategy, para los tipos de pagos
 * que vamos a trabajar.
 */

#interfaz strategy
interface tipoPagos{
    public function pago($cantidad);
}

/**
 * Clases concretas que dependeran de la interfaz strategy
 */
class pagoTarjeta implements tipoPagos{
    public function pago($cantidad)
    {
        echo "Pago con tarjeta de credito, $" . $cantidad;
    }
}

class pagoPayPal implements tipoPagos{
    public function pago($cantidad)
    {
        echo "Pago a travez de paypal, $" . $cantidad;
    }
}

class DepositarCuenta implements tipoPagos{
    public function pago($cantidad)
    {
        echo "Pago a travez de una cuenta corriente, $" . $cantidad;
    }
}

class Efectivo2 implements tipoPagos{
    public function pago($cantidad){
        echo "El pago se hizo en efectivo y fue la cantidad de " . $cantidad;
    }
}

//clase que va definir el contexto de los pagos
class Orden{
    //referencia de las clases concretas
    private tipoPagos $pago; //atrubuto que recibe objetos del estrategy

    public function setPagos(tipoPagos $pago){
        $this->pago = $pago;
    }

    public function pago($cantidad){
        $this->pago->pago($cantidad);
    }
}

//instanciamos con que clase concreta queremos trabajar
$orden = new Orden();
$orden->setPagos(new pagoPayPal());
//delegamos la tarea
echo $orden->pago(5000);
echo "\n";
$orden2 = new Orden();
$orden2->setPagos(new pagoTarjeta());
echo $orden2->pago(750);

echo "\n";
$orden3 = new Orden();
$orden3->setPagos(new Efectivo2);
echo $orden3->pago(78);

/*function pagos($pago){
    if($pago == "Tarjeta"){

    }else if($pago == "Paypal"){

    }
}*/
?>