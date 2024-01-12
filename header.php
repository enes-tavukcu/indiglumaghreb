<!DOCTYPE html>
<html>

  <head <?php language_attributes(); ?>>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php the_title(); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    

    <?php wp_head(); ?>
  </head>
  <body>
    <div>
      <header>

      <div class="header-top">
        <div class="logo">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Logo">
          </a>
        </div>
        
        <div class="menu">
        <?php wp_nav_menu (  
            array( 
                'theme_location' => 'main',
                'container' => 'nav',
                'container_class' => 'main-nav'
            ) ); 
        ?>
        </div> 

      
        <div class="menu-connextion">
        <?php wp_nav_menu (  
            array( 
                'theme_location' => 'connexion',
                'container' => 'nav',
                'container_class' => 'main-nav'
            ) ); 

            
        ?>
        </div>

        
   

      </div>
        
        
      </header>
          </div>
        </body>
      <style>

        header {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9999;
}

        .header-top {
          display: flex;
          
          justify-content: space-between;
          align-items: center;
          padding: 20px 0;
          width: 100%;
          background: linear-gradient(180deg, #000 0%, rgba(0, 0, 0, 0.01) 87.5%);
        }
        
       
        
        .logo img {
          padding-left: 20px;
          width: 189px;
        }
        .main-nav ul {
          display: flex;
          list-style: none;
          margin: 0;
          padding: 0;
          align-items: center;

        }
        .main-nav ul li {
          margin-left: 20px;
        }
        .main-nav ul li:first-child {
          margin-left: 0;
        }
        .main-nav ul li a {
          text-decoration: none;
          color: #fff;
          font: 18px Inter, sans-serif;
        }
        .main-nav ul li a:hover {
          color: #D8561F;
        }
        .menu{
          text-align: center;
        }

        .menu-connextion{
          margin-right: 20px;
        }
        
      
      </style>
