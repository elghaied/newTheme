<article class="post">
    <?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail('blog-thumbnail', [ 'class' => 'featured']); ?>
        </a>
    <?php } ?>
    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    <p class="meta">Article publié le <?php echo get_the_date(); ?></p>
    <?php the_author_posts_link(); ?>
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" title="Lire la suite de <?php the_title(); ?>" class="readmore">Lire la suite</a>
</article>