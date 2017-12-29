<?php
/**
 * The template for displaying all single posts.
 *
 * @package musicmacho
 */
get_header();
while ( have_posts() ) : the_post(); ?>
    <div class="page-heading">
        <div class="container">
            <div class="TitleCenterBlackRussian">
                <div class="line-right animated slideInRight slower go"></div>
                <h3 class="animated slowest delay-250 fadeIn go"><?php the_title();?></h3>
                <div class="line-left animated slideInLeft slower go"></div>
            </div>
        </div>
    </div>
    <div class="SingleBlog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="content-area">
                        <div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                        	<div class="singleblog-post-content">
                                <?php if ( has_post_thumbnail() ) { ?>
                                <div class="singleblog-image">
                                    <?php the_post_thumbnail( 'musicmacho-single-blog-thumbnail-image', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>
                                </div>
                                <?php } ?>
                                <div class="content-text">
                                    <?php the_content(); ?>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="singleblog-connection">
                                            <div class="singleblog-tag">
                                                <?php echo get_the_tag_list('','',''); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="author-wrap">
                                            <div class="author-image">
                                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
                                            </div>
                                            <div class="author-content">
                                                <h4>
                                                    <?php

                                                    echo __('Created by ', 'musicmacho');
                                                    the_author_meta( 'nicename' );

                                                    ?>
                                                </h4>
                                                <p>
                                                    <?php $authorDesc = the_author_meta('description'); ?>
                                                </p>
                                                <p>
                                                    <?php echo __('on ', 'musicmacho') . get_the_date('d F Y'); ?>
                                                </p>
                                                <div class="share">
                                                    <span><?php echo __('Share this page:', 'musicmacho'); ?></span>
                                                    <div class="share-facebook">
                                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="share-twitter">
                                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    				</div>
    			</div>
    			<?php /*
                    get_sidebar();
                 */?>
    		</div>
    	</div>
    </div>
<?php endwhile;
get_footer();