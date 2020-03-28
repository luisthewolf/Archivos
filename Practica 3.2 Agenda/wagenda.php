<?php

$nombreAgenda = "agenda.csv";

$Registro = array();

if (file_exists($nombreAgenda))

{
    $numLineas = count(file($nombreAgenda));
}

else

{
    $numLineas = 0;
}

$Registro[] = $numLineas+1;
$Registro[]=$_POST['nombre'];
$Registro[]=$_POST['apellidos'];
$Registro[]=$_POST['fnacimiento'];
$Registro[]=$_POST['estadocivil'];
$Registro[]=$_POST['origen'];
$Registro[]=$_POST['correo'];
$Registro[]=$_POST['redess'];

$fp = fopen($nombreAgenda,"a") or die ("No se puede abrir el archivo: $nombreAgenda");

$resp = fputcsv($fp, $Registro, ',', '"', '"');
if ($resp === false) 
{
die("Error al escribir en CSV");
}

fclose($fp) or die("No se puede cerrar el archivo: $nombreAgenda");

echo ("<h1> Se agregó el contacto a la agenda: $nombreAgenda </h1> ");

header("refresh:3; url=contactos.php");