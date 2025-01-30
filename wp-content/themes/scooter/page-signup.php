<?php
$msg = '';
if (isset($_POST['submit_registration'])) {
    // Récupération des données du formulaire
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    
    // Validation des champs
    if (empty($username) || empty($email) || empty($password)) {
        $msg = 'Tous les champs sont requis.';
    } elseif (!is_email($email)) {
        $msg = 'Veuillez entrer une adresse email valide.';
    } elseif (username_exists($username)) {
        $msg = 'Ce pseudo est déjà pris. Veuillez en choisir un autre.';
    } elseif (email_exists($email)) {
        $msg = 'Cette adresse email est déjà utilisée.';
    } else {
        // Création de l'utilisateur
        $user_id = wp_create_user($username, $password, $email);
        
        if (is_wp_error($user_id)) {
            $msg = 'Erreur lors de la création du compte : ' . $user_id->get_error_message();
        } else {
            // Connexion automatique après l'inscription (facultatif)
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            wp_redirect(home_url()); // Rediriger l'utilisateur vers la page d'accueil ou une autre page
            exit;
        }
    }
}
get_header(); 
?>

<div class="row bloc">
    <div class="col-md-6 bloc-image">
        <div class="">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/logo1.png" alt="logo">
        </div>
        <div class="text-white txt-left">
            <h1><?= get_bloginfo('name') ?></h1>
            <p><?= get_bloginfo('description') ?></p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/logo1.png" class="" alt="logo">
            </div>
        </div>

        <h1 class="text-center"><?= get_bloginfo('name') ?></h1>
        <p class="text-center"><?= get_bloginfo('description') ?></p>
        <?php if(isset($msg) && $msg != ''){ ?>
            <div class="alert alert-danger">
               <?= $msg ?>
            </div>
        <?php } ?>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="username" class="form-label mt-2">Votre pseudo</label>
                        <input
                            type="text"
                            class="form-inp col-md-12 p-2"
                            name="username"
                            id="username"
                            aria-describedby="helpId"
                            placeholder="Votre pseudo"
                            
                        />
                        <small id="helpId" class="form-text text-muted"></small>

                        <label for="email" class="form-label mt-2">Adresse email</label>
                        <input
                            type="email"
                            class="form-inp col-md-12 p-2"
                            name="email"
                            id="email"
                            aria-describedby="helpId"
                            placeholder="Adresse email"
                            required
                        />
                        <small id="helpId" class="form-text text-muted"></small>
                        <br>

                        <label for="password" class="form-label mt-2">Mot de passe</label>
                        <input
                            type="password"
                            class="form-inp col-md-12 p-2"
                            name="password"
                            id="password"
                            aria-describedby="helpId"
                            placeholder="Mot de passe"
                            required
                        />
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>

                    <button type="submit" class="mt-3 col-md-12 p-2 btn-in" name="submit_registration">
                        S'inscrire
                    </button>

                    <button type="submit" class="mt-3 col-md-12 p-2 btn-out">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/google1.png" alt="google logo">
                        <span class="m-1"> S'inscrire avec Google </span>
                    </button>

                    <p class="mt-4">Vous avez déjà un compte ? <a href="/login" class="ml-5">Connectez-vous</a></p>
                </div>
            </div>
        </form>

    </div>
    
</div>
<?php get_footer(); ?>