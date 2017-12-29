<?php
/**
 * Template part for displaying posts.
 *
 * @package musicmacho
 */ ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post-content">
		<?php if ( has_post_thumbnail() ) { ?>
		    <div class="image-content no-padding">
		        <div class="blog-image">
		            <?php the_post_thumbnail( 'large', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>
		        </div>
		    </div>
		    <div class="text-content no-padding">
		        <div class="blog-content">
		            <div class="title-data">
		                <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
		            </div>
		            <div class="content-text">
		                <?php the_excerpt(); ?>
		            </div>

                    <div class="post-foot">
                        <div class="post-date">
                            <?php echo get_the_date('d F Y'); ?>
                        </div>
                    </div>
                    <div class="post-foot">
                        <div class="Blog-link">
		                    <a class="btn-black trans" href="<?php the_permalink(); ?>"><?php _e('READ MORE','musicmacho')?></a>
                        </div>
                    </div>

		        </div>
		    </div>
	    <?php } else { ?>
		    <div class="col-md-12 col-sm-12 no-padding">
		        <div class="blog-content">
		            <div class="title-data">
		                <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
		                <?php musicmacho_posted_on(); ?>
		            </div>
		            <div class="content-text">
		                <?php the_excerpt(); ?>  
		            </div>
		        </div>
		    </div>
		<?php } ?>
	 </div>
</div>