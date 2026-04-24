        <footer class="site-footer">
            <div class="footer-menu">
                <nav class="footer-nav" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'wptm001' ); ?>">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'footer-menu',
                    ) );
                    ?>
                </nav>
            </div>          
            <div class="site-info">  
                <p><?php echo get_theme_mod( 'set_copyright', 'Copyright X WP_TM001. All rights reserved.' ); ?></p>
            </div>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>
</html>