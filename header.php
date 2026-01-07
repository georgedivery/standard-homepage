<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <header id="masthead" class="site-header">
            <div class="shell">
                <div class="header-inner">

                    <div class="site-branding">
                        <div class="site-logo">
                         <a href="<?php echo home_url();?>">
                            
                               <img src="<?php echo esc_url( get_template_directory_uri())?>/assets/images/Logo.png"
                                alt="#">
                         </a>
                        </div>
                    </div>

                    <nav id="site-navigation" class="main-navigation">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_id' => 'primary-menu',
                                'container' => false,
                                'fallback_cb' => 'devrix_fallback_menu',
                            ));
                        ?>
                    </nav>

                    <div class="header-sub-nav">
                        <a href="#" class="btn-search">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                    stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M20.9999 21L16.6499 16.65" stroke="#D9D9D9" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <a href="#" class="btn-world">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                    stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 12H22" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2V2Z"
                                    stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <span class="btn-burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>

                </div>
            </div>
        </header>