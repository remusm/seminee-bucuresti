<?php get_header(); ?>

	<div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">BROSURI DISPONIBILE PENTRU DOWNLOAD</h1>
                </div>
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-md-3">
                            <?php
                                $thumbnail_id = get_post_thumbnail_id();
                                $thumbnail_url = wp_get_attachment_image_src ( $thumbnail_id, 'thumbnail-size', true );
                                $thumbnail_meta = get_post_meta ( $thumbnail_id, '_wp_attachment_image_alt', true );
                            ?>

                            
                            <?php the_post_thumbnail( 'large' );?>                        
                            
                            <div class="flyer-title text-center">                                
                                <?php echo strtoupper(the_title ()); ?>                                
                            </div>
                            <div class="flyer-content text-center">
                                <?php the_content(); ?>
                            </div>
                                         

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
	</div><!-- .content-area -->

<?php get_footer(); ?>
