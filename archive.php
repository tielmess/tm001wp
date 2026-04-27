<?php get_header(); ?>
    <div class="page-header">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    </div>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="updates">
                        <div>
                            <!-- <h1><?php echo single_term_title(); ?></h1> -->
                            <?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
                            <div class="archive-description">
                                <?php the_archive_description( '<p>', '</p>' ); ?>
                            </div>

                            <div class="archive-grid">
                                <?php
                                if ( have_posts() ):
                                    while( have_posts() ) : the_post();
                                        get_template_part( 'parts/content', 'archive', get_post_format() );
                                    endwhile;
                                    wp_reset_postdata();
                                else : ?>                       
                                    <p><?php _e( 'No recent posts found.', 'wptm001' ); ?></p>
                                <?php
                                endif;
                                ?>
                            </div>
                            <div class="pagination">
                                <?php
                                the_posts_pagination( array(
                                    'prev_text' => _e( '&laquo; Newer posts', 'wptm001' ),
                                    'next_text' => _e( 'Older posts &raquo;', 'wptm001' ),
                                ) );
                                ?>
                            </div>
                        </div>
                        <?php get_sidebar(); ?>
                    </section>
                </main>
            </div>
        </div>

<?php get_footer(); ?>