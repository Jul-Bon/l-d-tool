<?php
/**
 * Template Name: Home
 *
 */
get_header(); ?>

    <div id="primary" class="front-content-area">
        <main id="main" class="site-main">

            <section id="welcome" class="welcome">
                <div class="welcome__banner"
                     style="background: url('<?php echo get_theme_mod('banner_background'); ?>') no-repeat center/cover">
                    <div class="container">
                        <div class="welcome__banner-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <img src="<?php echo get_theme_mod('banner-logo'); ?>" alt="L-D Tool&Die">
                            </a>
                        </div>
                        <h2 class="welcome__title"><?php echo get_theme_mod('slogan'); ?></h2>
                        <p class="welcome__description"><?php echo get_theme_mod('site_description'); ?></p>
                    </div>
                </div>
                <div class="welcome__info container">
                    <span class="welcome__info-certificate"><?php echo CFS()->get('certificate'); ?></span>
                    <a href="#" class="welcome__info-button button">Learn More</a>
                    <h3 class="welcome__info-title"><?php echo CFS()->get('info_headline'); ?></h3>
                    <p class="welcome__info-description"><?php echo CFS()->get('info_description'); ?></p>
                </div>
            </section>

            <section id="advantages" class="advantages"
                     style="background: url(<?php echo CFS()->get('choose_us_background'); ?>) no-repeat center/cover">
                <div class="container">
                    <div class="big-headline light-title">
                        <h2 class="section__title"><?php echo CFS()->get('choose_us_title'); ?></h2>
                        <p class="advantages__description"><?php echo CFS()->get('choose_us_description'); ?></p>
                    </div>
                    <ul class="advantages__list">
                        <?php
                        //The query
                        $args = array(
                            'post_type' => 'advantages',
                            'order' => 'DESC',
                            'posts_per_page' => 3
                        );
                        $advantages = new WP_Query($args); ?>

                        <?php if ($advantages->have_posts()): ?>

                            <!-- The loop -->
                            <?php while ($advantages->have_posts()) : $advantages->the_post(); ?>
                                <?php get_template_part('template-parts/content-advantages', 'advantages'); ?>
                            <?php endwhile; ?>
                            <!-- End of the loop -->

                            <?php wp_reset_query(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </section>

            <section id="differences" class="differences container">
                <div class="small-headline">
                    <h2 class="section__title dark-title">The L-D difference</h2>
                </div>
                <ul class="differences__list">
                    <?php
                    //The query
                    $args = array(
                        'post_type' => 'differences',
                        'order' => 'DESC',
                        'posts_per_page' => 5
                    );
                    $differences = new WP_Query($args); ?>

                    <?php if ($differences->have_posts()): ?>

                        <!-- The loop -->
                        <?php while ($differences->have_posts()) : $differences->the_post(); ?>
                            <?php get_template_part('template-parts/content-differences', 'differences'); ?>
                        <?php endwhile; ?>
                        <!-- End of the loop -->

                        <?php wp_reset_query(); ?>
                    <?php endif; ?>
                </ul>
            </section>

            <section id="reviews" class="reviews"
                     style="background: url(<?php echo CFS()->get('reviews_background'); ?>) no-repeat center/cover">
                <div class="container">
                    <div class="small-headline">
                        <h2 class="section__title light-title"><?php echo CFS()->get('reviews_title'); ?></h2>
                    </div>
                    <div class="reviews__list slider">
                        <?php
                        //The query
                        $args = array(
                            'post_type' => 'review',
                            'order' => 'DESC',
                            'posts_per_page' => 10
                        );
                        $reviews = new WP_Query($args); ?>

                        <?php if ($reviews->have_posts()): ?>

                            <!-- The loop -->
                            <?php while ($reviews->have_posts()) : $reviews->the_post(); ?>
                                <?php get_template_part('template-parts/content-reviews', 'reviews'); ?>
                            <?php endwhile; ?>
                            <!-- End of the loop -->

                            <?php wp_reset_query(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <section id="supply" class="supply container">
                <div class="small-headline">
                    <h2 class="section__title dark-title">Lean supply Chain = higher profits</h2>
                </div>
                <ul class="supply__list">
                    <?php $catquery = new WP_Query('orderby=date&posts_per_page=4'); ?>

                    <?php while ($catquery->have_posts()) : $catquery->the_post();

                        get_template_part('template-parts/content-supply', get_post_type());

                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ul>
            </section>

            <section id="form" class="contact__form">
                <div class="container">
                    <div class="big-headline dark-title">
                        <h2 class="section__title"><?php echo CFS()->get('contact_section_title'); ?></h2>
                        <p class="section_description"><?php echo CFS()->get('contact_section_description'); ?></p>
                    </div>
                    <div class="form__box">
                        <?php echo do_shortcode('[contact-form-7 id="101" title="Contact form"]'); ?>
                    </div>
                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();