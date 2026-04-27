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
                    <section class="page-container">
                        <?php
                            while( have_posts() ) : the_post();
                        ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
                                    <h1><?php _e( the_title(), 'wptm001' ); ?></h1>
                                    <div class="post-info">
                                        <p class="post-meta"><?php _e( 'Posted on', 'wptm001' ); ?> <?php the_time('M j, Y'); ?> <br><?php _e( 'by', 'wptm001' ); ?> <?php the_author(); ?></p>
                                        <p class="post-categories"><?php _e( 'Categories', 'wptm001' ); ?>: <?php the_category( ', ' ); ?></p>
                                        <p class="post-tags"><?php _e( 'Tags', 'wptm001' ); ?>: <?php the_tags( '', ', ' ); ?></p>
                                        <p class="post-comments"><?php _e( 'Comments', 'wptm001' ); ?>: <?php _e( comments_number( 'No Comments', '1 Comment', '% Comments' ), 'wptm001' ); ?></p>
                                    </div>
                                    <div class="entry-copy">
                                        <?php the_content() ?>
                                        <?php
                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . __( 'Pages:', 'wptm001' ),
                                                'after'  => '</div>',
                                            ) );
                                        ?>
                                    </div>
                                    <hr>
                                </article>

                                <div class="pagination single">
                                    <div class="newer-post">
                                        <?php _e( next_post_link( '%link', '&laquo; Newer Post' ), 'wptm001' ); ?>
                                    </div>
                                    <div class="older-post">
                                        <?php _e( previous_post_link( '%link', 'Older Post &raquo;' ), 'wptm001' ); ?>
                                    </div>
                                </div>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;


                            endwhile;       
                        ?>
                    </section>
                </main>
            </div>
        </div>
<?php get_footer(); ?>

