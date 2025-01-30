<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Trottinette partagée dans le vieux Lyon">
	<meta name="description" content="Mobilité douce Presqu'île Lyon">
    <title><?= get_bloginfo('name') ?></title>
	<?php wp_head(); ?>
</head>
<body>


<header>
    <div class="logo d-flex align-items-center">
	    <div class="d-flex align-items-center">
            <?php the_custom_logo() ?>
            <h5 class="mx-3"><?= get_bloginfo('name') ?></h5>
        </div>
        <div class="icon-btn-menu">
            <img id="icon-menu" onclick="open_menu()" src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/reseaux/menu.png" alt="menu-open">
            <img id="icon-close" onclick="close_menu()" src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/reseaux/close.png" alt="menu-close">
        </div>
    </div>
    <nav class="row bloc-nav">
        <div class="col-md-7">
			<?php wp_nav_menu( array(
					"theme_location" => "principal",
					"menu_class" => "navb",
					"container" => "",
				)	 
			); ?>
        </div>
        <div class="col-md-5 nav-btn">
            <button class="btn-chrg px-4"><a href="/charger"> Dévenir un chargeur</a></button>
            <?php if ( is_user_logged_in() ) { ?>
                <button class="btn-connect mx-4"><a href="<?php echo wp_logout_url( home_url() ); ?>" class="text-decoration-none">Se déconnecter</a></button>            
            <?php } else { ?>
                
                <button class="btn-connect mx-4"><a href="/login" class="text-decoration-none">Se connecter</a></button>
            <?php } ?>
        </div>
    </nav>
</header>
<div class="banner text-white">
    <?php dynamic_sidebar('promotion') ?>
</div>