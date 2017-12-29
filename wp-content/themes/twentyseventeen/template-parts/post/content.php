<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
$postClass = 'col-md-4 col-sm-6 ccl-xs-12';
if ( is_sticky() && is_home() ){
    $postClass = 'col-12';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($postClass . ' article' ); ?>>
	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>

            <div class="article-content">
                <header class="entry-header">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if ( is_single() ) {
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        } elseif ( is_front_page() && is_home() ) {
                            the_title( '<h3 class="entry-title">', '</h3>' );
                        } else {
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        }
                        ?>
                    </a>
                </header><!-- .entry-header -->
                <div class="entry-content">
                    <?=get_the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="read-more" rel="nofollow">Continue reading</a>
                </div><!-- .entry-content -->

            </div>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<?php
	if ( is_single() ) {
		twentyseventeen_entry_footer();
	}
	?>

</article><!-- #post-## -->
