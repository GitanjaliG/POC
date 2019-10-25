<footer class="site-footer">

    <?php if(get_theme_mod('wpoc_footer_callout_display') == "Yes"){ ?>
    <div class="footer-callout flex-container">
        <div class="footer-callout-image">
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('wpoc_footer_callout_image')) ?>" alt="">
        </div>
        <div class="footer-callout-text">
            <h2> <a href="<?php echo get_permalink(get_theme_mod('wpoc_footer_callout_link')) ?>">
                    <?php echo get_theme_mod('wpoc_footer_callout_headline') ?></a></h2>
            <p><?php echo get_theme_mod('wpoc_footer_callout_desc') ?></p>
        </div>

    </div>
    <?php } ?>

    <div class="footer-widgets ">
        <div class="container flex-container">
            <?php if(is_active_sidebar('footer1')): ?>
            <div class="footer-widget-block">
                <?php dynamic_sidebar('footer1'); ?>
            </div>
            <?php endif; ?>
            <?php if(is_active_sidebar('footer2')): ?>
            <div class="footer-widget-block">
                <?php dynamic_sidebar('footer2'); ?>
            </div>
            <?php endif; ?>
            <?php if(is_active_sidebar('footer3')): ?>
            <div class="footer-widget-block">
                <?php dynamic_sidebar('footer3'); ?>
            </div>
            <?php endif; ?>
            <?php if(is_active_sidebar('footer4')): ?>
            <div class="footer-widget-block">
                <?php dynamic_sidebar('footer4'); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- <nav class="site-nav">
                <?php
                    $args = array(
                        'theme_location' => 'footer'
                    );
                ?>
                <?php wp_nav_menu( $args ); ?>
            </nav> -->

    <p class="copyright"> Copyright © <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>

</footer>
</div>
<!-- /container -->

<?php wp_footer(); ?>
</body>

</html>