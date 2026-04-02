<?php   
get_header(); ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php
                    if ( have_posts() ):
                        while( have_posts() ) : the_post();
                    ?>
                            <article class="post-container">
                                <h1><?php the_title(); ?></h1>
                                <div class="entry-copy">
                                    <?php the_content() ?>

                                    <p class="post-meta">Posted on <?php the_time('M j, Y'); ?> <br>by <?php the_author(); ?></p>       
                                    <p class="post-categories">Categories: <?php the_category( ', ' ); ?></p>
                                    <p class="post-tags">Tags: <?php the_tags( '', ', ' ); ?></p>
                                    <p class="post-comments"><?php comments_number( 'No Comments', '1 Comment
', '% Comments' ); ?></p>
                                </div>
                            </article>
                    <?php
                        endwhile;       
                        wp_reset_postdata();
                    else :
                        echo '<p>No recent posts found.</p>';
                    endif;
                    ?>
                </main>
            </div>
        </div>
<?php get_footer(); ?>

