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
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.1', 'all');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.1', 'all');
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.5', 'all');


    wp_enqueue_script('jssor', get_template_directory_uri() . '/js/jssor.slider-27.4.0.min.js', array('jquery'), 1.1, true);
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

    // Function add custom post type slider
    if (get_field('slider_default', 'option') == true):
        function create_custom_post_type()
        {

            /*
             * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
             */
            $label = array(
                'name' => 'Sliders', //Tên post type dạng số nhiều
                'singular_name' => 'slider' //Tên post type dạng số ít
            );

            /*
             * Biến $args là những tham số quan trọng trong Post Type
             */
            $args = array(
                'labels' => $label, //Gọi các label trong biến $label ở trên
                'description' => 'Post type for slider', //Mô tả của post type
                'supports' => array(
                    'title',
//            'editor',
//            'excerpt',
//            'author',
//            'thumbnail',
//            'comments',
//            'trackbacks',
//            'revisions',
                    'custom-fields'
                ), //Các tính năng được hỗ trợ trong post type
                'taxonomies' => array(), //Các taxonomy được phép sử dụng để phân loại nội dung
                'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
                'public' => false, //Kích hoạt post type
                'show_ui' => true, //Hiển thị khung quản trị như Post/Page
                'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
                'show_in_nav_menus' => false, //Hiển thị trong Appearance -> Menus
                'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
                'menu_position' => 80, //Thứ tự vị trí hiển thị trong menu (tay trái)
                'menu_icon' => 'dashicons-images-alt2', //Đường dẫn tới icon sẽ hiển thị
                'can_export' => true, //Có thể export nội dung bằng Tools -> Export
                'has_archive' => false, //Cho phép lưu trữ (month, date, year)
                'exclude_from_search' => true, //Loại bỏ khỏi kết quả tìm kiếm
                'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
                'capability_type' => 'post' //
            );

            register_post_type('slider', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên

        }

        /* Kích hoạt hàm tạo custom post type */
        add_action('init', 'create_custom_post_type');
    endif;

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

    if ($typenow == 'slider') {
        echo '<script type="text/javascript">
        jQuery(document).ready(function(){
             if(jQuery("#slider_default_shortcode input").length){
                jQuery("#slider_default_shortcode input").attr({"value":"[slider_default id=\"' . get_the_ID() . '\"]","readonly":"readonly"});
                jQuery("#slider_default_shortcode input").focus(function(){
                    jQuery(this).select();
                })
            }
        });
        </script>';
    }
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

//Add shortcode slider
function create_shortcode_slider($args, $content)
{
    $id = $args['id'];
    ?>
    <div class="slider slider_primary" data-slideid="jssor_<?php echo $id ?>">
        <div id="jssor_<?php echo $id ?>"
             style="position:relative;margin:0 auto;top:0px;left:0px;width:1920px;height:500px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-004-double-tail-spin"
                 style="position:absolute;top:0px;left:0px;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;"
                     src="<?php echo get_template_directory_uri() ?>/img/double-tail-spin.svg"/>
            </div>
            <div data-u="slides"
                 style="cursor:default;position:relative;top:0px;left:0px;width:1920px;height:500px;overflow:hidden;">
                <?php
                $argsslide = array(
                    'posts_per_page' => 1,
                    'post_type' => 'slider',
                    'post__in' => array($id),
                    'post_status' => 'publish',
                );
                $allslider = new WP_Query($argsslide);
                if ($allslider->have_posts()):while ($allslider->have_posts()): $allslider->the_post();
                    foreach (get_field('slider_item') as $v):
                        ?>
                        <div data-p="303" class="slide-item <?php the_ID(); ?>"
                             data-amnslider="<?php echo $v['amination'] ?>">
                            <img data-u="image" src="<?php echo $v['image_slider'] ?>" class="img-fluid"/>
                        </div>
                    <?php
                    endforeach;
                endwhile;
                endif;
                wp_reset_query(); ?>

            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:12px;right:12px;"
                 data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora094" style="width:50px;height:50px;top:0px;left:30px;"
                 data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                    <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                    <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora094" style="width:50px;height:50px;top:0px;right:30px;"
                 data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                    <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                    <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                </svg>
            </div>
        </div>
    </div>
    <?php
}

add_shortcode('slider_default', 'create_shortcode_slider');

//add column admin slider
add_filter('manage_slider_posts_columns', 'set_custom_edit_slider_columns');
function set_custom_edit_slider_columns($columns)
{
    $columns['shortcode'] = __('Shortcode', 'comma-media');

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action('manage_slider_posts_custom_column', 'custom_slider_column', 10, 2);
function custom_slider_column($column, $post_id)
{
    switch ($column) {

        case 'shortcode' :
            $terms = get_field('shortcode', $post_id);
            if (is_string($terms))
                echo $terms;
            else
                _e('Empty', 'comma-media');
            break;


    }
}