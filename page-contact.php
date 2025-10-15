<?php
/**
 * Template Name: Contact Page
 * Template Post Type: page
 *
 * @package Catalyst_Digital
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <p>We'd love to hear from you. Let's start a conversation about your digital needs.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="section">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Contact Form -->
            <div>
                <h2>Send Us a Message</h2>
                <p style="margin-bottom: 2rem;">Fill out the form below and we'll get back to you as soon as possible.</p>

                <?php
                // Display success or error messages
                if (isset($_GET['contact_status'])) {
                    if ($_GET['contact_status'] === 'success') {
                        echo '<div class="contact-message contact-success" style="padding: 1rem; margin-bottom: 2rem; background-color: var(--accent-color); color: var(--text-dark); border-radius: 4px;">Thank you for your message! We\'ll get back to you soon.</div>';
                    } elseif ($_GET['contact_status'] === 'error') {
                        echo '<div class="contact-message contact-error" style="padding: 1rem; margin-bottom: 2rem; background-color: #f44336; color: white; border-radius: 4px;">There was an error submitting your message. Please try again.</div>';
                    } elseif ($_GET['contact_status'] === 'invalid_email') {
                        echo '<div class="contact-message contact-error" style="padding: 1rem; margin-bottom: 2rem; background-color: #f44336; color: white; border-radius: 4px;">Please enter a valid email address.</div>';
                    }
                }
                ?>

                <form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                    <input type="hidden" name="action" value="catalyst_contact_form">
                    <?php wp_nonce_field( 'catalyst_contact_form', 'catalyst_contact_nonce' ); ?>

                    <div class="form-group">
                        <label for="contact-name">Name <span class="required-asterisk">*</span></label>
                        <input type="text" id="contact-name" name="contact_name" placeholder="John Doe" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="contact-email">Email <span class="required-asterisk">*</span></label>
                        <input type="email" id="contact-email" name="contact_email" placeholder="your@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-phone">Phone</label>
                        <input type="tel" id="contact-phone" name="contact_phone" placeholder="(555) 636-1828" pattern="\(\d{3}\) \d{3}-\d{4}" maxlength="14">
                    </div>

                    <div class="form-group">
                        <label for="contact-message">Message <span class="required-asterisk">*</span></label>
                        <textarea id="contact-message" name="contact_message" placeholder="Please tell us about the project you have in mind. The more information the better." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>

            <!-- Contact Info -->
            <div>
                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    <p style="margin-bottom: 2rem;">Reach out to us through any of these channels and we'll respond promptly.</p>

                    <div class="contact-info-item">
                        <h4>📧 Email</h4>
                        <p><a href="mailto:info@catalystdigital.com">info@catalystdigital.com</a></p>
                    </div>

                    <div class="contact-info-item">
                        <h4>📞 Phone</h4>
                        <p><a href="tel:+15551234567">(555) 123-4567</a></p>
                    </div>

                    <div class="contact-info-item">
                        <h4>📍 Address</h4>
                        <p>123 Digital Avenue<br>Suite 100<br>San Francisco, CA 94103<br>United States</p>
                    </div>

                    <div class="contact-info-item">
                        <h4>🕒 Business Hours</h4>
                        <p>Monday - Friday: 9:00 AM - 6:00 PM PST<br>Saturday - Sunday: Closed</p>
                    </div>
                </div>

                <div style="margin-top: 2rem; padding: 2rem; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border-radius: 8px; color: white; text-align: center;">
                    <h3 style="color: white; margin-bottom: 1rem;">Need Immediate Assistance?</h3>
                    <p style="color: white; margin-bottom: 1.5rem;">For urgent inquiries, please call us directly.</p>
                    <a href="tel:+15551234567" class="btn btn-primary" style="background-color: white; color: var(--primary-color);">Call Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Placeholder) -->
<section class="section section-light">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 2rem;">Find Us Here</h2>
        <div style="background-color: #e0e0e0; height: 400px; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #666;">
            <div style="text-align: center;">
                <div style="font-size: 4rem; margin-bottom: 1rem;">🗺️</div>
                <p style="font-size: 1.2rem;">Map Integration Available</p>
                <p>Connect your preferred map service</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <h2>Frequently Asked Questions</h2>
        </div>

        <div style="max-width: 800px; margin: 0 auto;">
            <div style="margin-bottom: 2rem; padding: 2rem; background-color: var(--background-light); border-radius: 8px;">
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">What services do you offer?</h4>
                <p>We offer a comprehensive range of digital services including brand strategy, web development, digital marketing, analytics, content creation, and growth consulting. Visit our <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home page</a> to learn more about each service.</p>
            </div>

            <div style="margin-bottom: 2rem; padding: 2rem; background-color: var(--background-light); border-radius: 8px;">
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">How long does a typical project take?</h4>
                <p>Project timelines vary depending on scope and complexity. A simple website might take 4-6 weeks, while comprehensive digital marketing campaigns can span several months. We'll provide a detailed timeline during our initial consultation.</p>
            </div>

            <div style="margin-bottom: 2rem; padding: 2rem; background-color: var(--background-light); border-radius: 8px;">
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">What is your pricing structure?</h4>
                <p>We offer flexible pricing models including project-based fees, monthly retainers, and hourly rates depending on your needs. Contact us for a custom quote based on your specific requirements.</p>
            </div>

            <div style="margin-bottom: 2rem; padding: 2rem; background-color: var(--background-light); border-radius: 8px;">
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Do you work with businesses of all sizes?</h4>
                <p>Absolutely! We work with startups, small businesses, and large enterprises across various industries. Our scalable solutions are designed to meet the unique needs of businesses at every stage.</p>
            </div>
        </div>
    </div>
</section>

<?php
// Display page content if any
if ( get_the_content() ) :
    ?>
    <section class="section">
        <div class="container">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <?php
endif;
?>

<?php endwhile; ?>

<?php
get_footer();
