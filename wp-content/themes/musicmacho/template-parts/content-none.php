<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package musicmacho
 */ ?>
<div class="blog-post-content blog-wrap">
	<div class="col-md-12 col-sm-12 no-padding">
        <div class="blog-content">
	    	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'musicmacho' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
				<?php elseif ( is_search() ) : ?>
					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'musicmacho' ); ?></p>
					<?php get_search_form();
				else : ?>
					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'musicmacho' ); ?></p>
					<?php get_search_form();
				endif; ?>
		</div>
	</div>
</div>