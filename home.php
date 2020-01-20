<?php get_header(); ?>
<div id="maincontent">
    <?php if ( have_posts() ) { ?>
        <h1>Le blog de Petite Entreprise</h1>
        <?php while ( have_posts() ) {
            the_post(); ?>
            <?php get_template_part('template-parts/posts-list'); ?>
        <?php }
        // posts_nav_link(' // ', 'Nouveaux articles la classe', 'Vieux articles perraves');
        the_posts_pagination();
    } else { ?>
        <h1>Pas de blog !!</h1>
        <p>Pierre-Yves n'a pas fait son travail ! Il n'a pas rédigé d'articles !</p>
    <?php } ?>
</div>               
<?php get_sidebar(); ?>
<?php get_footer(); ?>