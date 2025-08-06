<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


    Container::make('post_meta', 'Campos de Call to action')
        ->where('post_type', '=', 'call-to-action')
        ->add_fields([

           Field::make('checkbox', 'is_visible', 'Mostrar esta sección')
            ->set_option_value('yes')
            ->set_help_text('Marca esta casilla para que la sección sea visible en la página.'),
            
            Field::make('text', 'cta_link_text', 'Texto de enlace')                
                ->set_width(50),
            Field::make('text', 'cta_link', 'Enlace url')
                ->set_attribute('type', 'url')
                ->set_help_text('Debe ser una URL válida')
                ->set_width(50)
            
        ]);


