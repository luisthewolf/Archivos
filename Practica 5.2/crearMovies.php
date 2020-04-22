<?php

    $dom = new DOMDocument();

        $dom->encoding = 'utf-8';

        $dom->xmlVersion = '1.0';

        $dom->formatOutput = true;

    $xml_file_name = 'lista_peliculas.xml';

        $raiz = $dom->createElement('Peliculas');

            $nodo_peli = $dom->createElement('pelicula');

            $attr_peli_id = new DOMAttr('peli_id', '5467');

            $nodo_peli->setAttributeNode($attr_peli_id);

        $child_node_title = $dom->createElement('Titulo', 'La Campaña');

        $nodo_peli->appendChild($child_node_title);

        $nodo_hijo_año = $dom->createElement('Año', 2012);

        $nodo_peli->appendChild($nodo_hijo_año);

        $nodo_hijo_genero = $dom->createElement('Genero', 'Drama');

        $nodo_peli->appendChild($nodo_hijo_genero);

        $child_node_ratings = $dom->createElement('Clasificacion', 'B');

        $nodo_peli->appendChild($child_node_ratings);

    $raiz->appendChild($nodo_peli);

    $dom->appendChild($raiz);

    $dom->save($xml_file_name);

    echo "El archivo: <a href= '$xml_file_name'> $xml_file_name </a> se ha creado con éxito";