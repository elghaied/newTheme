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
add_image_size( 'logo-size', 400, 100, true);
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
        'name' => 'Books',
        'all_items' => 'All books',  // affiché dans le sous menu
        'singular_name' => 'Books',
        'add_new_item' => 'add a book',
        'edit_item' => 'modify the book',
        'menu_name' => 'Books'
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'menu_position' => 20, 
        'menu_icon' => 'dashicons-book-alt',
	);

    register_post_type( 'bidule', $args );
    

	 $labels = array(
        'name' => 'Book geners',
        'new_item_name' => 'name of the new book',
    	'parent_item' => 'Type of the parent book',
    );
    
    $args = array( 
        'labels' => $labels,
        'public' => true, 
        'show_in_rest' => true,
        'hierarchical' => true, 
        'meta_box_cb' => false, // to delet the meta box field in the wp admin menu 
    );

    register_taxonomy( 'truc', 'bidule', $args );
}
add_action( 'init', 'mpe_register_post_types' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}


// wp query

function my_fquery($wp_query) {

    // 1. on défini ce que l'on veut
    $args = array(
    'post_type' => 'post',
    'category_name' => 'catz',
    'posts_per_page' => 10,
);

    // 2. on exécute la query
    $my_query = new WP_Query($args);

    // 3. on lance la boucle !
    if($my_query->have_posts()) {
     while ($my_query->have_posts() ) {
         $my_query->the_post();
        ?>
        <div class="half">
         <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
         <?php the_post_thumbnail('blog-thumbnail', [ 'class' => 'featured']); ?>
     </a>
     <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?> </a>
        </div>
<?php

     };
    };

// 4. On réinitialise à la requête principale (important)
wp_reset_postdata();
}