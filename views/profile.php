<?php
    if(isset($_POST['update'])){
        \models\usersModel::updateUser($_POST['name'], $_POST['email'], $_POST['password'], $_FILES['image']);
    }
?>
<section class="containerUser w100 h100 itemsFlex alignCenter justCenter">
    <div class="wrap w60">
        <form method="post">
            <div class="box">
                <figure class="imgBiggerUser marginDownSmall textCenter">
                    <label for="image" name="image" value="<?php echo $_SESSION['image']; ?>">
                        <img src="<?php echo BASE; ?>uploads/<?php echo $_SESSION['image']; ?>" />
                    </label>
                    <input type="file" name="image" value="<?php echo $_SESSION['image']; ?>" id="image" />
                </figure>
                <div class="infosProfile itemsFlex flexWrap justCenter">
                    <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" class="w100 marginDownSmall" />
                    <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" class="w100 marginDownSmall" />
                    <input type="text" name="password" value="<?php echo $_SESSION['password']; ?>" class="w100 marginDownSmall" />
                    <button name="update" class="w30">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
</section>