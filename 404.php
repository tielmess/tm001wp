<?php get_header(); ?>
<div id="content" class="site-content">
    <div id="nofind" class="content-area">
        <main id="main" class="site-main">
            <section class="page-container">
                <h1><?php _e( '404 - Page Not Found', 'wptm001' ); ?></h1>
                <p><?php _e( 'Sorry, the page you are looking for does not exist. Please check the URL or return to the homepage.', 'wptm001' ); ?></p>
                <a href="<?php echo home_url(); ?>" class="button"><?php _e( 'Go to Homepage', 'wptm001' ); ?></a>
                <div>
                    <h2><?php _e( 'Latest Blog Posts', 'wptm001' ); ?></h2>
                    <?php
                    $recent_posts = new WP_Query( array(
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                    ) );
                    if ( $recent_posts->have_posts() ) :
                        echo '<ul class="recent-posts">';
                        while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
                            echo '<li><a href="' . get_permalink() . '">' . _e( get_the_title(), 'wptm001' ) . '</a></li>';
                        endwhile;
                        echo '</ul>';
                        wp_reset_postdata();
                    else :
                        echo _e( 'No recent posts available.', 'wptm001' );
                    endif;
                    ?>
                </div>
            </section><!-- .error-404 -->
        </main><!-- #main -->
    </div><!-- #nofind --> 
</div><!-- #content -->
<?php get_footer(); ?>