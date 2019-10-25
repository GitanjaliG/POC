<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content= "width=device-width, initial-scale=1.0"> 
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- container -->
    <div class="site-container">
        <!-- site-header -->
        <header class="site-header">

            <div class="non-nav-section">
                <nav class="site-nav navbar fixed-top navbar-expand-lg navbar-light" style="background-color:#ffffff;">
                    <div class="header-content">
                        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
                        <!-- <h5>
                            <?php bloginfo('description'); ?>

                            <?php if(is_page('sample-page')){ ?>
                            - Sample text
                            <?php }?>
                        </h5> -->
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        <?php
                            $args = array(
                                'menu'            => 'primary',
                                'theme_location'  => 'primary',
                                'container'       => 'div',
                                'container_id'    => 'bs4navbar',
                                'container_class' => 'collapse navbar-collapse',
                                'menu_id'         => false,
                                'menu_class'      => 'navbar-nav mr-auto',
                                'depth'           => 2,
                                'fallback_cb'     => 'bs4navwalker::fallback',
                                'walker'          => new bs4navwalker()
                            );
                        ?>
                        <?php wp_nav_menu( $args ); ?>
                </nav>
                <!-- <div class="header-search">
                <?php get_search_form(); ?>
                </div> -->
            </div>
           
        </header>
        <!-- /site-header -->