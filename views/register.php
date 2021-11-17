<?php
    \controllers\accessController::controlAccess();

    if(isset($_POST['register'])){
        \controllers\accessController::signUp($_POST['name'], $_POST['email'], $_POST['password'], $_FILES['image']);
    }
?>

<section class="accessContainer itemsFlex alignCenter justCenter">
    <div class="wrap w40 w90DeviceSmall">
        <div class="boxForm">
            <form method="post" enctype="multipart/form-data" class="itemsFlex alignCenter justCenter flexWrap marginDownSmall">
                <input type="text" name="name" class="w100 marginDownSmall" placeholder="Seu nome..." autocomplete="off" />
                <input type="text" name="email" class="w100 marginDownSmall" placeholder="Seu email..." autocomplete="off" />
                <input type="password" name="password" class="w100 marginDownSmall" placeholder="Sua senha..." autocomplete="off" />
                <input type="file" name="image" class="w100 marginDownSmall" placeholder="Seu nome..." autocomplete="off" />
                <button type="submit" name="register"  class="w30 buttonBgRad">SignUp</button>
            </form>
            <div class="textRight">
                <p>Already have an account? <a href="<?php echo BASE; ?>login">SignIn!</a></p>
            </div>
        </div>
    </div>
</section>