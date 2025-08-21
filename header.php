<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MyPortfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      	<div class="logo d-flex align-items-center">
		<?php  
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            
          if ( has_custom_logo() ) { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo( 'name' ); ?>" class="img-fluid"></a>
          <?php } else { ?>
            <h1 class="sitename"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
          <?php }
        ?>	
		</div>

      <nav id="navmenu" class="navmenu">
		<?php  
        wp_nav_menu( array(
          'theme_location'  => 'primary',
          'container'       => '',
          'link_before'     => '<span>',
          'link_after'     => '</span>',
          'walker'          => new MyPortfolio_Walker_Menu(),
        ) );
        ?>  
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
</header>


