<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php bloginfo(); ?></title>
    
    <?php wp_head(); ?>
  </head>

  <body>
    <div class="container">
        <div class="row">   
            
            <div class="col-md-4">
                <div class="logo">
                    <a href="<?php bloginfo('url'); ?>" title="Seminee Bucuresti"><img src="<?php echo get_template_directory_uri().'/images/logo.png';?>" width="200" alt="Logo Seminee Bucuresti" ></a>                 
                </div>
            </div>
            
            <div class="col-md-4 header-contact">                
                <p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;0749 06 57 82 &nbsp;&nbsp; 
                    | &nbsp;&nbsp;&nbsp;0743 55 00 00</p>
                <p><i class="fa fa-clock-o" aria-hidden="true"></i> Program showroom: 09:00 - 20:00</p>
            </div>
            
            <div class="col-md-4 text-right">                
                <ul class="top-links">
                    <li class="first"><a href="<?php bloginfo('url');?>/category/bine-de-stiut">BINE DE STIUT</a> | </li>
                    <li><a href="<?php bloginfo('url');?>/product-category/ultimele-montaje">ULTIMELE MONTAJE</a> | </li>
                    <li><a href="<?php bloginfo('url');?>/contact">CONTACT</a></li>
                </ul>       
                <?php get_search_form(); ?>
            </div>            
        </div>
             
    </div>
    <div class="nav-wrapper">  
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">              
            <?php
              $args = array (
                  'menu'  => 'header-menu',
                  'menu_class'    => 'nav navbar-nav',
                  'container'     => false,
                  'walker'        => new WPT_Custom_Walker_Nav_Menu   
              );

              wp_nav_menu( $args );
              ?>    
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>                  
      
    </div> <!-- /container -->
    </div>
    
    <?php if(!is_front_page()) { ?>
    <div class="breadcrumbs">  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php do_action('woo_custom_breadcrumb'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>