<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package musicmacho
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) { return; } ?>
<div class="col-md-3 col-sm-4 col-xs-12">
    <div class="side-area"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
</div>