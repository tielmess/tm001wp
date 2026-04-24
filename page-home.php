<?php get_header(); ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="hero" style="background-image: url('<?php header_image(); ?>'); background-size: cover; background-position: left;">
                        <div class="overlay" style="width: fit-content; background-color: rgba(0, 0, 0, 0.1); padding: 30px 50px; color: #fff; text-align: left; border-radius: 10px;">
                            <div class="">
                                <h1><?php echo get_theme_mod( 'set_hero_title', 'Welcome to WP-TM001 Theme' ); ?></h1>
                                <p><?php echo get_theme_mod( 'set_hero_text', 'This is a custom WordPress theme built for learning and experimentation.' ); ?></p>
                                <a class="hero-btn" href="<?php echo get_theme_mod( 'set_hero_button_link', '#' ); ?>"><?php echo get_theme_mod( 'set_hero_button_text', 'Learn More' ); ?></a>
                                <!-- <h1>Welcome to WP-TM001 Theme</h1>
                                <p>This is a custom WordPress theme built for learning and experimentation.</p>
                                <p>Bacon ipsum dolor amet strip steak hamburger chicken sausage, ham porchetta doner. Ground round sirloin meatloaf burgdoggen, alcatra sausage chicken shank shankle ball tip spare ribs drumstick flank boudin. Chicken boudin tongue pork belly buffalo, spare ribs pork chop.</p> -->
                            </div>
                        </div>                        
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
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <div class="post-thumbnail">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail( 'medium' ); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
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