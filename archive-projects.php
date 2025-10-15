<?php
/**
 * The template for displaying Projects Archive
 *
 * @package Catalyst_Digital
 */

// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1><?php post_type_archive_title(); ?></h1>
        <p>Explore our portfolio of successful projects and innovative digital solutions.</p>
    </div>
</section>

<!-- Projects Archive -->
<section class="section">
    <div class="container">
        <?php if (have_posts()) : ?>

            <div class="projects-grid">
                <?php
                // Start the Loop
                while (have_posts()) :
                    the_post();
                    ?>

                    <article id="project-<?php the_ID(); ?>" <?php post_class('project-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="project-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="project-thumbnail project-thumbnail-placeholder">
                                <a href="<?php the_permalink(); ?>">
                                    <div style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); height: 300px; display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                                        📁
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="project-content">
                            <h3 class="project-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <?php if (has_excerpt()) : ?>
                                <div class="project-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php else : ?>
                                <div class="project-excerpt">
                                    <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="project-meta">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                <?php esc_html_e('View Project', 'catalyst-digital'); ?>
                            </a>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="projects-pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('&laquo; Previous', 'catalyst-digital'),
                    'next_text' => __('Next &raquo;', 'catalyst-digital'),
                ));
                ?>
            </div>

        <?php else : ?>

            <!-- No Projects Found -->
            <div class="no-projects">
                <div style="text-align: center; padding: 4rem 2rem;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">📂</div>
                    <h2><?php esc_html_e('No Projects Found', 'catalyst-digital'); ?></h2>
                    <p><?php esc_html_e('We haven\'t published any projects yet. Check back soon!', 'catalyst-digital'); ?></p>
                </div>
            </div>

        <?php endif; ?>
    </div>
</section>

<!-- Call to Action -->
<section class="section section-light">
    <div class="container">
        <div style="text-align: center; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); padding: 4rem 2rem; border-radius: 12px; color: white;">
            <h2 style="color: white; margin-bottom: 1rem;">Want to See Your Project Here?</h2>
            <p style="color: white; font-size: 1.2rem; margin-bottom: 2rem;">Let's collaborate to create something amazing together.</p>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary" style="background-color: white; color: var(--primary-color);">Start Your Project</a>
        </div>
    </div>
</section>

<?php
get_footer();
