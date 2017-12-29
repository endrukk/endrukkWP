<?php
/**
 * The template for displaying author pages.
 *
 * @package musicmacho
 */
get_header(); ?>
<div class="page-heading">
    <div class="container">
        <div class="TitleCenterBlackRussian">
            <div class="line-right animated slideInRight slower go"></div>
            <h3 class="animated slowest delay-250 fadeIn go"><?php  _e('Published by :', 'musicmacho'); echo get_the_author(); ?></h3>
            <div class="line-left animated slideInLeft slower go"></div>
        </div>
    </div>
</div>
<div class="blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 col-xs-12">
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
<?php
get_footer();