
<footer class="pt-2">
    <div class="row">
        <!-- <div class="col-md-1"></div> -->
        <div class="col-md-1 col-sm-12"><h3 class="" style="margin-left: 10px"><?php echo get_bloginfo('name') ?></h3></div>
        <div class="col-md-9 col-sm-12 reseaux mt-1">
            <a href="">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/reseaux/facebook.png" alt="watsapp">
            </a>
            <a href="">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/reseaux/tiktok.png" alt="watsapp">
            </a>
            <a href="">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/reseaux/instagram.png" alt="watsapp">
            </a>
            <a href="">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/reseaux/linkedin.png" alt="watsapp">
            </a>
            <a href="">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/reseaux/twitter.png" alt="watsapp">
            </a>
        </div>
        <div class="footer-logo col-md-2">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/logo1.png" class="float-end" alt="logo">
        </div>
    </div>
    <div class="row">
    <?php wp_nav_menu( array(
            "theme_location" => "footer-menu",
            "menu_class" => "footer-menu",
            "container" => "",
        )	 
    ); ?>
    </div>
</footer>

<?php wp_footer(); ?>
<script>
    const menu = document.querySelector('.navb');
    const navBtn = document.querySelector('.nav-btn');
    const open = document.getElementById('icon-menu');
    const close = document.getElementById('icon-close');
    function open_menu() {
        menu.style.display = "block";
        navBtn.style.display = "block";
        close.style.display = "block";
        open.style.display = "none";
    }

    function close_menu() {
        menu.style.display = "none";
        navBtn.style.display = "none";
        close.style.display = "none";
        open.style.display = "block";
    }

    
</script>
</body>
</html>