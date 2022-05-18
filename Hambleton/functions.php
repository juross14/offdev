<?php
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */

//Drag and drop menu support
register_nav_menu( 'primary', 'Primary Menu' );
//This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );
//Apply do_shortcode() to widgets so that shortcodes will be executed in widgets
add_filter( 'widget_text', 'do_shortcode' );

//Widget support for a right sidebar
register_sidebar( array(
	'name' => 'Right Sidebar',
	'id' => 'right-sidebar',
	'description' => 'Widgets in this area will be shown on the right-hand side.',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

//Widget support for the footer
register_sidebar( array(
	'name' => 'Footer Sidebar',
	'id' => 'footer-sidebar',
	'description' => 'Widgets in this area will be shown in the footer.',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

//Enqueue_styles
if ( ! function_exists( 'Wps_load_styles' ) ) {
function Wps_load_styles() {

	//Enqueue_Bootstrap_Fancy_slick_Styles
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_register_style( 'fancy', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css');
	wp_register_style( 'slick', get_template_directory_uri() . '/assets/css/slick.min.css');

	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'fancy' );
	wp_enqueue_style( 'slick' );

	//Enqueue_Predefined_Theme_CSS
	wp_register_style( 'skeleton-style', get_template_directory_uri() . '/style.css');
	wp_register_style( 'skeleton-base', get_template_directory_uri() . '/stylesheets/base.css');

	wp_enqueue_style( 'skeleton-base' );
	wp_enqueue_style( 'skeleton-style' );


	wp_register_style( 'customcss', get_template_directory_uri() . '/custom.css');
	wp_enqueue_style( 'customcss' );

}
add_action('wp_enqueue_scripts', 'Wps_load_styles');
} // endif

//Enqueue_scripts
if ( ! function_exists( 'Wps_load_scripts' ) ) {
	function Wps_load_scripts() {
	
		//Enqueue_Bootstrap_Fancy_slick_Scripts
		wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js');
		wp_register_script( 'lazyjs', get_template_directory_uri() . '/assets/js/lazyload.min.js');
		
		
		wp_register_script( 'bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', '', '', true);
		wp_register_script( 'fancyjs', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', '', '', true);
		wp_register_script( 'slickjs', get_template_directory_uri() . '/assets/js/slick.min.js', '', '', true);

	
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'lazyjs' );
		wp_enqueue_script( 'bootstrapjs' );
		wp_enqueue_script( 'fancyjs' );
		wp_enqueue_script( 'slickjs' );
		
		wp_register_script( 'customjs', get_template_directory_uri() . '/custom.js', '', '', true);
		wp_enqueue_script( 'customjs' );
	
	
	}
	add_action('wp_enqueue_scripts', 'Wps_load_scripts');
	} // endif
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );


	// bootstrap 5 wp_nav_menu walker
	class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
	{
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
	
	  function start_lvl(&$output, $depth = 0, $args = null)
	  {
		$dropdown_menu_class[] = '';
		foreach($this->current_item->classes as $class) {
		  if(in_array($class, $this->dropdown_menu_alignment_values)) {
			$dropdown_menu_class[] = $class;
		  }
		}
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
	  }
	
	  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	  {
		$this->current_item = $item;
	
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
	
		$li_attributes = '';
		$class_names = $value = '';
	
		$classes = empty($item->classes) ? array() : (array) $item->classes;
	
		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		$classes[] = 'nav-item';
		$classes[] = 'nav-item-' . $item->ID;
		if ($depth && $args->walker->has_children) {
		  $classes[] = 'dropdown-menu dropdown-menu-end';
		}
	
		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = ' class="' . esc_attr($class_names) . '"';
	
		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
	
		$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
	
		$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
	
		$active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
		$nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
		$attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';
	
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
	
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	  }
	}
	// register a new menu
	register_nav_menu('main-menu', 'Main menu');