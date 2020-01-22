<!doctype html>
<html <?php language_attributes(); ?> >
   <head>
    	<meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>
       <?php wp_body_open(); ?>

    	<div id="container">

  			<header>

  				<div id="logo">
  				    
                      <img src="<?php echo get_template_directory_uri(); ?>/img/petite-entreprise.png" alt="Logo" width="400" height="100"/>

                      <?php echo get_search_form(); ?>
  				</div>

  				<!-- <ul id="social">
  				    <li class="icon"><a href="#"><img src="./img/facebook.png" alt="Facebook" width="32" height="32"/></a></div>
  				    <li class="icon"><a href="#"><img src="./img/twitter.png" alt="Twitter" width="32" height="32"/></a></div>
  				    <li class="icon"><a href="#"><img src="./img/youtube.png" alt="Youtube" width="32" height="32"/></a></div>
</ul> -->
<?php if ( is_user_logged_in() ) { ?>
    <p>  <?php 
        $current_user = wp_get_current_user();
        echo 'Bonjour '. $current_user->display_name;?> </p> 
<?php } else { ?>
    <a href="/wp-login.php" title="Members Area Login" rel="home">Members Area</a>
<?php } ?> 

                <?php wp_nav_menu( array(
                    'theme_location'    => 'social',
                    'container'         => '',
                    'menu_id'           => 'social',
                )); ?>  

                <?php wp_nav_menu( array(
                    'theme_location'    => 'main',
                    'container'         => 'nav',
                    'container_id'      => 'navigation',
                    'menu_class'        => 'main-menu'
                )); ?>  

              </header>
              <div id="content">