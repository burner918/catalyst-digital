<?php
/**
 * The main template file
 *
 * @package Catalyst_Digital
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="container">
    <div class="section">
        <?php
        if ( have_posts() ) :

            if ( is_home() && ! is_front_page() ) :
                ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
                <?php
            endif;

            // Start the Loop
            while ( have_posts() ) :
                the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
                        if ( is_singular() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif;

                        if ( 'post' === get_post_type() ) :
                            ?>
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="byline">
                                    by <?php the_author(); ?>
                                </span>
                            </div>
                            <?php
                        endif;
                        ?>
                    </header>

                    <?php
                    if ( has_post_thumbnail() ) :
                        ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                        <?php
                    endif;
                    ?>

                    <div class="entry-content">
                        <?php
                        if ( is_singular() ) :
                            the_content();

                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'catalyst-digital' ),
                                'after'  => '</div>',
                            ) );
                        else :
                            the_excerpt();
                            ?>
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary">
                                <?php esc_html_e( 'Read More', 'catalyst-digital' ); ?>
                            </a>
                            <?php
                        endif;
                        ?>
                    </div>

                    <?php
                    if ( is_singular() ) :
                        ?>
                        <footer class="entry-footer">
                            <?php
                            // Display tags
                            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'catalyst-digital' ) );
                            if ( $tags_list ) {
                                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'catalyst-digital' ) . '</span>', $tags_list );
                            }
                            ?>
                        </footer>
                        <?php
                    endif;
                    ?>
                </article>

                <?php
                // If comments are open or we have at least one comment, load the comment template
                if ( is_singular() && ( comments_open() || get_comments_number() ) ) :
                    comments_template();
                endif;

            endwhile;

            // Pagination
            the_posts_pagination( array(
                'prev_text' => esc_html__( 'Previous', 'catalyst-digital' ),
                'next_text' => esc_html__( 'Next', 'catalyst-digital' ),
            ) );

        else :
            ?>
            <div class="no-results">
                <h1><?php esc_html_e( 'Nothing Found', 'catalyst-digital' ); ?></h1>
                <p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps try a search?', 'catalyst-digital' ); ?></p>
                <?php get_search_form(); ?>
            </div>
            <?php
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
