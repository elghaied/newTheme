<?php get_header(); ?>
<div id="maincontent">
    <?php if ( have_posts() ) { ?>
        <h1>Résultats de la recherche : <?php the_search_query(); ?></h1>
        <?php global $wp_query; ?>
        <p><?php echo $wp_query->found_posts; ?> contenus trouvés.</p>
        <?php while ( have_posts() ) {
            the_post(); ?>
            <?php get_template_part('template-parts/posts-list'); ?>
        <?php }
        // posts_nav_link(' // ', 'Nouveaux articles la classe', 'Vieux articles perraves');
        the_posts_pagination();
    } else { ?>
        <h1>Aucun résultat</h1>
        <p>Votre recherche n'a retourné aucun résultat. Vous êtes nul !</p>
    <?php } ?>
</div>               
<?php get_sidebar(); ?>
<?php get_footer(); ?>