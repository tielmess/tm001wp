<?php   
/**
 * Template Name: Search Template
 * 
 * Description: Search template file   
 *
 * This is the template that displays search results.
 * Please note that this is the WordPress construct of search results and that other 'search' types (e.g. search-product.php) will require a different template.      
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
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="post-info">
                                    <p class="post-meta">Posted on <?php the_time('M j, Y'); ?> <br>by <?php the_author(); ?></p>
                                </div>
                                <div class="entry-copy">
                                    <?php the_excerpt() ?>
                                </div>
                                <div class="post-info">
                                    <p class="post-categories">Categories: <?php the_category( ', ' ); ?></p>
                                    <p class="post-tags">Tags: <?php the_tags( '', ', ' ); ?></p>
                                    <p class="post-comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></p>
                                </div>
                            </article>
                    <?php
                        endwhile;       
                    ?>
                </main>
            </div>
        </div>
<?php get_footer(); ?>

