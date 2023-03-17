/**
 * Open-Closed: Las clases estan abiertas extensiones y cerradas a modificaciones 
 */

class ProcesarPago{

    tipoPago(forma){
        switch(forma){
            case "Tarjeta Credito":
                //code..
            break;

            case "Paypall":
                //code..
            break;
            case "Efectivo":
                //code..
            break;
            case "Depositar":
                //code..
            break;
            default:
                return "Selecciona una forma de pago";
        }
    }
}

/** asignamos una super clase */
class FormasPago{
    formaPago(){
        //code..
        return "Hay formas de pago";
    }
}

class TarjetaCredito extends FormasPago{

    formaPago(){
        return "Estas pagando con una tarjeta de credito";
    }
}

class Paypall extends FormasPago{
    formaPago(){
        return "Estas pagando por medio de paypall";
    }
}

class Efectivo extends FormasPago{
    formaPago(){
        return "Estas pagando en efectivo";
    }
}

class Depositar extends FormasPago{
    formaPago(){
        return "Estas depositando a mi cuenta";
    }
}