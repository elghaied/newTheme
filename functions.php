<?php
/* NB : On ne ferme jamais la 'balise' <?php à la fin de functions.php */

/* Appel des feuilles de style */
function pe_enqueue_stylesheets() {
    wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Alef|Paprika&display=swap', array(), null);
    wp_enqueue_style( 'petite-entreprise', get_template_directory_uri() . '/css/style.css', array('fonts'), null);
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), null, false );
	if (is_front_page() ) {
		wp_enqueue_script( 'script-footer', get_template_directory_uri() . '/js/script-footer.js', array(), null, true );
	}
    
}

add_action( 'wp_enqueue_scripts', 'pe_enqueue_stylesheets' );


/* Ajouter automatiquement le titre du site dans l'en-tête du site */
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

/* add new defult size to wordpress */
add_image_size( 'blog-thumbnail', 200, 200, true);
/* Déclarer des emplacement de menu */
register_nav_menus( array(
    'main'      => 'Menu Principal',
    'social'    => 'Réseaux sociaux'
) );

/* Déclarer des emplacements de widgets ( = sidebar ) */
function my_sidebars() {
    register_sidebar( array(
     
        'id'    => 'footer-sidebar-1',
        'name'  => 'Pied de page #1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'


    ) );
    
    register_sidebar( array(
       
        'id'    => 'footer-sidebar-2',
        'name'  => 'Pied de page #2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ) );
    
    register_sidebar( array(
    
        'id'    => 'footer-sidebar-3',
        'name'  => 'Pied de page #3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ) );
}

add_action('widgets_init', 'my_sidebars');

register_sidebar( array(
       
    'id'    => 'blog-sidebar',
    'name'  => 'blog side bar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
) );

/* Déclaration des CPT (Custom Post Type) */
function mpe_register_post_types() {
    $labels = array(
        'name' => 'Produit',
        'all_items' => 'Tous les produits',  // affiché dans le sous menu
        'singular_name' => 'Produit',
        'add_new_item' => 'Ajouter un produit',
        'edit_item' => 'Modifier le produit',
        'menu_name' => 'Boutique'
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'menu_position' => 20, 
        'menu_icon' => 'dashicons-cart',
	);

	register_post_type( 'bidule', $args );
}
add_action( 'init', 'mpe_register_post_types' );