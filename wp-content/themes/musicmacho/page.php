<?php
/**
 * The template for displaying all pages.
 *
 * @package musicmacho
 */
get_header(); ?>
<div class="SingleBlog-wrap">
    <div class="container">
        <?php while ( have_posts() ) : the_post();
        	the_content();
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        endwhile;  ?>
    </div>
</div>
<?php get_footer(); ?>