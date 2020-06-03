<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histograma Televisiones</title>
    <link rel="stylesheet" href="./css/chartist.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <script src="./js/chartist.min.js"></script>
</head>

<body>
    <div class="container">

        <div class="centro">
            <h1>Televisores/Pantallas Que Existen En Una Determinada Ciudad</h1>
            <span class="subt">25000 Datos Capturados En Total:</span>
        </div>

        <div class="ct-chart ct-octave"></div>

        <div class="container">
        <div class="table-responsive">
			<table class="table table-hover">
				<thead class="thead-dark">

					<tr>
						<th>Familias con 0 pantallas</th>
						<th>Familias con 1 pantalla</th>
						<th>Familias con 2 pantallas</th>
						<th>Familias con 3 pantallas</th>
						<th>Familias con 4 pantallas</th>
						<th>Familias con 5 pantallas</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$lista = array(
						array("981", "1019", "10976", "11024", "502", "498")
					);

					$tam = count($lista);

					for ($r = 0; $r < $tam; $r++) {
						echo "<tr>";
						echo "<td>" . $lista[$r][0] . "</td>";
						echo "<td>" . $lista[$r][1] . "</td>";
						echo "<td>" . $lista[$r][2] . "</td>";
						echo "<td>" . $lista[$r][3] . "</td>";
						echo "<td>" . $lista[$r][4] . "</td>";
						echo "<td>" . $lista[$r][5] . "</td>";
						echo "</tr>";
					}

					$variable0 = 0;
					$variable1 = 0;
					$variable2 = 0;
					$variable3 = 0;
					$variable4 = 0;
					$variable5 = 0;

		$linea = 0;

        $archivodatosCrudos = "./csv/datoscrudos.csv";

        $handle = fopen($archivodatosCrudos, "r") or die("No se puede abrir el archivo: $archivodatosCrudos");

        while (($datos = fgetcsv($handle, ",")) == true) 
        {
          $num = count($datos);
          $linea++;
        
                $csv = $datos[0];
                    if ($csv == '0') {
                            $variable0 += 1;
                        } elseif ($csv == '1'){
                            $variable1 +=1;
                        }
        
                        elseif ($csv == '2'){
                            $variable2 +=1;
                        }
        
                        elseif ($csv == '3'){
                            $variable3 +=1;
                        }
        
                        elseif ($csv == '4'){
                            $variable4 +=1;
                        }
        
                        elseif ($csv == '5'){
                            $variable5 +=1;
                        }
                }

                $d_encabezados = array();
                $d_datos = array();

                $d_encabezados = fgetcsv($handle, 0, ',', '"', '"');
                $d_datos = fgetcsv($handle, ',', '"', '"');

                ?>

        <script>

            var datos = {

                labels: [
                    '<?php echo $d_encabezados[0]; ?>',
                    '<?php echo $d_encabezados[1]; ?>',
                    '<?php echo $d_encabezados[2]; ?>',
                    '<?php echo $d_encabezados[3]; ?>',
                    '<?php echo $d_encabezados[4]; ?>',
                    '<?php echo $d_encabezados[5]; ?>',

                ],
                
                series: [{
                    name: 'serie-1',
                    data: [
                        <?php echo $variable0; ?>,
                        <?php echo $variable1; ?>,
                        <?php echo $variable2; ?>,
                        <?php echo $variable3; ?>,
                        <?php echo $variable4; ?>,
                        <?php echo $variable5; ?>,
                    ]
                
                }]
            };

            var opciones = {
                fullWidth: true,
                seriesBarDistance: 30,
                chartPadding: {
                    bottom: 40
                },

                axisX: {
                    position: 'start'
                },

                axisY: {
                    type: Chartist.FixedScaleAxis,
                    ticks: [0, 2500, 5000, 7500, 10000, 12500],
                    high: 12500,
                }
            };

            var opcionesResponsive = [
                ['screen and (min-width: 641px) and (max-width: 1024px)', {
                    axisX: {
                        labelInterpolationFnc: function(value) {
                            return value;
                        }
                    }
                }],
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function(value) {
                            return value[0];
                        }
                    }
                }]
            ];

            new Chartist.Line('.ct-chart', datos, opciones, opcionesResponsive);
        </script>
        <caption>
        	<strong>Las familias de la ciudad en la cual se encuesto prefieren tener dos o tres pantallas en sus hogares, son muy pocas son las familias que tienen una o cero pantallas en sus hogares y son aun muchas menos familias que tienen 4 o 5 pantallas.
        	</strong>
        </caption>
</div>
</body>
</html>