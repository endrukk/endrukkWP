<?php
/**
 * The template for displaying comments.
 *
 * @package musicmacho
 */
if ( post_password_required() ) { return; } ?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<div class="row">
            <div class="col-xs-12">
                <div class="comments-count">
					<h3><?php
						 printf(_n('1 Comment', '%1$s Comments', get_comments_number(), 'musicmacho'), number_format_i18n(get_comments_number()), get_the_title());
					?></h3>
				</div>
			</div>
		</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'musicmacho' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'musicmacho' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'musicmacho' ) ); ?></div>
			</div>
		</nav>
		<?php endif; ?>		
		<div class="row">
            <div class="col-xs-12">
                <div class="comment-wrap">
                    <div class="comment">
						<?php wp_list_comments( array( 'style' => 'div', 'avatar_size'=>  60, 'short_ping' => true, ) ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'musicmacho' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'musicmacho' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'musicmacho' ) ); ?></div>
			</div>
		</nav>
		<?php endif;
	endif;
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'musicmacho' ); ?></p>
	<?php endif; comment_form(); ?>
</div>