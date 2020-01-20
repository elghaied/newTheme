<?php get_header(); ?>
    <?php if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); ?>
            <article class="post">
                <?php if ( !is_front_page() ) {
                    the_post_thumbnail('blog-thumbnail', [ 'class' => 'aligncenter']); ?>
                    <h1><?php the_title(); ?></h1>
                <?php }
                the_content(); ?>
            </article>
        <?php }
    } else { ?>
        <h1>Pas de page ici !</h1>
    <?php } ?>
<?php get_footer(); ?>