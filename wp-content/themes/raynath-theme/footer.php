    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-widgets">
                <div class="footer-widget">
                    <h3><?php _e( 'About Raynath', 'raynath-theme' ); ?></h3>
                    <p><?php _e( 'Welcome to Raynath.com, your local community hub for Atlantic, Iowa and surrounding areas. Stay connected with local news, events, and community updates.', 'raynath-theme' ); ?></p>
                </div>

                <div class="footer-widget">
                    <h3><?php _e( 'Quick Links', 'raynath-theme' ); ?></h3>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'raynath-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php _e( 'About', 'raynath-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php _e( 'Contact', 'raynath-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php _e( 'Privacy Policy', 'raynath-theme' ); ?></a></li>
                    </ul>
                </div>

                <div class="footer-widget">
                    <h3><?php _e( 'Connect With Us', 'raynath-theme' ); ?></h3>
                    <p><?php _e( 'Stay updated with the latest community news and events.', 'raynath-theme' ); ?></p>
                    <div class="social-links">
                        <!-- Add social media links here -->
                        <a href="#" class="social-link" aria-label="Facebook">Facebook</a>
                        <a href="#" class="social-link" aria-label="Twitter">Twitter</a>
                        <a href="#" class="social-link" aria-label="Instagram">Instagram</a>
                    </div>
                </div>

                <div class="footer-widget">
                    <h3><?php _e( 'Contact Information', 'raynath-theme' ); ?></h3>
                    <p>
                        <?php _e( 'Atlantic, Iowa', 'raynath-theme' ); ?><br>
                        <?php _e( 'Email: info@raynath.com', 'raynath-theme' ); ?><br>
                        <?php _e( 'Phone: (555) 123-4567', 'raynath-theme' ); ?>
                    </p>
                </div>
            </div>

            <div class="site-info">
                <p>
                    &copy; <?php echo date('Y'); ?> 
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. 
                    <?php _e( 'All rights reserved.', 'raynath-theme' ); ?>
                </p>
                <p>
                    <?php _e( 'Powered by', 'raynath-theme' ); ?> 
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'raynath-theme' ) ); ?>">
                        <?php _e( 'WordPress', 'raynath-theme' ); ?>
                    </a>
                </p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

<script>
// Mobile menu toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.main-navigation');
    
    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            navigation.classList.toggle('toggled');
        });
    }
});
</script>

</body>
</html>