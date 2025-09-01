<?php
/*
|--------------------------------------------------------------------------
| Relaciones Jerárquicas con Carbon Fields
|--------------------------------------------------------------------------
*/

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Relación: linea_producto -> industria
Container::make('term_meta', 'Relación con padre industrias')
    ->where('term_taxonomy', '=', 'linea_producto')
    ->add_fields([
        Field::make('association', 'crb_industria_parent', 'Industria Padre')
            ->set_types([
                [
                    'type' => 'term',
                    'taxonomy' => 'industria',
                ]
            ])
            ->set_max(1)
    ]);


// Relación: familia_producto -> linea_producto
Container::make('term_meta', 'Relación con padre linea de productos')
    ->where('term_taxonomy', '=', 'familia_producto')
    ->add_fields([
        Field::make('association', 'crb_linea_producto_parent', 'linea_producto Padre')
            ->set_types([
                [
                    'type' => 'term',
                    'taxonomy' => 'linea_producto',
                ]
            ])
            ->set_max(1)
    ]);



    // Relación: linea_producto -> fabricante
Container::make('term_meta', 'Relación con padre linea de productos')
    ->where('term_taxonomy', '=', 'fabricante')
    ->add_fields([
        Field::make('association', 'crb_familia_producto_parent', 'familia_producto Padre')
            ->set_types([
                [
                    'type' => 'term',
                    'taxonomy' => 'familia_producto',
                ]
            ])
            ->set_max(1)
    ]);

    

// Relación: producto -> fabricante
Container::make('post_meta', 'Relación con Fabricante')
    ->where('post_type', '=', 'producto')
    ->add_fields([
        Field::make('association', 'crb_fabricante_parent', 'Fabricante Padre')
            ->set_types([
                [
                    'type' => 'term',
                    'taxonomy' => 'fabricante',
                ]
            ])
            ->set_max(1)
    ]);