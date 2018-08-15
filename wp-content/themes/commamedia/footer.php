<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Comma_Media
 */

?>

</div><!-- #content -->

<footer id="footer-site" class="footer-class">
    <div class="container">
        <div class="row">
            <?php $ft_number = get_field('footer', 'option');
            for ($i = 1; $i <= $ft_number; $i++):
                ?>
                <div class="col">
                    <?php dynamic_sidebar('footer-' . $i) ?>
                </div>
            <?php endfor; ?>
        </div>


    </div>
    <div class="container-fluid">
        <div class="site-info">
            <ul class="list-inline">
                <li class="list-inline-item"><span><?php echo get_field('copyright', 'option') ?></span></li>
                <li class="list-inline-item"> <span>
                           <?php
                           /* translators: 1: Theme name, 2: Theme author. */
                           printf(esc_html__('Website by %1$s', 'comma-media'), '<a target="_blank" title="Commamedia" href="http://commamedia.vn">Commamedia</a>');
                           ?></span>
                </li>
            </ul>

        </div><!-- .site-info -->
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->
<?php if (function_exists('get_field') && get_field('scroll_on_top', 'option') == true): ?>
    <div id="goTop" class="scrollToTop">
        <?php if (get_field('image_for_scroll_on_top', 'option')):
            echo '<img alt="' . __("Scroll on top", "comma-media") . '" src="' . get_field('image_for_scroll_on_top', 'option') . '" class="img-fluid">';
        else:?>
            <div class="circle">
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
        <?php endif; ?>
    </div>
    </div>
<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>
