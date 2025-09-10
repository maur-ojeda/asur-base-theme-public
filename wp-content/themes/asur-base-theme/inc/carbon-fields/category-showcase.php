<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Opciones de Destacado')
    ->where('post_type', '=', 'category-showcase')
    ->add_fields([
        // Este campo ordena el post completo
        Field::make('text', 'orden_bloque', 'Orden de Bloque')
            ->set_attribute('type', 'number')
            ->set_attribute('min', '1')
            ->set_help_text('Asigna un número para ordenar este bloque en la página de inicio.'),
            
        // Este campo agrupa los elementos internos
        Field::make('complex', 'crb_destacados_agrupados', 'Destacados Agrupados')
            ->set_help_text('Agrega los bloques destacados para esta sección.')
            ->add_fields([
                Field::make('association', 'taxonomia_destacada', 'Taxonomía de Industria')
                    ->set_types([
                        [
                            'type'     => 'term',
                            'taxonomy' => 'industria',
                        ],
                    ]),
                Field::make('image', 'image', 'Imagen de fondo'),
                Field::make('color', 'title_color', 'Color de fondo')
                    ->set_palette(['#ffffff', '#000000'])
                    ->set_help_text('Este color se usará para el título de la sección.')
                    ->set_width(50),        
            ]),
        
    ]);