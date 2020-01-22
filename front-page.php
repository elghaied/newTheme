<?php get_header(); ?>
    <?php if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); ?>
            <article class="post">

            <div class="full">
                <?php if (get_field("title_front")){  ?>
                <h1><?php  the_field("title_front"); ?> </h1>
                
                <?php } ?>


            </div>
            <div class="full">

            <div class="half">
            <?php if (get_field("list_heading_front")){  ?>
                <h2><?php  the_field("list_heading_front"); ?> </h2>
                
                <?php } ?>
                <ol>
                
                <?php if( have_rows('list_content_front') ){ ?>

                                

            <?php while( have_rows('list_content_front') ){ the_row(); 


                // vars
                $list = get_sub_field('list_front');
             

                ?>

                <li class="review-section">
                <?php if ($list){  ?>
                <p> <?php  the_sub_field('list_front'); ?> </p>
                <?php } ?>
            
                </li>

                <?php } ?>



                <?php } ?>
                            
                </ol>

            <?php if (get_field("readmore_front")){  ?>
              
              <p> <a class="boutonaction" href="<?php  the_field("readmore_front"); ?>"> Essayez maintenant </a> </p>
              <?php } ?>


            </div>

            <div class="half illustration">
            
            <?php 
                $image = get_field('image_front');
                $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                } ?>

            </div>
            
            </div>

            <div class="full">
            

            <?php if (get_field("gallery_heading_front")){  ?>
              
              <h2><?php  the_field("gallery_heading_front"); ?> </h2>

               <?php } ?>


            </div>
                
                
               

                 <!-- images section -->

                 <?php if( have_rows('gallery_front') ){ ?>

                <ul class="logo-medias">               

                 <?php while( have_rows('gallery_front') ){ the_row(); 


                // vars
                $gallery = get_sub_field('gallery_image_front');
            

                ?>

                <li class="review-section">
                <?php if ($gallery){  ?>
                <a> <?php  
                    echo wp_get_attachment_image( $gallery, $size );
            
                    ?> </a>
                <?php } ?>

                </li>

                <?php } ?>

                </ul>  

                <?php } ?>
                            
               
            </article>

        <?php }
    } else { ?>
        <h1>Ce produit n'existe pas !</h1>
    <?php } ?>
<?php get_footer(); ?>