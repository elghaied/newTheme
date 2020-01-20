<?php get_header(); ?>
    <?php if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); ?>
            <article class="post">
                <h1><?php the_title(); ?></h1>
                <?php the_post_thumbnail('large', [ 'class' => 'aligncenter']); ?>
                <?php the_content(); ?>
            </article>
        <?php }
    } else { ?>
        <h1>this taxonomy doesn't exist</h1>
    <?php } ?>
<?php get_footer(); ?>