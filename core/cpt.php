<?php
// Register Car Post Type
function register_cpt_Cars() {
	$cpt_singular_capital   = 'car'; 
	$cpt_plural_capital     = 'cars';
	$cpt_singular_lowercase = 'car';
	$cpt_plural_lowercase   = 'cars';

	$cpt_register_key = 'car'; 
	$cpt_slug         = 'car';  

	$labels = array(
		'name'                  => _x( 'Cars', 'Post type general name', 'databook_td' ),
		'singular_name'         => _x( 'Car', 'Post type singular name', 'databook_td' ),
		'menu_name'             => _x( 'Cars', 'Admin Menu text', 'databook_td' ),
		'name_admin_bar'        => _x( 'Car', 'Add New on Toolbar', 'databook_td' ),
		'add_new'               => __( 'Add New ', 'databook_td' ),
		'add_new_item'          => __( 'Add New ' . 'Car', 'databook_td' ),
		'new_item'              => __( 'New ' . 'Car', 'databook_td' ),
		'edit_item'             => __( 'Edit ' . 'Car', 'databook_td' ),
		'update_item'           => __( 'Update ' . 'Car', 'databook_td' ),
		'view_item'             => __( 'View  ' . 'Car', 'databook_td' ),
		'view_items'            => __( 'View  ' . 'Cars', 'databook_td' ),
		'all_items'             => __( 'All ' . 'Cars', 'databook_td' ),
		'search_items'          => __( 'Search ' . 'Cars', 'databook_td' ),
		'parent_item_colon'     => __( 'Parent: ' . 'Car', 'databook_td' ),
		'not_found'             => __( 'No ' . 'Cars' . ' found.', 'databook_td' ),
		'not_found_in_trash'    => __( 'No ' . 'Cars' . ' found in Trash.', 'databook_td' ),
		'featured_image'        => _x( 'Car' . ' Featured Image', 'Overrides the “Featured Image” phrase.', 'databook_td' ),
		'set_featured_image'    => _x( 'Set featured image', 'Overrides the “Set featured image” phrase.', 'databook_td' ),
		'remove_featured_image' => _x( 'Remove ' . 'Car' . ' image', 'Overrides the “Remove featured image” phrase.', 'databook_td' ),
		'use_featured_image'    => _x( 'Use as ' . 'Car' . ' image', 'Overrides the “Use as featured image” phrase.', 'databook_td' ),
		'archives'              => _x( 'Car' . ' archives', 'The post type archive label used in nav menus.', 'databook_td' ),
		'attributes'            => _x( 'Car' . ' attributes', 'The post type attributes label.', 'databook_td' ),
		'insert_into_item'      => _x( 'Insert into ' . 'Car', 'Overrides the “Insert into post” phrase.', 'databook_td' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this ' . 'Car', 'Overrides the “Uploaded to this post” phrase.', 'databook_td' ),
		'filter_items_list'     => _x( 'Filter ' . 'Cars' . ' list', 'Screen reader text for the filter links.', 'databook_td' ),
		'items_list_navigation' => _x( 'Cars' . ' list navigation', 'Screen reader text for the pagination.', 'databook_td' ),
		'items_list'            => _x( 'Cars' . ' list', 'Screen reader text for the items list.', 'databook_td' ),
	);
	$args   = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_position'      => null,
		'map_meta_cap'       => true,
		'show_in_rest'       => true,
		'supports'           => array( 'editor', 'title', 'thumbnail' ),
		'capability_type'    => 'page', 
		'has_archive'        => true, 
		'hierarchical'       => true, 
		'menu_icon'          => 'dashicons-car',
		'rewrite'            => array(
			
			'slug'       => $cpt_slug,
			'with_front' => true,
		),

	);
	register_post_type( $cpt_register_key, $args );
}
add_action( 'init', 'register_cpt_Cars' );

// Register Make taxonomy

