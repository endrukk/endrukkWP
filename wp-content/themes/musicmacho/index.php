<?php
/**
 * The main template file.
 *
 * @package musicmacho
 */
get_header();
?>

<div id="stories-header" class="panel-grid panel-has-style">
    <div class="stories-parallax">
        <div class="header-hero header-stories">
            <div class="textwidget custom-html-widget">
                <div class="header-text-container">
                    <div class="text-content">
                        <div class="text-wrap">
                            <p class="page-quote">Some bulshit inspirational quote shopuld be here</p>
                            <h1 class="page-title">Stories</h1>
                            <h2 class="page-subtitle">of my life</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="blog_posts" class="blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="content-area">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', get_post_format() );
								wp_link_pages( array(
					                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'musicmacho' ) . '</span>',
					                'after'       => '</div>',
					                'link_before' => '<span>',
					                'link_after'  => '</span>',
					                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'musicmacho' ) . ' </span>%',
					                'separator'   => '<span class="screen-reader-text">, </span>',
					            ) );
							endwhile;
							the_posts_pagination( array(
			                    'prev_text'          => esc_html__( 'Previous page', 'musicmacho' ),
			                    'next_text'          => esc_html__( 'Next page', 'musicmacho' ),
			                ) );
						endif; ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer();
