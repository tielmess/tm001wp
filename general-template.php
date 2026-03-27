<?php
/**
 * Template Name: General Template
 * 
 * Description: The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_TM001
 */ 

get_header(); ?>
    <div class="page-header">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    </div>
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <section class="">
                    <div class="general-template">
                        <?php
                        if ( have_posts() ):
                            while( have_posts() ) : the_post();
                        ?>
                            <article class="page-container">
                                <h1><?php the_title(); ?></h1>
                                <div class="entry-copy">
                                    <?php the_content() ?>
                                </div>
                            </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>No recent posts found.</p>';
                        endif;
                        ?>
                    </div>
                </section>

            </main>
        </div>
    </div>      

<?php get_footer(); ?>