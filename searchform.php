<?php   
/**
 * Template Name: Search Form Template
 * 
 * Description: Search form template file   
 *
 * This is the template that displays the search form.
 * Please note that this is the WordPress construct of search forms and that other 'search' types (e.g. search-product.php) will require a different template.      
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package WP_TM001
 * 
 */ 

?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ) ?>" >
    <div>
        <label for="s"><?php _e( 'Search for', 'wptm001' ); ?>:</label>
        <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
        <input type="submit" id="searchsubmit" value="<?php _e( 'Search', 'wptm001' ); ?>" />
    </div>	
</form>
    