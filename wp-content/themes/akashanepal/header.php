<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package akashanepal
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    	<?php
        if(is_front_page()) {
          bloginfo( 'name' ); ?> |
            <?php bloginfo('description');
        } else {
          global $page, $paged;
          wp_title( '-', true, 'right' );
        ?> |
            <?php bloginfo('description'); 
        } ?>
    </title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    <header class="header">
        <div class="header-wrap">
            <div class="container">
                <div class="header-top d-flex">
                	<?php wp_nav_menu( array( 
					            'theme_location' => 'top-menu',
					            'menu_class'=>'inline-list ms-auto mb-0',
					            'container'=>'ul',
					            ) ); ?>
                </div>
            </div>
            <div class="header-main d-flex align-items-center">
                <div class="container">
                    <div class="logo">
                    	<?php $header_logo_arr = get_field('_main_logo', 'option');
                    	if($header_logo_arr):
												if(is_front_page()): ?>
	                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	                            <img src="<?php echo $header_logo_arr['url'];?>"
	                                alt="<?php echo $header_logo_arr['alt'];?>">
	                        </a>
	                      <?php else: ?>
	                        <h2>
	                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	                                <img src="<?php echo $header_logo_arr['url'];?>"
	                                    alt="<?php echo $header_logo_arr['alt'];?>">
	                            </a>
	                        </h2>
	                      <?php endif;
                    	endif; ?>
                    </div>
                    <nav class="header-main__nav ms-auto">
                    	<?php wp_nav_menu( array( 
						            'theme_location' => 'primary-nav',
						            'menu_class'=>'inline-list mb-0',
						            'container'=>'ul',
						            'container_class'=>'inline-list mb-0',
						            ) ); ?>
										</nav>
                    <?php $header_link = get_field('_header_link', 'option'); ?>
                    <div class="header-main__misc">
                        <a href="<?php echo $header_link; ?>" class="btn btn-outline-dark">Apply</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        </div>
    </header>
