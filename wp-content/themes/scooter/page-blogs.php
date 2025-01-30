<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1
);
$query = new WP_Query($args);
get_header();
?>

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
                        <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri() ?>/images/banner1.jpg" alt="image par défaut">
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
</section>

<?php get_footer(); ?>
