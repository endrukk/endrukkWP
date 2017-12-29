<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package musicmacho
 */

get_header(); ?>
<div class="page-heading">
    <div class="container">
        <div class="TitleCenterBlackRussian">
            <div class="line-right animated slideInRight slower go"></div>
            <h3 class="animated slowest delay-250 fadeIn go"><?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'musicmacho' ); ?></h3>
            <div class="line-left animated slideInLeft slower go"></div>
        </div>
    </div>
</div>
<div class="blog-post-content blog-wrap">
	<div class="col-md-12 col-sm-12">
        <div class="blog-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'musicmacho' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>
<?php get_footer();