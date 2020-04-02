<?php
$nombreArchivo = "biblioteca.xml";
if (file_exists($nombreArchivo)){
    $miXML = simplexml_load_file($nombreArchivo)
        or die("Error: No se puede crear el objeto SimpleXMLElement");
    var_dump($miXML);
}