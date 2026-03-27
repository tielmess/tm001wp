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
                </main>
            </div>
        </div>

<?php get_footer(); ?>