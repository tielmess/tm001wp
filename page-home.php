<?php get_header(); ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php
                    $hero_title = get_theme_mod( 'set_hero_title', __('Welcome to WP-TM001 Theme', 'wptm001') );
                    $hero_text = get_theme_mod( 'set_hero_text', __('This is a custom WordPress theme built for learning and experimentation.', 'wptm001') );
                    $hero_button_text = get_theme_mod( 'set_hero_button_text', __('Learn More', 'wptm001') );
                    $hero_button_link = get_theme_mod( 'set_hero_button_link', '#' );
                    $hero_background =  wp_get_attachment_url( get_theme_mod( 'set_hero_background' ) );
                    $hero_height = get_theme_mod( 'set_hero_height', 400 );     
                    ?>
                    <section class="hero" style="background-image: url('<?php echo $hero_background; ?>'); background-size: cover; background-position: center; outline: 1px solid rgba(0, 0, 0, 0.1); height: <?php echo $hero_height; ?>px;">
                        <div class="overlay" style="width: fit-content; background-color: rgba(0, 0, 0, 0.05); padding: 30px 50px; color: #fff; text-align: left; border-radius: 10px;">
                            <div class="">
                                <h1><?php echo $hero_title; ?></h1>
                                <p><?php echo nl2br($hero_text); ?></p>
                                <a class="hero-btn" href="<?php echo $hero_button_link; ?>"><?php echo $hero_button_text; ?></a>
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
                            echo _e( '<p>No recent posts found.</p>', 'wptm001' );
                        endif;
                        ?>
                    </section>

                    <section class="page-container">
                        <h2>Latest Blog Posts</h2>
                        <div class="blog-grid">

                        <?php
                        $home_posts_per_page   = get_theme_mod( 'set_posts_per_page', 5 );
                        $include_ids           = get_theme_mod( 'set_blog_categories', array() );
                        $include_slugs         = get_theme_mod( 'set_blog_category_names', '' );
                        $exclude_ids           = get_theme_mod( 'set_blog_exclude_category', array() );
                        $exclude_slugs         = get_theme_mod( 'set_blog_exclude_category_names', '' );

                        // Initialize Final ID Arrays
                        $final_include_ids = ( ! empty( $include_ids ) ) ? (array) $include_ids : array();
                        $final_exclude_ids = ( ! empty( $exclude_ids ) ) ? (array) $exclude_ids : array();

                        // Convert Include Slugs to IDs and merge
                        if ( ! empty( $include_slugs ) ) {
                            $include_slug_array = explode( ',', str_replace( ' ', '', $include_slugs ) );
                            foreach ( $include_slug_array as $slug ) {
                                $term = get_category_by_slug( $slug );
                                if ( $term ) {
                                    $final_include_ids[] = $term->term_id;
                                }
                            }
                        }

                        // Convert Exclude Slugs to IDs and merge
                        if ( ! empty( $exclude_slugs ) ) {
                            $exclude_slug_array = explode( ',', str_replace( ' ', '', $exclude_slugs ) );
                            foreach ( $exclude_slug_array as $slug ) {
                                $term = get_category_by_slug( $slug );
                                if ( $term ) {
                                    $final_exclude_ids[] = $term->term_id;
                                }
                            }
                        }

                        // Build Final Query Arguments
                        $args = array(
                            'posts_per_page' => $home_posts_per_page,
                            'post_status'    => 'publish',
                        );

                        if ( ! empty( $final_include_ids ) ) {
                            $args['category__in'] = array_unique( $final_include_ids );
                        }

                        if ( ! empty( $final_exclude_ids ) ) {
                            $args['category__not_in'] = array_unique( $final_exclude_ids );
                        }

                        // DEBUG: Uncomment the next line if it still fails to see exactly what is being sent to WP
                        // echo '<pre>'; print_r($args); echo '</pre>';

                        $recent_posts = new WP_Query( $args );

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
                                        <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                                    </div>
                                    <div class="read-more">
                                        <a class="read-more-btn" href="<?php the_permalink(); ?>">Read&nbsp;the full post <span class="sr-only"><?php the_title(); ?></span><span class="arrow">&rArr;</span></a>
                                    </div>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else : ?>
                        
                            <p><?php _e( 'No recent posts found.', 'wptm001' ); ?></p>
                        <?php
                        endif;
                        ?>
                        </div>
                    </section>
                </main>
            </div>
        </div>

<?php get_footer(); ?>