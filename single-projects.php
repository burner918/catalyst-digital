<?php
/**
 * The template for displaying single Projects
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

    <!-- Project Header -->
    <section class="project-header page-header">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <h1><?php the_title(); ?></h1>

                <?php if (has_excerpt()) : ?>
                    <p style="font-size: 1.2rem; margin-top: 1rem;">
                        <?php echo esc_html(get_the_excerpt()); ?>
                    </p>
                <?php endif; ?>

                <div class="project-meta" style="display: flex; gap: 2rem; justify-content: center; margin-top: 1.5rem; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-light);">
                        <span>📅</span>
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                            <?php echo esc_html(get_the_date()); ?>
                        </time>
                    </div>

                    <?php if (get_the_author()) : ?>
                        <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-light);">
                            <span>✍️</span>
                            <span>By <?php the_author(); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Featured Image -->
    <?php if (has_post_thumbnail()) : ?>
        <section class="project-featured-image section" style="padding-top: 3rem; padding-bottom: 3rem;">
            <div class="container">
                <div class="featured-image-wrapper" style="border-radius: 12px; overflow: hidden; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Project Content -->
    <section class="project-content section">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto;">
                <article id="project-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'catalyst-digital'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Project Navigation -->
    <section class="project-navigation section section-light">
        <div class="container">
            <div class="project-nav-wrapper" style="display: flex; gap: 2rem; justify-content: space-between; flex-wrap: wrap;">
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>

                <div class="nav-previous" style="flex: 1; min-width: 250px;">
                    <?php if ($prev_post) : ?>
                        <div style="padding: 2rem; background-color: white; border-radius: 8px; height: 100%;">
                            <div style="color: var(--text-light); margin-bottom: 0.5rem; font-size: 0.9rem;">
                                ← Previous Project
                            </div>
                            <h4 style="margin: 0;">
                                <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" style="color: var(--primary-color);">
                                    <?php echo esc_html(get_the_title($prev_post)); ?>
                                </a>
                            </h4>
                        </div>
                    <?php endif; ?>
                </div>

                <div style="flex: 0 0 auto; display: flex; align-items: center;">
                    <a href="<?php echo esc_url(get_post_type_archive_link('projects')); ?>" class="btn btn-accent">
                        View All Projects
                    </a>
                </div>

                <div class="nav-next" style="flex: 1; min-width: 250px; text-align: right;">
                    <?php if ($next_post) : ?>
                        <div style="padding: 2rem; background-color: white; border-radius: 8px; height: 100%;">
                            <div style="color: var(--text-light); margin-bottom: 0.5rem; font-size: 0.9rem;">
                                Next Project →
                            </div>
                            <h4 style="margin: 0;">
                                <a href="<?php echo esc_url(get_permalink($next_post)); ?>" style="color: var(--primary-color);">
                                    <?php echo esc_html(get_the_title($next_post)); ?>
                                </a>
                            </h4>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Projects or CTA -->
    <section class="section">
        <div class="container">
            <?php
            // Get related projects (latest 3, excluding current)
            $related_args = array(
                'post_type'      => 'projects',
                'posts_per_page' => 3,
                'post__not_in'   => array(get_the_ID()),
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            $related_query = new WP_Query($related_args);

            if ($related_query->have_posts()) :
                ?>
                <div style="text-align: center; margin-bottom: 3rem;">
                    <h2>More Projects</h2>
                    <p>Check out our other successful projects</p>
                </div>

                <div class="projects-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <article class="project-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="project-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="project-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <div style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); height: 250px; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                            📁
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="project-content" style="padding: 1.5rem;">
                                <h3 style="font-size: 1.25rem;">
                                    <a href="<?php the_permalink(); ?>" style="color: var(--primary-color);">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <?php if (has_excerpt()) : ?>
                                    <p style="color: var(--text-light); font-size: 0.9rem;">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <?php
                wp_reset_postdata();
            else :
                // If no related projects, show CTA
                ?>
                <div style="text-align: center; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); padding: 4rem 2rem; border-radius: 12px; color: white;">
                    <h2 style="color: white; margin-bottom: 1rem;">Interested in Working Together?</h2>
                    <p style="color: white; font-size: 1.2rem; margin-bottom: 2rem;">Let's bring your vision to life with our digital expertise.</p>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary" style="background-color: white; color: var(--primary-color);">Get in Touch</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php endwhile; ?>

<?php
get_footer();
