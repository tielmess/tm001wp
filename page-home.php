<?php get_header(); ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="hero">
                        <h1>Welcome to WP-TM001 Theme</h1>
                        <p>This is a custom WordPress theme built for learning and experimentation.</p>
                        <p>Bacon ipsum dolor amet strip steak hamburger chicken sausage, ham porchetta doner. Ground round sirloin meatloaf burgdoggen, alcatra sausage chicken shank shankle ball tip spare ribs drumstick flank boudin. Chicken boudin tongue pork belly buffalo, spare ribs pork chop. Flank strip steak turkey meatball pork loin turducken chicken kevin cupim chislic pork ribeye. Ham hock jerky shank, meatloaf t-bone ball tip ham tenderloin spare ribs pork loin.</p>
                    </section>

                    <section class="home">
                        <?php
                        if ( have_posts() ):
                            while( have_posts() ) : the_post();
                        ?>
                            <article class="page-container">
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
                    </section>

                    <section class="page-container">
                        <h2>Latest Blog Posts</h2>
                        <div class="blog-grid">
                            <?php
                            $recent_posts = new WP_Query( array(
                                'posts_per_page' => 3,
                                'post_status' => 'publish',
                            ) );
                            if ( $recent_posts->have_posts() ) :
                                while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
                                    ?>
                                    <article class="post card">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p class="post-meta">Posted on <?php the_date(); ?> by <?php the_author(); ?></p>
                                        <p class="post-categories">Categories: <?php the_category( ', ' ); ?></p>
                                        <p class="post-tags">Tags: <?php the_tags( '', ', ' ); ?></p>
                                        <p class="post-comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></p>
                                        <div class="entry-summary">
                                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                        </div>
                                        <div class="read-more">
                                            <a class="read-more-btn" href="<?php the_permalink(); ?>">Read&nbsp;the full post <span class="sr-only"><?php the_title(); ?></span><span class="arrow">&rArr;</span></a>
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