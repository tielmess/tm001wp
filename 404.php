<?php get_header(); ?>

    <div id="nofind" class="content-area">
        <main id="main" class="site-main">
            <section class="error-404 not-found">
                <h1>404 - Page Not Found</h1>
                <p>Sorry, the page you are looking for does not exist. Please check the URL or return to the homepage.</p>
                <a href="<?php echo home_url(); ?>" class="button">Go to Homepage</a>
            </section><!-- .error-404 -->
        </main><!-- #main -->
    </div><!-- #nofind --> 
<?php get_footer(); ?>