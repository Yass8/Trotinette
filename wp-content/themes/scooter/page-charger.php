<?php get_header();  ?>
<body>
<div class="row bloc">
    <div class="col-md-6 col-sm-12 bloc-charger">
      <?php  while ( have_posts() ) : the_post(); ?>
        <div class="p-4">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="d-flex justify-content-center">
            <div class="col-md-2">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/logo1.png" class="" alt="logo">
            </div>
        </div>

        <h1 class="text-center"><a href="/"><?php echo get_bloginfo('name') ?></a></h1>
        <p class="text-center"><?php echo get_bloginfo('description') ?></p>
        <form action="" class="" >
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="" class="form-label mt-2">Votre pseudo</label>
                        <input
                            type="text"
                            class="form-inp col-md-12 p-2"
                            name=""
                            id=""
                            aria-describedby="helpId"
                            placeholder="Votre pseudo"
                        />
                        <small id="helpId" class="form-text text-muted"></small>
                        <label for="" class="form-label mt-2">Adresse email</label>
                        <input
                            type="email"
                            class="form-inp col-md-12 p-2"
                            name=""
                            id=""
                            aria-describedby="helpId"
                            placeholder="Adresse email"
                        />
                        <small id="helpId" class="form-text text-muted"></small>
                        <br>
                        <label for="" class="form-label mt-2">Mot de passe</label>
                        <input
                            type="password"
                            class="form-inp col-md-12 p-2"
                            name=""
                            id=""
                            aria-describedby="helpId"
                            placeholder="Mot de passe"
                        />
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    
                    <button
                        type="submit"
                        class="mt-3 col-md-12 p-2 btn-in"
                    >
                        S'inscrire(en tant que chargeur)
                    </button>

                    <button
                        type="submit"
                        class="mt-3 col-md-12 p-2 btn-out"
                    >
                      <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/google1.png" alt="google logo"> <span class="m-1"> S'inscrire avec google </span>
                    </button>

                    <p class="mt-4">Vous avez déjà un compte? <a href="/login" class="ml-5">Connectez-vous</a></p>
                </div>
            </div>
            
        </form>
    </div>
    
</div>
<?php get_footer(); ?> 