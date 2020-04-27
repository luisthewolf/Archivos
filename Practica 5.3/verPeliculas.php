<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>

    <?php
    $archivo = 'miArchivo.xml';
    if (file_exists("$archivo"))
    {
        $x = simplexml_load_file($archivo)
            or die("Error: No se puede abrir el archivo xml");

        $lista = $x->pelicula;

        $numPelis = count($lista);
    ?>

        <div class="container">
            <h1 class="titulo">Lista de Películas</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Año</th>
                            <th>Género</th>
                            <th>Clasificación</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                        for($i = 0; $i < $numPelis; $i++){
                            echo '<tr>';
                            echo '<td><b>' . $lista[$i]->attributes()->peli_id . '</b></td>';
                            echo '<td>' . $lista[$i]->titulo . '</b></td>';
                            echo '<td>' . $lista[$i]->año . '</td>';
                            echo '<td>' . $lista[$i]->genero . '</td>';
                            echo '<td>' . $lista[$i]->clasificacion . '</td>';
                            echo '</tr>';
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <?php
    }
    ?>

</body>
</html>