<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon.png" type="image/png">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="selva-custom-header" class="site-header">
    <div class="container">
        <div class="header-wrapper">
            <!-- Logo -->
            <div class="site-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <span class="logo-text">Selva <i class="logo-italic">Studio</i></span>
                </a>
            </div>

            <!-- Custom Menu Trigger -->
            <?php do_action('selva_header_trigger'); ?>
        </div>
    </div>
</header>

<?php 
// Inject the Mega Menu component right here
get_template_part( 'template-parts/header/mega-menu' ); 
?>

<div id="content" class="site-content">
