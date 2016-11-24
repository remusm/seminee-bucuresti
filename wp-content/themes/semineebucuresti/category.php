<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="blog-category-wrapper">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4" style="margin-bottom: 2em;">
                    <?php
                        $thumbnail_id = get_post_thumbnail_id();
                        $thumbnail_url = wp_get_attachment_image_src ( $thumbnail_id, 'thumbnail-size', true );
                        $thumbnail_meta = get_post_meta ( $thumbnail_id, '_wp_attachment_image_alt', true );
                    ?>

                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'large' );?>                        
                    </a>  

                    <div class="post-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo strtoupper(the_title ()); ?>
                        </a>
                    </div>
                    <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
                    <p class="post-date"><span><?php echo get_the_date('d-m-Y'); ?></span></p>                    

                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
