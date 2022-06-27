<?php

    function ziffity_files(){
        wp_enqueue_style('custom-goole-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('ziffity_main_styles',get_theme_file_uri('/build/style-index.css'));
        wp_enqueue_style('ziffity_extra_styles',get_theme_file_uri('/build/index.css'));
        wp_enqueue_style('bootstrapcdn', '//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        wp_enqueue_style('styletheme', get_template_directory_uri() . '/css/style.css');
        wp_enqueue_style('custom_font', '//fonts.googleapis.com/css?family=Poppins:100,300,500,600');
        wp_enqueue_style('main_style', get_stylesheet_uri());

        wp_enqueue_script('jQuerycdn', '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js' );
        wp_enqueue_script('bootstrap_js', '//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
        wp_enqueue_script('popper_js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
        wp_enqueue_script('isotop', '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js', array('jquery'));
        wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js' );
        wp_enqueue_script('jquery');
    }
    
    add_action('wp_enqueue_scripts','ziffity_files');

    add_theme_support('post-thumbnails');
//tests
function tests_init() {
	$labels = array(
		'name'                => _x( 'tests', 'Post Type General Name', 'domain' ),
		'singular_name'       => _x( 'tests', 'Post Type Singular Name', 'domain' ),
		'menu_name'           => __( 'tests', 'domain' ),
		'parent_item_colon'   => __( 'Parent tests', 'domain' ),
		'all_items'           => __( 'All tests', 'domain' ),
		'view_item'           => __( 'View tests', 'domain' ),
		'add_new_item'        => __( 'Add New tests', 'domain' ),
		'add_new'             => __( 'Add New', 'domain' ),
		'edit_item'           => __( 'Edit tests', 'domain' ),
		'update_item'         => __( 'Update tests', 'domain' ),
		'search_items'        => __( 'Search tests', 'domain' ),
		'not_found'           => __( 'Not Found', 'domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'domain' ),
	);
	
	$args = array(
		'label'               => __( 'tests', 'domain' ),
		'description'         => __( 'tests news and reviews', 'domain' ),
		'labels'              => $labels,		
		'supports'            => array( 'title', 'editor', 'excerpt','author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),		
        'taxonomies'          => array( 'tests','category' ),	
		'hierarchical'        => false,
        'public'              => true,
        'show_in_rest'        => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

    $labels = array(
        'name' => __('Category'),
        'singular_name' => __('Category'),
        'search_items' => __('Search'),
        'popular_items' => __('More Used'),
        'all_items' => __('All Categories'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Add new'),
        'update_item' => __('Update'),
        'add_new_item' => __('Add new Category'),
        'new_item_name' => __('New')
    );
    register_taxonomy('tests_category', array('tests'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'singular_label' => 'tests_category',
		'all_items' => 'Category',
		'query_var' => true,
		'rewrite' => array('slug' => 'cat'))
    );
	register_post_type( 'tests', $args );
}
add_action( 'init', 'tests_init', 0 );
?>