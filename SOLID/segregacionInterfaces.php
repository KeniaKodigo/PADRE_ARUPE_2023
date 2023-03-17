<?php
/**
 * segregacion de interfaces:
 * es mejor tener varias interfaces a tener solo una
 * 
 */

interface ExportarDocumentos{
    public function exportPDF();
    public function exportDoc();
    public function exportJSON();
}


interface PDF{
    public function exportPDF();
}

interface DOC{
    public function exportDoc();
}

interface JSON{
    public function exportJSON();
}

class Factura implements PDF{
    public function exportPDF()
    {
        //code..
    }
}

class ComprobanteFiscal implements PDF, DOC{

    public function exportPDF()
    {
        
    }

    public function exportDoc()
    {
        
    }
}

?>