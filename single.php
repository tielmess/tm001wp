<?php   
/**
 * Template Name: Single Post Template
 * 
 * Description: Single post template file   
 *
 * This is the template that displays all single posts by default.
 * Please note that this is the WordPress construct of single posts and that other 'single' types (e.g. single-product.php) will require a different template.      
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_TM001
 */ 

get_header(); ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php
                        while( have_posts() ) : the_post();
                    ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
                                <h1><?php the_title(); ?></h1>
                                <div class="post-info">
                                    <p class="post-meta">Posted on <?php the_time('M j, Y'); ?> <br>by <?php the_author(); ?></p>
                                    <p class="post-categories">Categories: <?php the_category( ', ' ); ?></p>
                                    <p class="post-tags">Tags: <?php the_tags( '', ', ' ); ?></p>
                                    <p class="post-comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></p>
                                </div>
                                <div class="entry-copy">
                                    <?php the_content() ?>
                                    <?php
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'twentysixteen' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>
                            </article>

                            <div class="pagination single">
                                <div class="newer-post">
                                    <?php next_post_link( '%link', '&laquo; Newer Post' ); ?>
                                </div>
                                <div class="older-post">
                                    <?php previous_post_link( '%link', 'Older Post &raquo;' ); ?>
                                </div>
                            </div>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;


                        endwhile;       
                    ?>
                </main>
            </div>
        </div>
<?php get_footer(); ?>

