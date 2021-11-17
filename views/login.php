<?php
    \controllers\accessController::controlAccess();

    if(isset($_POST['login'])){
        \controllers\accessController::signIn($_POST['name'],$_POST['password']);
    }
?>

<section class="accessContainer itemsFlex alignCenter justCenter">
    <div class="wrap w40 w90DeviceSmall">
        <div class="boxForm">
            <form method="post" class="itemsFlex alignCenter justCenter flexWrap marginDownSmall">
                <input type="text" name="name" class="w100 marginDownSmall" placeholder="Seu nome..." autocomplete="off" />
                <input type="password" name="password" class="w100 marginDownSmall" placeholder="Sua senha..." autocomplete="off" />
                <button type="submit" name="login"  class="w30 buttonBgRad">SignIn</button>
            </form>
            <div class="textRight">
                <p>Don't have an account? <a href="<?php echo BASE; ?>register">Create!</a></p>
            </div>
        </div>
    </div>
</section>