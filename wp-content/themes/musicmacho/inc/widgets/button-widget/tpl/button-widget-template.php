<?php
$classes = array();
if( !empty($instance['musicmacho_design']['musicmacho_hover']) ) $classes[] = 'button-hover';
?>
<div class="button-base button-align-<?php echo esc_attr($instance['musicmacho_design']['musicmacho_align']) ?>">
	<?php
	$musicmacho_button_attributes = array(
		'class' => esc_attr(implode(' ', $classes))
	);
	if(!empty($instance['musicmacho_new_window'])) $musicmacho_button_attributes['target'] = '_blank';
	if(!empty($instance['musicmacho_url'])) $musicmacho_button_attributes['href'] = sow_esc_url($instance['url']);
	if(!empty($instance['musicmacho_attributes']['musicmacho_id'])) $musicmacho_button_attributes['musicmacho_id'] = esc_attr($instance['musicmacho_attributes']['musicmacho_id']);
	if(!empty($instance['musicmacho_attributes']['musicmacho_title'])) $musicmacho_button_attributes['musicmacho_title'] = esc_attr($instance['musicmacho_attributes']['musicmacho_title']);
	if(!empty($instance['musicmacho_attributes']['musicmacho_onclick'])) $musicmacho_button_attributes['musicmacho_onclick'] = esc_attr($instance['musicmacho_attributes']['musicmacho_onclick']);
	?>
	<a <?php foreach($musicmacho_button_attributes as $musicmacho_name => $musicmacho_val) echo $musicmacho_name . '="' . $musicmacho_val . '" ' ?> >
			<?php
				if( !empty($instance['musicmacho_button_icon']['musicmacho_icon']) ) { ?>
				<div class="sow-icon-image" style="<?php echo implode('; ', $musicmacho_icon_styles) ?>"></div>
				<?php }
				else {
					$musicmacho_icon_styles = array();
					if(!empty($instance['musicmacho_button_icon']['musicmacho_icon_color'])) $musicmacho_icon_styles[] = 'color: '.$instance['musicmacho_button_icon']['musicmacho_icon_color'];
					echo siteorigin_widget_get_icon($instance['musicmacho_button_icon']['musicmacho_icon_selected'], $musicmacho_icon_styles);
				} ?>
			<?php echo siteorigin_widget_get_icon( $instance['musicmacho_button_icon']);
			echo wp_kses_post($instance['musicmacho_text']); ?>
	</a>
</div>