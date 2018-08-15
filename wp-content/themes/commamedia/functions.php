<?php
/**
 * Comma Media functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Comma_Media
 */

if (!function_exists('Comma_Media_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function Comma_Media_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Comma Media, use a find and replace
         * to change 'comma-media' to the name of your theme in all the template files.
         */
        load_theme_textdomain('comma-media', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'comma-media'),
            'menu-left' => esc_html__('Left menu', 'comma-media'),
            'menu-right' => esc_html__('Right menu', 'comma-media'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('Comma_Media_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'Comma_Media_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function Comma_Media_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('Comma_Media_content_width', 640);
}

add_action('after_setup_theme', 'Comma_Media_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function Comma_Media_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'comma-media'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'comma-media'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'comma-media'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'comma-media'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'comma-media'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'comma-media'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'comma-media'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'comma-media'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 4', 'comma-media'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'comma-media'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 5', 'comma-media'),
        'id' => 'footer-5',
        'description' => esc_html__('Add widgets here.', 'comma-media'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ));
}

add_action('widgets_init', 'Comma_Media_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function Comma_Media_scripts()
{
    wp_enqueue_style('comma-media-style', get_stylesheet_uri());

    wp_enqueue_script('comma-media-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('comma-media-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'Comma_Media_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

//custom function add css, javascript

function add_theme_scripts()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.1', 'all');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.1', 'all');


    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), 1.5, true);
}

add_action('wp_enqueue_scripts', 'add_theme_scripts', 999);

//Function add theme option
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

}

//Function add post format
add_theme_support('post-formats', array(
    'image',
    'video',
));

//Function add_theme_support('woocommerce');
function magic_code_add_woocommerce_support()
{
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width' => 300,

        'product_grid' => array(
            'default_rows' => 3,
            'min_rows' => 2,
            'max_rows' => 8,
            'default_columns' => 4,
            'min_columns' => 2,
            'max_columns' => 5,
        ),
    ));
}

add_action('after_setup_theme', 'magic_code_add_woocommerce_support');

//Function Change style layout login admin
function my_login_style()
{
    ?>
    <style type="text/css">
        body.login, html {
            background-image: url("<?php echo get_template_directory_uri()?>/images/background_header.jpg");
            background-size: inherit !important;
        }

        body.login div#login h1 {
            background-size: contain;
        }

        body.login h1 a {
            width: 100%;
            background-image: none, url("<?php echo get_template_directory_uri()?>/images/Comma-logo.png");
        }

        body.login #login_error, body.login .message, body.login .success {
            border-left: 4px solid #000;
        }

        body.wp-core-ui .button-primary.focus, body.wp-core-ui .button-primary.hover, body.wp-core-ui .button-primary:focus, body.wp-core-ui .button-primary:hover {
            background: #666;
            border-color: #333;
            color: #fff;
        }

        body.wp-core-ui .button-primary {
            background: #333;
            border-color: #000 #333 #333;
            box-shadow: 0 1px 0 #333;
            border-radius: 0;
            color: #fff;
            text-decoration: none;
            text-shadow: 0 -1px 1px #333, 1px 0 1px #333, 0 1px 1px #333, -1px 0 1px #333;
        }

        body.login input[type="text"]:focus, body.login input[type="search"]:focus, body.login input[type="radio"]:focus, body.login input[type="tel"]:focus, body.login input[type="time"]:focus, body.login input[type="url"]:focus, body.login input[type="week"]:focus, body.login input[type="password"]:focus, body.login input[type="checkbox"]:focus, body.login input[type="color"]:focus, body.login input[type="date"]:focus, body.login input[type="datetime"]:focus, body.login input[type="datetime-local"]:focus, body.login input[type="email"]:focus, body.login input[type="month"]:focus, body.login input[type="number"]:focus, body.login select:focus, body.login textarea:focus {
            box-shadow: none;
            border-color: #ddd;
        }

        body.login #backtoblog a:hover, body.login #nav a:hover, body.login h1 a:hover {
            color: #333;
        }
    </style>
    <?php
}

