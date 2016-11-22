<?php get_header(); ?>
<div class="container">
    <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 margin-5px">
                <?php if ( is_active_sidebar( 'home_left' ) ) : ?>                    
                    <?php dynamic_sidebar( 'home_left' ); ?>                       
               <?php endif; ?>                   
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 no-left-padding no-right-padding margin-5px">
                <?php putUniteGallery("homesmall", 1); ?>            
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 margin-5px">         
                <?php if ( is_active_sidebar( 'home_right' ) ) : ?>                    
                    <?php dynamic_sidebar( 'home_right' ); ?>                       
                <?php endif; ?>                             
            </div>
        
    </div>   
    
    <div style="clear: both;"></div>
      
    <div class="row">        
        <div class="block-title-w col-md-12">
            <h2 class="block-title">10 MOTIVE SA ALEGI MIRCEA SEMINEE</h2>             
        </div>
    </div>    
    
    <div class="row">
        <div class="col-md-12">
            <?php if ( is_active_sidebar( 'home_middle' ) ) : ?>
                    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'home_middle' ); ?>
                    </div><!-- #primary-sidebar -->
            <?php endif; ?>            
        </div>
    </div>

</div>

    <div style="clear: both;"></div>
<?php get_footer(); ?>
