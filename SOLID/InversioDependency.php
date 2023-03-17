<?php

/**
 * Inversion de Dependencia: modulos de alto nivel no pueden depender de modulos de bajo nivel sino que ambos
 * tienen que depender de abstraccion (interfaz, clase abstracta)
 * 
 * Modulos o clases de alto nivel: Donde se maneja toda la logica de negocio
 * Modulos o clases de bajo nivel: Tareas pequeñas que hacemos dentro de la logica de negocio
 */


class DocumentoMYSQL{
    public function obtenerDocumento($documento){
        return "El documento " . $documento . " esta en la tabla documentos de MYSQL";
    }
}

class DocSQLSERVER{

}

class ProcesarDocumento{
    public function enviarDocumento($documento){
        $mysql = new DocumentoMYSQL();
        $mysql->obtenerDocumento($documento);
    }
}

//solucion

interface Document{
    public function buscarDocument($documento);
}

class MYSQL implements Document{
    public function buscarDocument($documento){
        echo "El documento estaba en MYSQL";
    }
}

class SQLSERVER implements Document{
    public function buscarDocument($documento){
        echo "El documento estaba en SQLSERVER";
    }
}

class ProcessDocument{
    public function enviarDocumento(Document $doc, $documento2){
        $doc->buscarDocument($documento2);
    }
}

$documento = new ProcessDocument();
$documento->enviarDocumento(new MYSQL, "Principios SOLID");

$documento2 = new ProcessDocument();
$documento->enviarDocumento(new SQLSERVER, "Patrones de diseño");



?>