<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Comma_Media
 */

get_header();
if (get_field('slider_default', 'option') == true && get_field('shortcode_slider_homepage','option')):
    echo do_shortcode(wp_trim_words(get_field('shortcode_slider_homepage','option')));
endif; ?>
    <div class="<?php echo (get_page_template_slug() == 'page-fullwidth.php') ? 'container-fluid' : 'container' ?>">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php
                wp_breadcrumbs();

                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div>


<?php
get_footer();