add_action('login_enqueue_scripts', 'my_login_style');


//Function setting SMTP mail
if (function_exists('get_field')):
    add_action('phpmailer_init', 'configure_smtp');
    function configure_smtp(PHPMailer $phpmailer)
    {
        $phpmailer->isSMTP();
        $phpmailer->Host = get_field('smtp_host', 'option'); // ip hosting, hoặc tên miền
        $phpmailer->SMTPAuth = get_field('authentication', 'option');
        $phpmailer->Port = get_field('smtp_port', 'option');// port mặc định trong email hosting
        $phpmailer->Username = get_field('smtp_username', 'option'); // email của bạn
        $phpmailer->Password = get_field('smtp_password', 'option'); // mật khẩu chứng thực
        $phpmailer->SMTPSecure = get_field('encryption_ssl', 'option');// chứng thực ssl
        $phpmailer->From = get_field('from_email', 'option'); // email người gửi
        $phpmailer->FromName = get_field('from_name', 'option'); // tên người gửi
    }

    //Function breadcrumb
    function wp_breadcrumbs()
    {
        if (get_field('show_breadcrumb', 'option') == true):
            $enable = get_field('show_breadcrumb', 'option');
            (get_field('content_breadcrumb') == true) ? $fullwidth = '<div class="container-fluid">' : $fullwidth = '<div class="container">';
            $endfw = '</div>';
            $background = (get_field("background_breadcrumb")) ? get_field("background_breadcrumb") : get_field("background_breadcrumb", "option");
            $delimiter = ' ';
            $name = '<i class="fa fa-home" aria-hidden="true"></i> Home';
            $currentBefore = '<li class="breadcrumb-item active"><span class="current">';
            $currentAfter = '</span></li></ol>' . $endfw . '</nav>';

            if (!is_home() && !is_front_page() && $enable == true || is_paged()) {

                global $post;
                $home = get_bloginfo('url');
                echo '<nav aria-label="breadcrumb" style="background: url(' . $background . ') no-repeat center center / cover">' . $fullwidth . '<ol class="breadcrumb"><li class="breadcrumb-item"><a href="' . $home . '">' . $name . '</a></li> ' . $delimiter . ' ';

                if (is_tax()) {
                    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                    echo $currentBefore . $term->name . $currentAfter;

                } elseif (is_category()) {
                    global $wp_query;
                    $cat_obj = $wp_query->get_queried_object();
                    $thisCat = $cat_obj->term_id;
                    $thisCat = get_category($thisCat);
                    $parentCat = get_category($thisCat->parent);
                    if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
                    echo $currentBefore . '';
                    single_cat_title();
                    echo '' . $currentAfter;

                } elseif (is_day()) {
                    echo '<li class="breadcrumb-item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
                    echo '<li class="breadcrumb-item"><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
                    echo $currentBefore . get_the_time('d') . $currentAfter;

                } elseif (is_month()) {
                    echo '<li class="breadcrumb-item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
                    echo $currentBefore . get_the_time('F') . $currentAfter;

                } elseif (is_year()) {
                    echo $currentBefore . get_the_time('Y') . $currentAfter;

                } elseif (is_single()) {
                    $postType = get_post_type();
                    if ($postType == 'post') {
                        $cat = get_the_category();
                        $cat = $cat[0];
                        echo '<li class="breadcrumb-item">' . get_category_parents($cat, TRUE, ' ' . $delimiter . '</li> ');
                    } elseif ($postType == 'portfolio') {
                        $terms = get_the_term_list($post->ID, 'portfolio-category', '', '###', '');
                        $terms = explode('###', $terms);
                        echo '<li class="breadcrumb-item">' . $terms[0] . ' ' . $delimiter . '</li> ';
                    }
                    echo $currentBefore;
                    the_title();
                    echo $currentAfter;

                } elseif (is_page() && !$post->post_parent) {
                    echo $currentBefore;
                    the_title();
                    echo $currentAfter;

                } elseif (is_page() && $post->post_parent) {
                    $parent_id = $post->post_parent;
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = '<li class="breadcrumb-item"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
                    echo $currentBefore;
                    the_title();
                    echo $currentAfter;
                } elseif (is_search()) {
                    echo $currentBefore . __('Search Results for:', 'wpinsite') . ' &quot;' . get_search_query() . '&quot;' . $currentAfter;
                } elseif (is_tag()) {
                    echo $currentBefore . __('Post Tagged with:', 'wpinsite') . ' &quot;';
                    single_tag_title();
                    echo '&quot;' . $currentAfter;
                } elseif (is_author()) {
                    global $author;
                    $userdata = get_userdata($author);
                    echo $currentBefore . __('Author Archive', 'wpinsite') . $currentAfter;
                } elseif (is_404()) {
                    echo $currentBefore . __('Page Not Found', 'wpinsite') . $currentAfter;
                }
                if (get_query_var('paged')) {
                    if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
                    echo ' ' . $delimiter . ' ' . __('Page') . ' ' . get_query_var('paged');
                    if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
                }

            } else {
                echo '<div class="space-top"></div>';
            }
        else:
            echo '<div class="space-top"></div>';
        endif;
    }

