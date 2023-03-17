<?php
/** patron adapter */
/** Interfaz va seguir las clases adaptadoras */
interface Compartir{
    public function mensaje();
}

/** Clases principales */
class WhatsApp{
    public function msjWhatsApp($mjs){
        echo "Se ha compartido por via WhatsApp: " . $mjs;
    }
}

class Messenger{
    public function msjMessenger($msj){
        echo "Se ha compartido por via Messenger: " . $msj;
    }
}

class Instagram{
    public function msjInstagram($msj){
        echo "Se ha compartido por via instagram: " . $msj;
    }
}

/** Clases adaptadoras */
class AdapterMessenger implements Compartir{
    private $messenger; /** hace la conexion con la clase Messenger */
    private $dato;

    /** tenemos el constructor donde le solicitamos la clase que se va adaptar */
    public function __construct(Messenger $mess, $dato){
        $this->messenger = $mess;
        $this->dato = $dato;
    }

    /** metodo que hace referencia al metodo de la interfaz Compartir */
    public function mensaje()
    {
        $this->messenger->msjMessenger($this->dato);
    }
}

class AdapterWhatsApp implements Compartir{
    private $whatsapp;
    private $dato;
    public function __construct(WhatsApp $whatsapp, $dato) {
        $this->whatsapp = $whatsapp;
        $this->dato = $dato;
    }

    public function mensaje()
    {
        $this->whatsapp->msjWhatsApp($this->dato);
    }
}

class AdapterInstagram implements Compartir{
    private $insta;
    private $dat;

    public function __construct(Instagram $instagram, $dato)
    {
        $this->insta = $instagram;
        $this->dat = $dato;
    }

    public function mensaje()
    {
        $this->insta->msjInstagram($this->dat);
    }
}

function compartirMensaje(Compartir $compartir){
    $compartir->mensaje();
}

$wa = new WhatsApp();
echo compartirMensaje(new AdapterWhatsApp($wa, "Hola Chicas"));
echo "\n";
$ins = new Instagram();
echo compartirMensaje(new AdapterInstagram($ins, "Clase de repaso"));

$messenger = new Messenger();
echo compartirMensaje(new AdapterMessenger($messenger, "Buenas noches"));


echo compartirMensaje(new AdapterInstagram(new Instagram, "Bienvenidos, estamos con patrones de diseño"));

?>