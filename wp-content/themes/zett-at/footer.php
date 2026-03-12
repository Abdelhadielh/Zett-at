    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="site-info">
                    <h3>Zett-at</h3>
                    <p><?php _e('Discover more, travel smart', 'zett-at'); ?></p>
                </div>

                <div class="social-links">
                    <a href="https://instagram.com/zett-at" target="_blank" rel="noopener noreferrer" aria-label="<?php _e('Follow us on Instagram', 'zett-at'); ?>" title="Instagram (72%)">
                        <?php echo zett_at_get_svg('instagram'); ?>
                    </a>
                    <a href="https://youtube.com/@zett-at" target="_blank" rel="noopener noreferrer" aria-label="<?php _e('Subscribe on YouTube', 'zett-at'); ?>" title="YouTube (55%)">
                        <?php echo zett_at_get_svg('youtube'); ?>
                    </a>
                    <a href="https://facebook.com/zett-at" target="_blank" rel="noopener noreferrer" aria-label="<?php _e('Like us on Facebook', 'zett-at'); ?>">
                        <?php echo zett_at_get_svg('facebook'); ?>
                    </a>
                    <a href="https://twitter.com/zett-at" target="_blank" rel="noopener noreferrer" aria-label="<?php _e('Follow us on Twitter', 'zett-at'); ?>">
                        <?php echo zett_at_get_svg('twitter'); ?>
                    </a>
                </div>
            </div>

            <?php if (has_nav_menu('footer')) : ?>
                <nav class="footer-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                    ?>
                </nav>
            <?php endif; ?>

            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> Zett-at. <?php _e('All rights reserved.', 'zett-at'); ?></p>
                <p><?php _e('Your AI-powered travel guide for Morocco', 'zett-at'); ?></p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
