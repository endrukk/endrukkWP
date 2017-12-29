<?php
/**
 * Custom template tags.
 *
 * @package musicmacho
 */

if ( ! function_exists( 'musicmacho_posted_on' ) ) :

function musicmacho_posted_on() {
	
	$musicmacho_category_list = get_the_category_list(', ','');
	$musicmacho_tag_list = get_the_tag_list('', ', ' );
	$musicmacho_author= ucfirst(get_the_author());
	$musicmacho_author_url= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	$musicmacho_comments = wp_count_comments(get_the_ID()); 	
	$musicmacho_date = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('F d , Y')));
?>	
<ul>
   <li><?php printf( '%s', $musicmacho_date ); ?></li>
   <?php 
   	if(is_single()) { ?>
   	<li><?php _e('By : ', 'musicmacho'); ?><a href="<?php echo esc_url($musicmacho_author_url); ?>" rel="tag"><?php echo $musicmacho_author; ?></a></li>
   	<li><?php if(!empty($musicmacho_category_list)) { ?><?php _e('Category : ', 'musicmacho'); ?><?php echo $musicmacho_category_list; ?></li><?php } ?>
   	<?php } ?>
   <?php if(!empty($musicmacho_tag_list)) { ?>
	<li><?php _e('Tags : ', 'musicmacho'); ?><?php echo $musicmacho_tag_list; ?></li><?php } ?>
   <li><?php $musicmacho_comments = comments_number(__('Comment : 0', 'musicmacho'), __('Comment : 1', 'musicmacho'), __('Comments : %', 'musicmacho')); ?></li>
</ul>
<?php }
endif;
function musicmacho_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	delete_transient( 'musicmacho_categories' );
}
add_action( 'edit_category', 'musicmacho_category_transient_flusher' );
add_action( 'save_post',     'musicmacho_category_transient_flusher' );
/*
 * Comments placeholder function
 * 
 */
add_filter( 'comment_form_default_fields', 'musicmacho_comments_preloader' );
function musicmacho_comments_preloader( $fields ) {
	$fields['author'] = str_replace(
		'<input',
		'<input placeholder="' . _x( 'Name *', 'comment form placeholder', 'musicmacho' ) . '" required', $fields['author']
	);
	$fields['email'] = str_replace(
		'<input',
		'<input id="email" name="email" type="text" placeholder="' . _x( 'Email Id *', 'comment form placeholder', 'musicmacho') . '" required', $fields['email']
	);
	$fields['url'] = str_replace(
		'<input',
		'<input id="url" name="url" type="text" placeholder="' . _x( 'Website URL', 'comment form placeholder', 'musicmacho' ) . '" required', $fields['url']
	);
	return $fields;
}
add_filter( 'comment_form_defaults', 'musicmacho_text_area_insert' );
function musicmacho_text_area_insert( $fields ) {
	$fields['comment_field'] = str_replace(
		'<textarea',
		'<textarea id="comment" aria-required="true" rows="8" cols="45" name="comment" placeholder="'
		. _x(
		'Comment',
		'comment form placeholder',
		'musicmacho'
		)
	. '" ',
	$fields['comment_field']
	);
    return $fields;
}