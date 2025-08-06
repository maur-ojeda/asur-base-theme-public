<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Campos Hero')
    ->where('post_type', '=', 'hero')
    ->add_fields([
        Field::make('checkbox', 'is_visible', 'Mostrar esta sección')
            ->set_option_value('yes')
            ->set_width(50)
            ->set_help_text('Marca esta casilla para que la sección sea visible en la página.'),
            

        Field::make('text', 'hero_button_1_icon', 'Ícono Botón 1 (ej: arrow-right)'),
        Field::make('text', 'hero_button_1_text', 'Texto Botón 1'),
        Field::make('text', 'hero_button_1_link', 'Enlace Botón 1'),
        Field::make('text', 'hero_button_2_icon', 'Ícono Botón 2 (ej: mail)'),
        Field::make('text', 'hero_button_2_text', 'Texto Botón 2'),
        Field::make('text', 'hero_button_2_link', 'Enlace Botón 2'),
    
        Field::make('select', 'hero_overlay_opacity', 'Nivel de opacidad')
    ->add_options([
        '' => 'Selecciona una opacidad',
        'opacity-25' => '25%',
        'opacity-50' => '50%',
        'opacity-75' => '75%',
        'opacity-100' => '100%',
    ])
    ->set_width(50),

        Field::make('color', 'hero_background_color', 'Color de fondo')
    ->set_palette(['#ffffff', '#000000'])
    ->set_help_text('Este color se usará como mascara de fondo ')
    ->set_width(50),    
        Field::make('image', 'hero_background_image', 'Imagen de fondo')
            ->set_value_type('url'),
    ]);



    

    