endif;


//Function required Plugin ACF
require_once dirname(__FILE__) . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'my_plugin_activation');
function my_plugin_activation()
{

    $plugins = array(

        // Gọi một plugin nào đó ở bên ngoài
        array(
            'name' => 'Advanced Custom Fields PRO', // Tên của plugin
            'slug' => 'advanced-custom-fields-pro', // Tên thư mục plugin
            'source' => get_template_directory_uri() . '/plugins/advancedcustomfieldspro 5.6.10.zip', // Link tải plugin - direct link
            'required' => true, // Nếu đặt là true thì plugin này sẽ không bắt buộc phải cài mà chỉ ở dạng Recommend.
            'external_url' => get_template_directory_uri() . '/plugins/advancedcustomfieldspro 5.6.10.zip', // Nếu bạn cài plugin ở bên ngoài, không phải từ WordPress.Org thì thêm URL của trang plugin vào.
        ),
        /*array(
            'name'               => 'Autoptimize', // Tên của plugin
            'slug'               => 'autoptimize', // Tên thư mục plugin
            'source'             => 'https://wordpress.org/plugins/autoptimize/', // Link tải plugin - direct link
            'required'           => false, // Nếu đặt là true thì plugin này sẽ không bắt buộc phải cài mà chỉ ở dạng Recommend.
            'external_url'       => '', // Nếu bạn cài plugin ở bên ngoài, không phải từ WordPress.Org thì thêm URL của trang plugin vào.
        ),*/
        // Gọi một plugin trong thư viện WordPress.org/plugins
        /*   array(
               'name'      => 'BuddyPress',
               'slug'      => 'buddypress', //Tên slug của plugin trên URL
               'required'  => false,
           ),*/

    ); // end $plugins

    $config = array(
        'default_path' => '',
        'menu' => 'required-plugin', // Menu slug.
        'has_notices' => true,                    // Có hiển thị thông báo hay không
        'dismissable' => false,                    // Nếu đặt false thì người dùng không thể hủy thông báo cho đến khi cài hết plugin.
        'dismiss_msg' => 'this plugin is required',                      // Nếu 'dismissable' là false, thì tin nhắn ở đây sẽ hiển thị trên cùng trang Admin.
        'is_automatic' => true,                   // Nếu là false thì plugin sẽ không tự động kích hoạt khi cài xong.
        'message' => '',
        'strings' => array(
            'page_title' => __('Install Required Plugins', 'tgmpa'),
            'menu_title' => __('Install Plugins', 'tgmpa'),
            'installing' => __('Installing Plugin: %s', 'tgmpa'), // %s = plugin name.
            'oops' => __('Something went wrong with the plugin API.', 'tgmpa'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'), // %1$s = plugin name(s).
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'), // %1$s = plugin name(s).
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins'),
            'return' => __('Return to Required Plugins Installer', 'tgmpa'),
            'plugin_activated' => __('Plugin activated successfully.', 'tgmpa'),
            'complete' => __('All plugins installed and activated successfully. %s', 'tgmpa'), // %s = dashboard link.
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    ); // end $config
    tgmpa($plugins, $config);

}

//Script change image demo option theme
function my_enqueue()
{
    global $typenow;
    echo '<script type="text/javascript">
        jQuery(document).ready(function(){
            if(jQuery("#header_varation_1").length){
                jQuery("#header_varation_1").attr("src","' . get_template_directory_uri() . '/images/header-variation-1.png");
            }
            if(jQuery("#header_varation_2").length){
                jQuery("#header_varation_2").attr("src","' . get_template_directory_uri() . '/images/header-variation-2.png");
            }
            
        }); 
        </script>';
}

add_action('admin_head', 'my_enqueue');

//Remove version admin
function change_footer_version()
{
    return ' ';
}

add_filter('update_footer', 'change_footer_version', 9999);

// Admin footer modification

function remove_footer_admin()
{
    echo '<span id="footer-thankyou">Thank you for creating with <a href="http://commamedia.vn" target="_blank">Commamedia</a></span>';
}

add_filter('admin_footer_text', 'remove_footer_admin');

//change menubar wp
function rebranding_wordpress_logo()
{
    global $wp_admin_bar;
    //the following codes is to remove sub menu
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('wporg');


    //and this is to change wordpress logo
    $wp_admin_bar->add_menu(array(
        'id' => 'wp-logo',
        'title' => '<img src="' . get_template_directory_uri() . '/images/comma.svg" style="height: 20px; width:20px; padding: 5px" />',
        'href' => __('http://commamedia.vn'),
        'meta' => array(
            'title' => __('Commamedia'),
            'target' => __('_blank'),
        ),
    ));
}

add_action('wp_before_admin_bar_render', 'rebranding_wordpress_logo');

//remove help option
function oz_remove_help_tabs($old_help, $screen_id, $screen)
{
    $screen->remove_help_tabs();
    return $old_help;
}

add_filter('contextual_help', 'oz_remove_help_tabs', 999, 3);

//remove update WP
if (function_exists('get_field') && get_field('update_wp', 'option') == false) {

    function remove_core_updates()
    {
        global $wp_version;
        return (object)array('last_checked' => time(), 'version_checked' => $wp_version,);
    }

    add_filter('pre_site_transient_update_core', 'remove_core_updates');
    add_filter('pre_site_transient_update_plugins', 'remove_core_updates');
    add_filter('pre_site_transient_update_themes', 'remove_core_updates');
}

// Remove WP admin dashboard widgets
// Remove WP admin dashboard widgets
function isa_disable_dashboard_widgets()
{
    remove_action('welcome_panel', 'wp_welcome_panel');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');// Remove "At a Glance"
    remove_meta_box('dashboard_primary', 'dashboard', 'core');// Remove WordPress Events and News
}

add_action('admin_menu', 'isa_disable_dashboard_widgets');


if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5b5858cbc7475',
        'title' => 'Breadcrumb',
        'fields' => array(
            array(
                'key' => 'field_5b5858dd69894',
                'label' => 'Content breadcrumb',
                'name' => 'content_breadcrumb',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Full width',
                'ui_off_text' => 'Container',
            ),
            array(
                'key' => 'field_5b58593aed170',
                'label' => 'Background breadcrumb',
                'name' => 'background_breadcrumb',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5b5858dd69894',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'full',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5b56f5e05bb8d',
        'title' => 'Theme settings',
        'fields' => array(
            array(
                'key' => 'field_5b57e7a3ecd84',
                'label' => '<span class="dashicons dashicons-admin-tools"></span> General setting',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5b57e805ecd85',
                'label' => 'Show breadcrumb',
                'name' => 'show_breadcrumb',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Show',
                'ui_off_text' => 'Hide',
            ),
            array(
                'key' => 'field_5b58571763f1c',
                'label' => 'Background breadcrumb default',
                'name' => 'background_breadcrumb',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5b57e805ecd85',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'full',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5b5952dc55b27',
                'label' => 'Scroll on top',
                'name' => 'scroll_on_top',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Show',
                'ui_off_text' => 'Hide',
            ),
            array(
                'key' => 'field_5b59530755b28',
                'label' => 'Image for button scroll on top',
                'name' => 'image_for_scroll_on_top',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5b5952dc55b27',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5b598fb2cb7e3',
                'label' => 'Update WP',
                'name' => 'update_wp',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Turn on',
                'ui_off_text' => 'Turn off',
            ),
            array(
                'key' => 'field_5b56f5e92cd6f',
                'label' => '<span class="dashicons dashicons-schedule"></span> Header settings',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5b56f64d3913c',
                'label' => 'Header variation',
                'name' => 'variation',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    1 => 'Variation one',
                    2 => 'Variation two',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_5b588df2fc750',
                'label' => 'Demo',
                'name' => '',
                'type' => 'message',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5b56f64d3913c',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '<img id="header_varation_1" src="" >',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
            ),
            array(
                'key' => 'field_5b588e41fc751',
                'label' => 'Demo',
                'name' => '',
                'type' => 'message',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5b56f64d3913c',
                            'operator' => '==',
                            'value' => '2',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '<img id="header_varation_2" src="" >',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
            ),
            array(
                'key' => 'field_5b56f78ef9346',
                'label' => 'Fixed on scroll',
                'name' => 'fixed_on_scroll',
                'type' => 'true_false',
                'instructions' => 'If enabled, on scroll menu is fixed top',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Enable',
                'ui_off_text' => 'Disable',
            ),
            array(
                'key' => 'field_5b56f7a5f9347',
                'label' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'full',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5b56f9326d5eb',
                'label' => '<span class="dashicons dashicons-archive"></span> Footer settings',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5b56f96b6d5ec',
                'label' => 'Footer variation',
                'name' => 'footer',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    1 => '1 columns',
                    2 => '2 columns',
                    3 => '3 columns',
                    4 => '4 columns',
                    5 => '5 columns',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_5b56f9c44382b',
                'label' => 'Copyright',
                'name' => 'copyright',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'Copyright © 2018 My website. All rights reserved.',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5b57f12a6d993',
                'label' => '<span class="dashicons dashicons-email-alt"></span> SMTP settings',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5b57f1436d994',
                'label' => 'From email',
                'name' => 'from_email',
                'type' => 'email',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'smtpmail.commamedia@gmail.com',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_5b57f2b66d995',
                'label' => 'From name',
                'name' => 'from_name',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5b57f30d6d996',
                'label' => 'SMTP host',
                'name' => 'smtp_host',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'smtp.gmail.com',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5b57f3226d997',
                'label' => 'SMTP port',
                'name' => 'smtp_port',
                'type' => 'number',
                'instructions' => '465 for SSL and 587 for TLS - Port smtp gmail',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_5b57f3616d998',
                'label' => 'Encryption SSL',
                'name' => 'encryption_ssl',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Yes',
                'ui_off_text' => 'No',
            ),
            array(
                'key' => 'field_5b57f44b6d99b',
                'label' => 'Authentication',
                'name' => 'authentication',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Yes',
                'ui_off_text' => 'No',
            ),
            array(
                'key' => 'field_5b57f4286d999',
                'label' => 'SMTP Username',
                'name' => 'smtp_username',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5b57f44b6d99b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'smtpmail.commamedia@gmail.com',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5b57f42d6d99a',
                'label' => 'SMTP Password',
                'name' => 'smtp_password',
                'type' => 'password',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5b57f44b6d99b',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_5b5d31e00231e',
                'label' => '<span class="dashicons dashicons-external"></span> More',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5b5d32280231f',
                'label' => 'Google analytics',
                'name' => 'google_analytics',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Enable',
                'ui_off_text' => 'Disable',
            ),
            array(
                'key' => 'field_5b5d325302320',
                'label' => 'ID analytics',
                'name' => 'id_analytics',
                'type' => 'text',
                'instructions' => 'Ex: UA-123037889-1',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5b5d32280231f',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

endif;