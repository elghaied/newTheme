<?php get_header(); ?>
<div id="maincontent">
    <?php if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); ?>
            <article class="post">
                <?php the_post_thumbnail('blog-thumbnail', [ 'class' => 'alignright']); ?>
                <h1><?php the_title(); ?></h1>
                <p class="meta">Article publié le <?php echo get_the_date(); ?></p>
                <?php the_content(); ?>
            </article>
        <?php }
    } else { ?>
        <h1>Pas d'article ici !</h1>
    <?php } ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>