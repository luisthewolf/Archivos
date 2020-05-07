<?php

require_once('./ClassContacto.php');

$archivo_json = "agenda.json";

$contacto1 = new Contacto(
    "Jesus",
    "Santillana Araiza",
    "2000-02-12",
    "Soltero",
    "Gómez Palacio",
    "jglez@itsl.mx",
    "@jglezz"
);

$contacto2 = new Contacto(
    "Jennifer",
    "Salais Palacios",
    "2000-08-02",
    "Soltera",
    "Durango",
    "jSalais@itsl.mx",
    "@Salais"
);

$contactos = array();

$contactos[] = $contacto1;

$contactos[] = $contacto2;

$json_string = json_encode($contactos);

$arch = fopen($archivo_json,'w');
if( $arch == false ) {
    echo ( "Error al abrir el archivo" );
    exit();
}

fwrite($arch,$json_string);

fclose($arch);

echo '<h3>Datos escritos en agenda.json </h3>';

header("refresh:2;url=mostrar_json.php");