function cars_make_taxonomy() {

	$tax_parent       = 'car'; 
	$tax_register_key = 'cars_make';
	$tax_slug         = 'cars_make';

	$labels = array(
		'name'                       => _x( 'Make', 'Taxonomy General Name', 'databook_td' ),
		'singular_name'              => _x( 'Make', 'Taxonomy Singular Name', 'databook_td' ),
		'menu_name'                  => __( 'Make', 'databook_td' ),
		'all_items'                  => __( 'All Items', 'databook_td' ),
		'parent_item'                => __( 'Parent Item', 'databook_td' ),
		'parent_item_colon'          => __( 'Parent Item:', 'databook_td' ),
		'new_item_name'              => __( 'New Item Name', 'databook_td' ),
		'add_new_item'               => __( 'Add New Item', 'databook_td' ),
		'edit_item'                  => __( 'Edit Item', 'databook_td' ),
		'update_item'                => __( 'Update Item', 'databook_td' ),
		'view_item'                  => __( 'View Item', 'databook_td' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'databook_td' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'databook_td' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'databook_td' ),
		'popular_items'              => __( 'Popular Items', 'databook_td' ),
		'search_items'               => __( 'Search Items', 'databook_td' ),
		'not_found'                  => __( 'Not Found', 'databook_td' ),
		'no_terms'                   => __( 'No items', 'databook_td' ),
		'items_list'                 => __( 'Items list', 'databook_td' ),
		'items_list_navigation'      => __( 'Items list navigation', 'databook_td' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'query_var'         => true,
		'meta_box_cb'       => false,
		'rewrite'           => array(
			"rewrite" => "hierarchical",
			'slug'       => $tax_slug,
			'with_front' => false, 
		),
	);
	register_taxonomy( $tax_register_key, array( $tax_parent ), $args );

}

add_action( 'init', 'cars_make_taxonomy', 0 );

// Register Model taxonomy

function cars_model_taxonomy() {

	$tax_parent       = 'car'; 
	$tax_register_key = 'cars_model';
	$tax_slug         = 'cars_model';

	$labels = array(
		'name'                       => _x( 'Model', 'Taxonomy General Name', 'databook_td' ),
		'singular_name'              => _x( 'Model', 'Taxonomy Singular Name', 'databook_td' ),
		'menu_name'                  => __( 'Model', 'databook_td' ),
		'all_items'                  => __( 'All Items', 'databook_td' ),
		'parent_item'                => __( 'Parent Item', 'databook_td' ),
		'parent_item_colon'          => __( 'Parent Item:', 'databook_td' ),
		'new_item_name'              => __( 'New Item Name', 'databook_td' ),
		'add_new_item'               => __( 'Add New Item', 'databook_td' ),
		'edit_item'                  => __( 'Edit Item', 'databook_td' ),
		'update_item'                => __( 'Update Item', 'databook_td' ),
		'view_item'                  => __( 'View Item', 'databook_td' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'databook_td' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'databook_td' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'databook_td' ),
		'popular_items'              => __( 'Popular Items', 'databook_td' ),
		'search_items'               => __( 'Search Items', 'databook_td' ),
		'not_found'                  => __( 'Not Found', 'databook_td' ),
		'no_terms'                   => __( 'No items', 'databook_td' ),
		'items_list'                 => __( 'Items list', 'databook_td' ),
		'items_list_navigation'      => __( 'Items list navigation', 'databook_td' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'query_var'         => true,
		'meta_box_cb'       => false,
		'rewrite'           => array(
			"rewrite" => "hierarchical",
			'slug'       => $tax_slug,
			'with_front' => false, 
		),
	);
	register_taxonomy( $tax_register_key, array( $tax_parent ), $args );

}

add_action( 'init', 'cars_model_taxonomy', 0 );

// Register Year taxonomy

function cars_year_taxonomy() {

	$tax_parent       = 'car'; 
	$tax_register_key = 'cars_year';
	$tax_slug         = 'cars_year';

	$labels = array(
		'name'                       => _x( 'Year', 'Taxonomy General Name', 'databook_td' ),
		'singular_name'              => _x( 'Year', 'Taxonomy Singular Name', 'databook_td' ),
		'menu_name'                  => __( 'Year', 'databook_td' ),
		'all_items'                  => __( 'All Items', 'databook_td' ),
		'parent_item'                => __( 'Parent Item', 'databook_td' ),
		'parent_item_colon'          => __( 'Parent Item:', 'databook_td' ),
		'new_item_name'              => __( 'New Item Name', 'databook_td' ),
		'add_new_item'               => __( 'Add New Item', 'databook_td' ),
		'edit_item'                  => __( 'Edit Item', 'databook_td' ),
		'update_item'                => __( 'Update Item', 'databook_td' ),
		'view_item'                  => __( 'View Item', 'databook_td' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'databook_td' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'databook_td' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'databook_td' ),
		'popular_items'              => __( 'Popular Items', 'databook_td' ),
		'search_items'               => __( 'Search Items', 'databook_td' ),
		'not_found'                  => __( 'Not Found', 'databook_td' ),
		'no_terms'                   => __( 'No items', 'databook_td' ),
		'items_list'                 => __( 'Items list', 'databook_td' ),
		'items_list_navigation'      => __( 'Items list navigation', 'databook_td' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'query_var'         => true,
		'meta_box_cb'       => false,
		'rewrite'           => array(
			"rewrite" => "hierarchical",
			'slug'       => $tax_slug,
			'with_front' => false, 
		),
	);
	register_taxonomy( $tax_register_key, array( $tax_parent ), $args );

}

add_action( 'init', 'cars_year_taxonomy', 0 );

// Register Fuel Type taxonomy

function cars_fuel_type_taxonomy() {

	$tax_parent       = 'car'; 
	$tax_register_key = 'cars_fuel_type';
	$tax_slug         = 'cars_fuel_type';

	$labels = array(
		'name'                       => _x( 'Fuel Type', 'Taxonomy General Name', 'databook_td' ),
		'singular_name'              => _x( 'Fuel Type', 'Taxonomy Singular Name', 'databook_td' ),
		'menu_name'                  => __( 'Fuel Type', 'databook_td' ),
		'all_items'                  => __( 'All Items', 'databook_td' ),
		'parent_item'                => __( 'Parent Item', 'databook_td' ),
		'parent_item_colon'          => __( 'Parent Item:', 'databook_td' ),
		'new_item_name'              => __( 'New Item Name', 'databook_td' ),
		'add_new_item'               => __( 'Add New Item', 'databook_td' ),
		'edit_item'                  => __( 'Edit Item', 'databook_td' ),
		'update_item'                => __( 'Update Item', 'databook_td' ),
		'view_item'                  => __( 'View Item', 'databook_td' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'databook_td' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'databook_td' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'databook_td' ),
		'popular_items'              => __( 'Popular Items', 'databook_td' ),
		'search_items'               => __( 'Search Items', 'databook_td' ),
		'not_found'                  => __( 'Not Found', 'databook_td' ),
		'no_terms'                   => __( 'No items', 'databook_td' ),
		'items_list'                 => __( 'Items list', 'databook_td' ),
		'items_list_navigation'      => __( 'Items list navigation', 'databook_td' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'query_var'         => true,
		'meta_box_cb'       => false,
		'rewrite'           => array(
			"rewrite" => "hierarchical",
			'slug'       => $tax_slug,
			'with_front' => false, 
		),
	);
	register_taxonomy( $tax_register_key, array( $tax_parent ), $args );

}

add_action( 'init', 'cars_fuel_type_taxonomy', 0 );

?>