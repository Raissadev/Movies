<section class="usersContainer">
    <div class="wrap w90 center itemsFlex flexWrap">
    <?php
        $users = \models\usersModel::getUsers();
        foreach($users as $key => $value){
    ?>
        <div class="box w30 marginRightDefault marginDownSmall">
            <figure class="imgBiggerUser marginDownSmall textCenter">
                <img src="<?php echo BASE; ?>uploads/<?php echo $value['image']; ?>" />
            </figure>
            <div class="col textCenter">
                <h4><?php echo $value['name']; ?></h4>
                <p><?php echo $value['email']; ?></p>
            </div>
        </div>
    <?php } ?>
    </div>
</section>