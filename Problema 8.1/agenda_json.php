<?php

require_once('./ClassContacto.php');

$archivo_json = "agenda.json";

$contacto1 = new Contacto(
    "Aves De Presa",
    "Accion",
    "1h 49m",
    "R",
    "Margot Robbie",
);

$contacto2 = new Contacto(
    "Frozen 2",
    "Animacion",
    "1h 43m",
    "A",
    "Idina Menzel
    Kristen Bell
    Jonathan Groff
    Josh Gad",

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