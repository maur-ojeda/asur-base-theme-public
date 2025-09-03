<?php
class Bootstrap_5_Walker_Nav_Menu extends Walker_Nav_Menu {
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $dropdown_menu_class = ['dropdown-menu'];

        // Manejar alineación
        foreach ($this->current_item->classes as $class) {
            if (in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }

        // Añadir clase especial para subniveles
        if ($depth > 0) {
            $dropdown_menu_class[] = 'dropdown-submenu';
        }

        $classes = implode(' ', $dropdown_menu_class);
        $output .= "\n$indent<ul class=\"$classes\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $this->current_item = $item;

        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $is_dropdown = in_array('menu-item-has-children', $classes);

        // Clases para el <li>
        $li_classes = ['nav-item'];
        if ($is_dropdown) {
            $li_classes[] = 'dropdown';
        }
        $li_classes = join(' ', array_filter($li_classes));
        $output .= "<li class=\"" . esc_attr($li_classes) . "\">";

        // Atributos del <a>
        $atts = [
            'href'   => !empty($item->url) ? $item->url : '',
            'class'  => 'nav-link'
        ];

        // Ajustar clases y atributos según nivel
        if ($depth > 0 && !$is_dropdown) {
            $atts['class'] = 'dropdown-item';
        } elseif ($depth === 0 && $is_dropdown) {
            $atts['class'] .= ' dropdown-toggle';
            $atts['data-bs-toggle'] = 'dropdown';
            $atts['data-bs-auto-close'] = 'outside'; 
            $atts['aria-expanded'] = 'false';
        } elseif ($depth > 0 && $is_dropdown) {
            // Subnivel con hijos: solo clases, SIN data-bs-toggle
            $atts['class'] = 'dropdown-item dropdown-toggle';
            // Aquí no ponemos data-bs-toggle → lo maneja nuestro JS
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before;
        $item_output .= "<a" . self::build_atts_string($atts) . ">";
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= "</a>";
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    private static function build_atts_string($atts) {
        $str = '';
        foreach ($atts as $key => $value) {
            if ($value) {
                $str .= ' ' . $key . '="' . esc_attr($value) . '"';
            }
        }
        return $str;
    }
}
