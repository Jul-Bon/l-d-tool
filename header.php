<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package l-d-tool-test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'l-d-tool-test'); ?></a>

    <header id="masthead" class="site-header">

        <div class="site-header__branding container">
            <h1 class="main_title"><?php the_custom_logo(); ?></h1>
            <ul class="site-header__contacts">
                <li class="site-header__contact-item">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span class="site-header__contact-item-value"><?php echo get_theme_mod('phone_label'); ?></span>
                    <a href="tel:<?php echo get_theme_mod('phone_number'); ?>">
                        <?php echo get_theme_mod('phone_number'); ?>
                    </a>
                </li>
                <li class="site-header__contact-item">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span class="site-header__contact-item-value"><?php echo get_theme_mod('email_label'); ?></span>
                    <a href="mailto:<?php echo get_theme_mod('email_value'); ?>">
                        <?php echo get_theme_mod('email_value'); ?>
                    </a>
                </li>
            </ul>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="site-header__navigation">
            <div class="container">
                <div class="main_menu">
                    <a class="menu_toggle" href="#" aria-controls="primary-menu"
                       aria-expanded="false"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'primary-menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_class' => 'menu',
                    ));
                    ?>
                </div>
                <div id="header-button">
                    <?php if (get_theme_mod('button_display', 'show') == 'show') : ?>
                        <a class="header__button button" href="<?php echo get_theme_mod('url_get_button'); ?>">
                            <?php echo get_theme_mod('get_button'); ?>
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </nav><!-- #site-navigation -->

    </header><!-- #masthead -->

    <div id="content" class="site-content">
