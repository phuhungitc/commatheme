<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Comma_Media
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <?php
    if(function_exists('get_field')&&get_field('google_analytics','option')==true):
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo wp_trim_words(get_field('id_analytics','option'))?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo wp_trim_words(get_field('id_analytics','option'))?>');
    </script>
    <?php endif;?>
</head>

<body <?php body_class(); ?>>
<header id="head_mobile" class="d-block d-sm-none">
    <div class="logo text-center">
        <a title="<?php _e("home", "comma-media") ?>" href="<?php echo home_url() ?>" class="logo-site logo-center">
            <?php
            if (get_field('logo', 'options')):

                echo '<img src="' . get_field("logo", "options") . '" class="img-fluid">';
            else:
                echo '<img src="' . get_template_directory_uri() . '/images/logo.png" class="img-fluid">';
            endif;
            ?>
        </a>
    </div>
</header>
<div class="menumobile d-block d-sm-none">
    <div class="menu-arrow"><i class="fa fa-bars" aria-hidden="true"></i></div>
    <?php if (get_field('variation', 'option') == 2):
        wp_nav_menu(array(
            'menu' => 'menu-left',
            'theme_location' => 'menu-left',
            'menu_class' => 'list-unstyled text-center',
            'container' => '',
        ));
        wp_nav_menu(array(
            'menu' => 'menu-right',
            'theme_location' => 'menu-right',
            'menu_class' => 'list-unstyled text-center',
            'container' => '',
        ));

    else:
        wp_nav_menu(array(
            'menu' => 'menu-1',
            'theme_location' => 'menu-1',
            'menu_class' => 'list-unstyled text-center',
            'container' => '',
        ));
    endif;
    ?>
</div>
<div class="all-element">
    <div id="page" class="site">
        <header id="masthead"
                class="site-header d-none d-sm-block <?php echo (get_field('fixed_on_scroll', 'option') == true) ? 'sticky-top' : ''; ?>">
            <div class="container">
                <div class="row">
                    <?php if (get_field('variation', 'option') == 2): ?>
                        <div class="col">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'menu-left',
                                        'menu_id' => 'menu-left',
                                        'menu_class' => 'navbar-nav',
                                    ));
                                    ?>
                                </div>
                            </nav>
                        </div>
                        <div class="col-sm-3 text-center">
                            <a title="<?php _e("home", "comma-media") ?>" href="<?php echo home_url() ?>"
                               class="logo-site logo-center">
                                <figure>
                                    <?php
                                    if (get_field('logo', 'options')):

                                        echo '<img src="' . get_field("logo", "options") . '" class="img-fluid">';
                                    else:
                                        echo '<img src="' . get_template_directory_uri() . '/images/logo.png" class="img-fluid">';
                                    endif;
                                    ?>
                                </figure>

                            </a>
                        </div>
                        <div class="col">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbarSupportedContent2"
                                            aria-controls="navbarSupportedContent2" aria-expanded="false"
                                            aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent2">
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location' => 'menu-right',
                                            'menu_id' => 'menu-right',
                                            'menu_class' => 'navbar-nav mx-auto',
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    <?php else: ?>
                        <div class="col-sm-3">
                            <a title="<?php _e("home", "comma-media") ?>" href="<?php echo home_url() ?>"
                               class="logo-site">
                                <figure>
                                    <?php
                                    if (get_field('logo', 'options')):

                                        echo '<img src="' . get_field("logo", "options") . '" class="img-fluid">';
                                    else:
                                        echo '<img src="' . get_template_directory_uri() . '/images/logo.png" class="img-fluid">';
                                    endif;
                                    ?>
                                </figure>

                            </a>
                        </div>
                        <div class="col-sm-9">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto"></ul>
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'menu-1',
                                        'menu_id' => 'menu-1',
                                        'menu_class' => 'navbar-nav ml-auto',
                                    ));

                                    ?>

                                </div>
                            </nav>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </header><!-- #masthead -->

        <div id="content" class="site-content">
