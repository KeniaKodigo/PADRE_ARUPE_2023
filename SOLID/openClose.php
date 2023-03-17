<?php

interface FormaPago{
    public function procesarPago();
}

class Efectivo implements FormaPago{
    public function procesarPago()
    {
        //code..
    }
}

class PayPall implements FormaPago{
    public function procesarPago()
    {
        //code..
    }
}

class Depositar implements FormaPago{
    public function procesarPago()
    {
        //code..
    }
}

?>