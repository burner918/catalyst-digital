<?php

/**
 * The footer for our theme
 *
 * @package Catalyst_Digital
 */

// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit;
}
?>

</main><!-- #main -->

<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3><?php echo esc_html(get_bloginfo('name')); ?></h3>
                <p>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) {
                        echo esc_html($description);
                    } else {
                        echo 'Your premier digital media agency specializing in innovative solutions for modern businesses.';
                    }
                    ?>
                </p>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <?php
                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                } else {
                ?>
                    <ul class="footer-menu">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                    </ul>
                <?php
                }
                ?>
            </div>

            <div class="footer-section">
                <h3>Contact Info</h3>
                <p>Email: info@catalystdigital.com</p>
                <p>Phone: (555) 123-4567</p>
                <p>123 Digital Avenue<br>Suite 100<br>San Francisco, CA 94103</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>
                &copy; <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?>. All rights reserved.
                <?php
                if (function_exists('the_privacy_policy_link')) {
                    the_privacy_policy_link(' | ', '');
                }
                ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>