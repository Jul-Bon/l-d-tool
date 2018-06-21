<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package l-d-tool-test
 */

?>

</div><!-- #content -->

<footer id="colophon" class="footer">

    <span class="footer__label"><?php echo CFS()->get('footer_label'); ?></span>
    <a href="<?php echo CFS()->get('button_url'); ?>" target="_blank"
       class="footer_button button"><?php echo CFS()->get('button_label'); ?></a>

    <div class="footer__info">
        <span class="footer__copyright"><?php echo CFS()->get('copyright'); ?></span>
    </div><!-- .site-info -->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
