<?php
$msg = '';
if (isset($_POST['submit_login'])) {
    
    $email = sanitize_email($_POST['user_email']);
    $password = sanitize_text_field($_POST['user_password']);
    $remember = isset($_POST['rememberme']) ? true : false;

    
    if (empty($email) || empty($password)) {
        $msg = 'Veuillez remplir tous les champs.';
    } else {
        
        $user = wp_authenticate($email, $password);

        if (is_wp_error($user)) {
            $msg = $user->get_error_message();
        } else {
            
            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID, $remember);
           
            wp_redirect(home_url());
            exit;
        }
    }
}

get_header(); 

?>

<div class="row bloc">
    <div class="col-md-6 bloc-login">
        <div class="mt-2 login-logo">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/logo1.png" alt="logo">
        </div>

        <h1 class="text-center"><a href="/"><?php echo get_bloginfo('name') ?></a></h1>
        <p class="text-center"><?php echo get_bloginfo('description') ?></p>
        <?php if(isset($msg) && $msg != ''){ ?>
            <div class="alert alert-danger">
               <?= $msg ?>
            </div>
        <?php } ?>
            <div class="d-flex justify-content-center">
                <div class="col-md-6 log-form d-flex justify-content-center">
                <form action="" method="post">
                    <div class="mb-1">
                        <label for="user_email" class="form-label mt-2">Adresse email</label><br>
                        <input
                            type="text"
                            class="form-inp col-md-12 p-2"
                            name="user_email"
                            id="user_email"
                            placeholder="Adresse email"
                            required
                        />
                        <small class="form-text text-muted"></small>
                        <br>

                        <label for="user_password" class="form-label mt-2">Mot de passe</label><br>
                        <input
                            type="password"
                            class="form-inp col-md-12 p-2"
                            name="user_password"
                            id="user_password"
                            placeholder="Mot de passe"
                            required
                        />
                        <small id="helpIdn" class="form-text text-muted"></small>
                    </div>

                    <div class="d-flex justify-content-between mt-3 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rememberme" id="rememberme" />
                            <label class="" for="rememberme"> Se souvenir de moi </label>
                        </div>
                        <div>
                            <a href="<?php echo wp_lostpassword_url(); ?>">Mot de passe oublié!</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="mt-3 col-md-12 p-2 btn-in" name="submit_login">
                            Se connecter
                        </button>

                        <button type="button" class="mt-3 col-md-12 p-2 btn-out">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/google1.png" alt="google logo">
                            <span class="m-1"> Se connecter avec Google </span>
                        </button>
                    </div>

                    <p class="mt-5">Vous n'avez pas de compte? <a href="/signup" class="ml-5">Inscrivez-vous</a></p>
                </form>

                </div>
            </div>
    </div>
    <div class="col-md-6 bloc-image">
        <div class="float-end">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logos/logo1.png" alt="logo">
        </div>
        <div class="text-white txt">
            <h1><?= get_bloginfo('name') ?></h1>
            <p><?= get_bloginfo('description') ?></p>
        </div>
    </div>
</div>


<script>
        function applyClassBasedOnScreenSize() {
            const element = document.querySelector('.bloc-login');
            const blocImg = document.querySelector('.bloc-image');
            const screenWidth = window.innerWidth;

            if (screenWidth >= 601 && screenWidth <= 1268) {
                element.classList.add('col-md-12');
                element.classList.remove('col-md-6');
                blocImg.classList.remove('col-md-6');
            } else {
                element.classList.remove('col-md-12');
                element.classList.add('col-md-6');
                blocImg.classList.add('col-md-6');
            }
        }

        window.onload = applyClassBasedOnScreenSize;
        window.onresize = applyClassBasedOnScreenSize;
    </script>
<?php get_footer(); ?>