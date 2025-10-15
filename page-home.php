<?php

/**
 * Template Name: Home Page
 * Template Post Type: page
 *
 * @package Catalyst_Digital
 */

// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Transforming Ideas into Digital Reality</h1>
                <p>We are Catalyst Digital, your premier digital media agency specializing in innovative solutions that drive business growth and create meaningful connections with your audience.</p>
                <div style="margin-top: 2rem;">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-hero-primary" style="margin-right: 1rem;">Get Started</a>
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-accent">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2>Our Services</h2>
                <p style="max-width: 700px; margin: 0 auto;">We offer comprehensive digital solutions tailored to meet your business needs and exceed your expectations.</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/strategy.png" alt="Brand Strategy Icon">
                    </div>
                    <h3>Brand Strategy</h3>
                    <p>Build a powerful brand identity that resonates with your target audience and sets you apart from the competition.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/web-development.png" alt="Web Development Icon">
                    </div>
                    <h3>Web Development</h3>
                    <p>Custom websites and web applications built with cutting-edge technologies to deliver exceptional user experiences.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/digital-marketing.png" alt="Digital Marketing Icon">
                    </div>
                    <h3>Digital Marketing</h3>
                    <p>Strategic marketing campaigns that drive traffic, engage customers, and deliver measurable results.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/data-analytics.png" alt="Analytics & Insights Icon">
                    </div>
                    <h3>Analytics & Insights</h3>
                    <p>Data-driven strategies backed by comprehensive analytics to optimize your digital presence and ROI.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/creative.png" alt="Content Creation Icon">
                    </div>
                    <h3>Content Creation</h3>
                    <p>Engaging multimedia content that tells your story and captures the attention of your audience.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/growth-consulting.png" alt="Growth Consulting Icon">
                    </div>
                    <h3>Growth Consulting</h3>
                    <p>Expert guidance and strategies to accelerate your digital transformation and business growth.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="section section-light">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2>Why Choose Catalyst Digital?</h2>
                <p style="max-width: 700px; margin: 0 auto;">We combine creativity, technology, and strategy to deliver exceptional results for our clients.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; margin-top: 3rem;">
                <div style="text-align: center;">
                    <h3 style="color: var(--primary-color); font-size: 3rem; margin-bottom: 1rem;">10+</h3>
                    <h4>Years Experience</h4>
                    <p>Delivering innovative digital solutions across various industries.</p>
                </div>

                <div style="text-align: center;">
                    <h3 style="color: var(--primary-color); font-size: 3rem; margin-bottom: 1rem;">500+</h3>
                    <h4>Projects Completed</h4>
                    <p>Successfully delivering projects that exceed client expectations.</p>
                </div>

                <div style="text-align: center;">
                    <h3 style="color: var(--primary-color); font-size: 3rem; margin-bottom: 1rem;">98%</h3>
                    <h4>Client Satisfaction</h4>
                    <p>Building long-term partnerships through exceptional service.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="section">
        <div class="container">
            <div style="text-align: center; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); padding: 4rem 2rem; border-radius: 12px; color: white;">
                <h2 style="color: white; margin-bottom: 1rem;">Ready to Start Your Project?</h2>
                <p style="color: white; font-size: 1.2rem; margin-bottom: 2rem;">Let's work together to bring your digital vision to life.</p>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary" style="background-color: white; color: var(--primary-color);">Contact Us Today</a>
            </div>
        </div>
    </section>

    <?php
    // Display page content if any
    if (get_the_content()) :
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
