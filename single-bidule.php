<?php get_header(); ?>
    <?php if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); ?>
            <article class="post">
                <h1><?php the_title(); ?></h1>
                <?php if (get_field("auteur_book")){  ?>
                <h3> The author : <?php  the_field("auteur_book"); ?> </h3>
                
                <?php } ?>

                <?php if (get_field("geners_book")){  ?>
              
                <p> Genres : <?php  the_field("geners_book"); ?> </p>
                <?php } ?>
                <?php if (get_field("editor_book")){  ?>
              
                 <p> Editor : <?php  the_field("editor_book"); ?> </p>

                  <?php } ?>
                <?php 
                $image = get_field('image_book');
                $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                } ?>

                 <!-- commment section -->

                <?php if( have_rows('review_book') ){ ?>

                    

                <?php while( have_rows('review_book') ){ the_row(); 


                    // vars
                    $name = get_sub_field('review_book_name');
                    $note = get_sub_field('review_book_note');
                    $comment = get_sub_field('review_book_comment');

                    ?>

                    <div class="review-section">
                    <?php if ($name){  ?>
                    <p> The reviewer :<?php  the_sub_field('review_book_name'); ?> </p>
                    <?php } ?>
                    
                    <?php if ($note){  ?>
                    <p> Note : <?php  
                    $note_complet = 10;
                    $note_grey = $note_complet - $note;
                        // $mynote = the_sub_field('review_book_note'); 
                        $mynoteint = intval($note);
                        
                        for ($i=0;$i< $note; $i++){
                            echo ⭐️;
                        }
                        for ($x = 0; $x < $note_grey; $x++){
                            echo '<span class="mystar">★</span>' ;
                        }
                        
                        ?> </p>
                    <?php } ?>

                    <?php if ($comment){  ?>
                    <p> Comment : <?php  the_sub_field('review_book_comment'); ?> </p>
                    <?php } ?>
                    
                    </div>

                    <?php } ?>



                    <?php } ?>


                <?php if (get_field("summery_book")){  ?>
                <h3> The summery : <?php  the_field("summery_book"); ?> </h3>
                <?php } ?>
                <?php the_content(); ?>

               
            </article>

        <?php }
    } else { ?>
        <h1>Ce produit n'existe pas !</h1>
    <?php } ?>
<?php get_footer(); ?>