<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

    Container::make('term_meta', 'Información de Línea de Producto')
        ->where('term_taxonomy', '=', 'linea_producto')
        ->add_fields([
            Field::make('image', 'linea_producto_imagen', 'Imagen de la Línea de Producto')->set_value_type('url'),                
            Field::make('rich_text', 'linea_producto_descripcion', 'Descripción de la Línea de Producto')
        ]);



