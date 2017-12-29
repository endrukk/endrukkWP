<?php
/**
 * @var $images array
 * @var $max_height int
 * @var $max_width int
 * @var $attachment_size string
 */
?>
<?php if( ! empty( $images ) ) : ?>
	<div class="sow-image-grid-wrapper portfolio-grid"
		<?php if( !empty( $max_width ) ) echo 'data-max-width="' . intval( $max_width ) . '"' ?>
		<?php if( !empty( $max_height ) ) echo 'data-max-height="' . intval( $max_height ) . '"' ?>>
		<?php foreach( $images as $image ) : ?>
			<figure class="effect-ruby <?= $image['position']; ?>">
				<?php echo wp_get_attachment_image( $image['image'], $attachment_size, false, array(
					'title' => strip_tags( $image['title'] )
				) );?>
                <figcaption>
                    <?php if ( ! empty( $image['title'] ) ) : ?>
                        <h2 class="title-div">
                            <?php echo $image['title']; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $image['short_description'] ) ) : ?>
                        <p class="short-desc-div">
                            <?php echo $image['short_description']; ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( ! empty( $image['url'] ) ) : ?>
                    <a href="<?php echo sow_esc_url( $image['url'] ) ?>"
                        <?php foreach( $image['link_attributes'] as $att => $val ) : ?>
                            <?php if ( ! empty( $val ) ) : ?>
                                <?php echo $att.'="' . esc_attr( $val ) . '" '; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>>
                    <?php __('View Read more'); ?>
                    </a>
                    <?php endif; ?>
                </figcaption>
			</figure>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
