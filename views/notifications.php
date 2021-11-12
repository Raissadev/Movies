<?php
    $notifications = \models\usersModel::getNotification();
    foreach($notifications as $key => $value){
        $isUser = explode(',',$value['user_id']);
        $isArray = array_search($_SESSION['id'], $isUser);
        if($isArray == true){
?>

<section class="container">
    <div class="wrap w90 center">
        <div class="box marginDownSmall">
            <h4><?php echo $value['message']; ?></h4>
        </div>
    </div>
</section>

<?php }} ?>