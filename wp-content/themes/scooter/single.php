<?php get_header(); ?>

<?php  while ( have_posts() ) : the_post(); ?>

<div class="container d-flex justify-content-center row p-5">
    <div class="col-md-3">
        <div class="card border-0">
            <?php if (has_post_thumbnail()) : ?>
                <img class="card-img-blog" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <?php else : ?>
                <img class="card-img-blog" src="<?php echo get_stylesheet_directory_uri() ?>/images/3.png" alt="image par défaut">
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-7 px-3">
        <p style="color: #299290;">
            <?php 
            $categories = get_the_category();
            if (!empty($categories)) {
                echo esc_html($categories[0]->name); // Afficher la première catégorie
            }
            ?>
        </p>
        <h3><?php echo get_the_title() ?></h3>
        <div class="contenu"><?php echo get_the_content(); ?></div>

        <p class="text-muted">Publié le <?php echo get_the_date() ?> - Par <?php echo get_the_author() ?></p>
    </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>