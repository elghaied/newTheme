<?php get_header(); ?>
    <?php if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); ?>
            <article class="post">
                <h1><?php the_title(); ?></h1>
                <?php the_post_thumbnail('large', [ 'class' => 'aligncenter']); ?>
                <?php $term_obj_list = get_the_terms( $post->ID, 'genre' );
                $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name')); ?>
                <p>Genres : <?php echo $terms_string; ?></p>
                <?php the_content(); ?>
            </article>
        <?php }
    } else { ?>
        <h1>Ce produit n'existe pas !</h1>
    <?php } ?>
<?php get_footer(); ?>