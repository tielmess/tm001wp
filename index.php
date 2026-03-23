<?php get_header(); ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="hero">
                        <img src="http://wp-tm001.local/wp-content/uploads/2026/03/creative-minimalist-living-room-interior-compositi-2026-03-09-09-01-28-utc-scaled.webp" alt="" style="width: 100%; height: auto; object-fit: cover;">
                        <h1>Welcome to WP-TM001 Theme</h1>
                        <p>This is a custom WordPress theme built for learning and experimentation.</p>
                    </section>
                    <section class="services">
                        <h2>Our Services</h2>
                        <ul>
                            <li>Custom Theme Development</li>
                            <li>Plugin Development</li>
                            <li>WordPress Maintenance</li>
                        </ul>
                    </section>
                    <section class="updates">
                        <h2>Latest Blog Posts</h2>
                        <?php
                        $recent_posts = new WP_Query( array(
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                        ) );
                        if ( $recent_posts->have_posts() ) :
                            while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
                                ?>
                                <article class="post">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="entry-summary">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>No recent posts found.</p>';
                        endif;
                        ?>
                    </section>
                </main>
            </div>
        </div>

<?php get_footer(); ?>