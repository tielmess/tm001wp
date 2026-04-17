<?php get_header(); ?>
<div id="content" class="site-content">
    <div id="nofind" class="content-area">
        <main id="main" class="site-main">
            <section class="error-404 not-found">
                <h1>404 - Page Not Found</h1>
                <p>Sorry, the page you are looking for does not exist. Please check the URL or return to the homepage.</p>
                <a href="<?php echo home_url(); ?>" class="button">Go to Homepage</a>
                <div>
                    <h2>Latest Blog Posts</h2>
                    <?php
                    $recent_posts = new WP_Query( array(
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                    ) );
                    if ( $recent_posts->have_posts() ) :
                        echo '<ul class="recent-posts">';
                        while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
                            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                        endwhile;
                        echo '</ul>';
                        wp_reset_postdata();
                    else :
                        echo '<p>No recent posts available.</p>';   
                    endif;
                    ?>
                </div>
            </section><!-- .error-404 -->
        </main><!-- #main -->
    </div><!-- #nofind --> 
</div><!-- #content -->
<?php get_footer(); ?>