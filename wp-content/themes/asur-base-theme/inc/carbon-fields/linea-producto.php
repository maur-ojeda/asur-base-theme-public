<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

    Container::make('term_meta', 'Información de Línea de Producto')
         ->where( 'term_taxonomy', 'IN', array( 
            'linea_producto', 
            'familia_producto', 
            'tecnologia', 
            'industria',
            'fabricante' 
        ) ) 
        ->add_fields([
            Field::make('image', 'linea_producto_imagen', 'Imagen')->set_value_type('url'),                
            Field::make('rich_text', 'linea_producto_descripcion', 'Descripción ')
        ]);


        


