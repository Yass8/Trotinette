<?php

$args = array(
    'posts_per_page' => 3,
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC'
);
$query = new WP_Query($args); 

get_header(); 
?>

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    <section class="banner-image-bg text-center pt-5">
        <?php dynamic_sidebar('slogan') ?>
    </section>

    <section class="tarif mb-3 py-3">
        <div class="row">
            <?php dynamic_sidebar('tarif') ?>
        </div>
    </section>

    <section class="events mt-3 container">
        <h2 class="text-uppercase text-center">Nos derniers blogs</h2>
        <div class="row d-flex justify-content-center my-3">
        <?php    
        if ($query->have_posts()) {
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="card p-0 col-md-3 mt-3 mx-3">
                    <!-- Image de l'article -->
                     <a href="<?php the_permalink() ?>" class="text-decoration-none">
                    <?php if (has_post_thumbnail()) : ?>
                        <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <?php else : ?>
                        <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri() ?>/images/3.png" alt="image par défaut">
                    <?php endif; ?>
                     </a>
                    <div class="card-body">
                        <h4><a href="<?php the_permalink() ?>" class="text-decoration-none text-black"><?php the_title(); ?></a></h4>
                
                        <p style="color: #299290;">
                            <?php 
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo esc_html($categories[0]->name); // Afficher la première catégorie
                            }
                            ?>
                        </p>

                        <p class="text-muted">Publié <?php echo get_the_date('d F Y'); ?></p>

                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
            }else{
            echo '<p>Aucun article trouvé.</p>';
        } ?>
        </div>
        <div class="text-center my-3">
            <button type="button"><a href="/blogs">Voir tous nos blogs</a></button>
        </div>
    </section>

    <section class="stats my-3 py-3">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center justify-content-center">
                <h3 class="text-uppercase">Nos statistiques</h3>
                
            </div>
            <div class="col-md-9 row d-flex justify-content-center text-white">
                <div class="col-md-4 col-sm-6">
                    <div class="p-4 card bg-dark d-flex align-items-center justify-content-center">
                        <?php dynamic_sidebar('nombre-trottinnette') ?>
                        <p class="text-uppercase text-white">Trottinettes</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                <div class="p-4 card bg-dark d-flex align-items-center justify-content-center">
                        <?php dynamic_sidebar('nombre-chargeur') ?>
                        <p class="text-uppercase text-white">Chargeurs</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="galerys container my-3">
        <h2 class="text-uppercase text-center">Nos galeries</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-md-3">
                <div class="card border-0">
                    <img class="card-img-galerie img-vertical" src="<?php echo get_stylesheet_directory_uri() ?>/images/Lyon/rue-de-la-republique-lyon.png" alt="">
                </div>
            </div>
            <div class="col-md-6 row">
                <div class="col-md-6">
                    <div class="card border-0">
                        <img class="card-img-galerie img-horizontal" src="<?php echo get_stylesheet_directory_uri() ?>/images/Lyon/rue-de-la-republique-lyon.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0">
                        <img class="card-img-galerie img-horizontal" src="<?php echo get_stylesheet_directory_uri() ?>/images/Lyon/centre-lyon3.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0">
                        <img class="card-img-galerie img-horizontal" src="<?php echo get_stylesheet_directory_uri() ?>/images/Lyon/rue-de-la-republique-lyon.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0">
                        <img class="card-img-galerie img-horizontal" src="<?php echo get_stylesheet_directory_uri() ?>/images/Lyon/rue-de-la-republique-lyon-2030.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
            <div class="card border-0">
                <img class="card-img-galerie img-vertical" src="<?php echo get_stylesheet_directory_uri() ?>/images/Lyon/rue-de-la-republique-lyon.png" alt="">
            </div>
            </div>
        </div>
    </section>
    <section class="mobile">
        <div class="row">
            <div class="captures col-md-6 d-flex justify-content-center align-items-center p-5">
                <img class="" src="<?php echo get_stylesheet_directory_uri() ?>/images/mobiles/img-mobile-removebg-preview.png" alt="">
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div>
                    <h3 class="text-uppercase">Téléchargez l'application sur :</h3>
                    <div class="icon-mobile d-flex justify-content-center align-items-center pb-3">
                        <a href="https://play.google.com/" class="text-decoration-none"><img class="" src="<?php echo get_stylesheet_directory_uri() ?>/images/mobiles/playstore.png" alt=""></a>
                        <a href="https://www.apple.com/fr/app-store/" class="text-decoration-none"><img class="app-store" src="<?php echo get_stylesheet_directory_uri() ?>/images/mobiles/appstore.png" alt=""></a>    
                        <!-- <button type="button"></button> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php endwhile; endif; ?>
	
<?php get_footer(); ?>