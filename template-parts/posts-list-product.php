<article class="post">
    <?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail('blog-thumbnail', [ 'class' => 'featured']); ?>
        </a>
    <?php } ?>
    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
   

</article>