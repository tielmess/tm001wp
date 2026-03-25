<?php get_header(); ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="hero">
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
                        <div class="blog-grid">
                            <?php
                            if ( have_posts() ):
                                while( have_posts() ) : the_post();
                            ?>
                                <article class="post card">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="post-info">
                                        <p class="post-meta">Posted on <?php the_time('M j, Y'); ?> by <?php the_author(); ?></p>
                                        <p class="post-categories">Categories: <?php the_category( ', ' ); ?></p>
                                        <p class="post-tags">Tags: <?php the_tags( '', ', ' ); ?></p>
                                        <p class="post-comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></p>
                                    </div>
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
                        </div>
                    </section>

                </main>
            </div>
        </div>

<?php get_footer(); ?>