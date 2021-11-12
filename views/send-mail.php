<?php
    \controllers\accessController::controlAccessType();

    if(isset($_POST['send-mail'])){
        \controllers\mailController::email(implode(',',$_POST['user_id']), $_POST['name'], $_POST['email'], $_POST['message'], date('Y-m-d'));
    }
?>

<section class="mailContainer h100 itemsFlex alignCenter justCenter">
    <div class="wrap w80">
        <div class="box">
            <form method="post" enctype="multipart/form-data" class="itemsFlex alignCenter justCenter flexWrap marginDownSmall">
                <ul class="w100 itemsFlex alignCenter">
                <?php
                    $users = \models\usersModel::getUsers();
                    foreach($users as $key => $value){
                ?>
                    <li class="marginRightSmall marginDownSmall itemsFlex alignCenter">
                        <input type="checkbox" name="user_id[]" value="<?php echo $value['id']; ?>" class="inputCheck" />
                        <input type="hidden" name="name" value="<?php echo $value['name']; ?>" />
                        <input type="hidden" name="email" value="<?php echo $value['email']; ?>" />
                        <p class="marginLeftSmall"><?php echo $value['email']; ?></p>
                    </li>
                <?php } ?>
                </ul>
                <input type="text" name="message" class="w100 marginDownSmall" placeholder="Sua mensagem..." autocomplete="off" />
                <button type="submit" name="send-mail"  class="w30 buttonBgRad">Send Mail</button>
            </form>
        </div>
    </div>
</section>