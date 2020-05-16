<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travcon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2.min.css" rel="stylesheet" /> -->
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/select2.min.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/animate.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/owl.carousel.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/daterangepicker.min.css" rel="stylesheet">
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/magnific-popup.css" rel="stylesheet">
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/slider.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet" type="text/css" />

	<?php wp_head(); ?>
</head>

<body data-color="theme-6" <?php body_class(); ?>>
<?php
  $header_logo = get_field('header_logo', 'option');
  $header_phone = get_field('header_phone', 'option');
  $header_phone_trimmed = str_replace(' ', '', $header_phone);
  $header_email = get_field('header_email', 'option');
  $preloader_image = get_field('preloader_image', 'option');
?>
<div class="preloader-center loading">
      <img src="<?php echo $preloader_image['url']; ?>" class="loading-image" width="auto" height="auto" alt="<?php echo $preloader_image['alt']; ?>">
</div>

  <header class="type-4 hovered color-10">
    <div class="top-header-bar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- <div class="fl">
              <a href="<?php //bloginfo( 'url' ); ?>" class="logo">
                <img src="<?php //echo $header_logo['url']; ?>" width="auto" height="30" alt="<?php //echo $header_logo['alt']; ?>">
              </a>
            </div> -->
            <div class="header-contact">
              <div class="top-header-block phone">
                <a class="color-dark-2-light top-contact" href="tel:<?php echo $header_phone_trimmed; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $header_phone; ?></a>
              </div>
              <div class="top-header-block hidden-xs e-mail">
                <a class="color-dark-2-light top-contact" href="mailto:<?php echo $header_email; ?>"><i class="fa fa-envelope"
                    aria-hidden="true"></i> <?php echo $header_email; ?></a>
              </div>
              <div class="top-header-block visible-xs e-mail">
                <a class="color-dark-2-light top-contact" href="mailto:<?php echo $header_email; ?>"><i class="fa fa-envelope"
                    aria-hidden="true"></i> Email Us</a>
              </div>
            </div>
            <!-- <div class="fr">
              <div class="top-header-block fl card">
              <?php //if( have_rows('header_social', 'option') ): ?>
                <?php //while( have_rows('header_social', 'option') ): the_row(); ?>
                <?php
                  //$header_social_icon = get_sub_field('header_social_icon');
                  //$header_social_link = get_sub_field('header_social_link');
                ?>
                  <a class="top-social" href="<?php //echo $header_social_link; ?>"><?php //echo $header_social_icon; ?></a>
                <?php //endwhile; ?>
              <?php //endif; ?>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="nav">
            <a href="<?php bloginfo( 'url' ); ?>" class="logo">
              <img src="<?php echo $header_logo['url']; ?>" width="auto" height="50" alt="<?php echo $header_logo['alt']; ?>">
            </a>
            <div class="nav-menu-icon">
              <a href="#"><i></i></a>
            </div>
            <nav class="menu">
              <?php
							$args = array(
									'menu' => 'main-menu',
                  'container' => 'false',
							);
              wp_nav_menu($args);
						?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
