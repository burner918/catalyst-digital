<?php
/**
 * Template Name: About Page
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
        <p>Discover the story behind Catalyst Digital and our commitment to digital excellence.</p>
    </div>
</section>

<!-- About Content -->
<section class="section">
    <div class="container">
        <div class="about-content">
            <div>
                <h2>Our Story</h2>
                <p>Founded in 2013, Catalyst Digital emerged from a simple yet powerful vision: to transform how businesses connect with their audiences in the digital age. What started as a small team of passionate creatives and technologists has grown into a full-service digital media agency serving clients worldwide.</p>
                <p>Over the years, we've had the privilege of working with diverse businesses, from innovative startups to established enterprises, helping them navigate the ever-evolving digital landscape. Our success is built on a foundation of creativity, technical expertise, and an unwavering commitment to delivering results that matter.</p>
                <p>Today, we continue to push boundaries, embrace new technologies, and create digital experiences that inspire and engage.</p>
            </div>
            <div class="about-image">
                <div style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); height: 400px; display: flex; align-items: center; justify-content: center; color: white; font-size: 4rem;">
                    🚀
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="section section-light">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem;">
            <div style="padding: 2rem; background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div style="width: 60px; height: 60px; background-color: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; font-size: 1.5rem; color: white;">
                    🎯
                </div>
                <h3>Our Mission</h3>
                <p>To empower businesses with innovative digital solutions that drive growth, foster meaningful connections, and create lasting impact in an increasingly connected world.</p>
            </div>

            <div style="padding: 2rem; background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div style="width: 60px; height: 60px; background-color: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; font-size: 1.5rem;">
                    🔭
                </div>
                <h3>Our Vision</h3>
                <p>To be the catalyst for digital transformation, setting new standards for creativity, innovation, and excellence in the digital media industry.</p>
            </div>

            <div style="padding: 2rem; background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div style="width: 60px; height: 60px; background-color: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; font-size: 1.5rem; color: white;">
                    💎
                </div>
                <h3>Our Values</h3>
                <p>Innovation, integrity, collaboration, and excellence guide everything we do. We believe in building lasting relationships and delivering value that exceeds expectations.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <h2>Meet Our Team</h2>
            <p style="max-width: 700px; margin: 0 auto;">Our talented team of professionals brings together diverse skills and expertise to deliver exceptional results.</p>
        </div>

        <div class="team-grid">
            <div class="team-member">
                <div class="team-member-photo" style="display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                    👨‍💼
                </div>
                <h4>Sarah Johnson</h4>
                <p class="team-member-role">CEO & Founder</p>
                <p>Visionary leader with 15+ years of experience in digital strategy and business transformation.</p>
            </div>

            <div class="team-member">
                <div class="team-member-photo" style="display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                    👨‍💻
                </div>
                <h4>Michael Chen</h4>
                <p class="team-member-role">Chief Technology Officer</p>
                <p>Tech innovator specializing in cutting-edge web technologies and digital solutions.</p>
            </div>

            <div class="team-member">
                <div class="team-member-photo" style="display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                    👩‍🎨
                </div>
                <h4>Emily Rodriguez</h4>
                <p class="team-member-role">Creative Director</p>
                <p>Award-winning designer passionate about creating beautiful and functional user experiences.</p>
            </div>

            <div class="team-member">
                <div class="team-member-photo" style="display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                    👨‍📊
                </div>
                <h4>David Thompson</h4>
                <p class="team-member-role">Head of Strategy</p>
                <p>Strategic thinker focused on data-driven insights and measurable business outcomes.</p>
            </div>
        </div>
    </div>
</section>

<!-- What Sets Us Apart -->
<section class="section section-light">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <h2>What Sets Us Apart</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
            <div style="text-align: center; padding: 2rem;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">⚡</div>
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Speed & Agility</h4>
                <p>We move fast without compromising quality, delivering solutions that keep pace with your business needs.</p>
            </div>

            <div style="text-align: center; padding: 2rem;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🎯</div>
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Results-Driven</h4>
                <p>Every project is guided by clear objectives and measurable outcomes that align with your business goals.</p>
            </div>

            <div style="text-align: center; padding: 2rem;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🤝</div>
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">True Partnership</h4>
                <p>We don't just work for you—we work with you as an extension of your team.</p>
            </div>

            <div style="text-align: center; padding: 2rem;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🌟</div>
                <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Innovation First</h4>
                <p>We stay ahead of trends and technologies to ensure your digital presence remains cutting-edge.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section">
    <div class="container">
        <div style="text-align: center; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); padding: 4rem 2rem; border-radius: 12px; color: white;">
            <h2 style="color: white; margin-bottom: 1rem;">Ready to Work Together?</h2>
            <p style="color: white; font-size: 1.2rem; margin-bottom: 2rem;">Let's create something amazing together.</p>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary" style="background-color: white; color: var(--primary-color);">Get in Touch</a>
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
