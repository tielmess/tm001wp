<?php get_header(); ?>
    <div class="page-header">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    </div>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="updates">
                        <h1>Blog Posts</h1>
                        <div class="blog-grid">
                            <?php
                            if ( have_posts() ):
                                while( have_posts() ) : the_post();
                            ?>
                                <article class="post card">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="post-info">
                                        <p class="post-meta">Posted on <?php the_time('M j, Y'); ?> <br>by <?php the_author(); ?></p>
                                        <p class="post-categories">Categories: <?php the_category( ', ' ); ?></p>
                                        <p class="post-tags">Tags: <?php the_tags( '', ', ' ); ?></p>
                                        <p class="post-comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></p>
                                    </div>
                                    <div class="entry-summary">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                        <a href="<?php the_permalink(); ?>">Read&nbsp;More</a>
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