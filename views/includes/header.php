<!DOCTYPE html>
<html>
<head>
    <title>MyFilmes</title>
    <meta charset="utf-8" />
    <link href="<?php echo BASE; ?>css/global.css" rel="stylesheet"/>
    <link href="<?php echo BASE; ?>css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
<?php  
    \models\usersModel::logout(); 
    if($slug !== 'login' && $slug !== 'register'){
?>
<aside class="aside displayInlineFlexColumn hideDeviceSmall">
    <div class="wrap itemsFlex flexWrap">
        <div class="logo marginDownSmall w100">
            <h1 class="titleStrong">MyFilmes<span style="color:var(--myRad);">.</span></h1>
        </div>
        <div class="row marginDownSmall">
            <p class="marginDownSmallIn">Menu</p>
            <ul class="menu">
                <li><a href="<?php echo BASE; ?>"><i class="ri-compasses-2-line marginRightSmall"></i> <h6>Browser</h6></a></li>
                <li><a href="<?php echo BASE; ?>watchlist"><i class="ri-heart-line marginRightSmall"></i> <h6>Watchlist</h6></a></li>
                <li><a href="<?php echo BASE; ?>movies"><i class="ri-airplay-line marginRightSmall"></i> <h6>Movies</h6></a></li>
            </ul>
        </div>
        <div class="row marginDownSmall w100">
            <p class="marginDownSmallIn">Social</p>
            <ul class="menu">
                <li><a href="<?php echo BASE; ?>profile"><i class="ri-user-3-line marginRightSmall"></i> <h6>Profile</h6></a></li>
                <li><a href="<?php echo BASE; ?>users"><i class="ri-group-line marginRightSmall"></i> <h6>Users</h6></a></li>
            </ul>
        </div>
        <div class="row marginDownDefault w100">
            <p class="marginDownSmallIn">General</p>
            <ul class="menu">
                <?php if($_SESSION['type'] === 'user'){ ?>
                <li><a href="<?php echo BASE; ?>notifications"><i class="ri-settings-4-line marginRightSmall"></i> <h6>Notifications</h6></a></li>
                <?php }else{ ?>
                <li><a href="<?php echo BASE; ?>send-mail"><i class="ri-settings-4-line marginRightSmall"></i> <h6>Send Mail</h6></a></li>
                <?php } ?>
                <?php if(isset($_SESSION['login'])){ ?>
                <li><a href="?logout"><i class="ri-logout-box-r-line marginRightSmall"></i> <h6>Logout</h6></a></li>
                <?php }else{ ?>
                <li><a href="<?php echo BASE; ?>login"><i class="ri-logout-box-r-line marginRightSmall"></i> <h6>Login</h6></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="row w100 marginDownSmall">
            <div class="box itemsFlex alignCenter justCenter flexWrap positionRelative">
                <div class="col colAbsolute textCenter">
                    <span class="iconAround"><i class="ri-github-line marginRightSmall"></i></span>
                </div>
                <div class="col textCenter w100">
                    <h5 class="marginDownSmallIn hideDeviceSmall">Lorem ipsum amet</h5>
                    <p class="marginDownSmallIn hideDeviceSmall">4/6h viewting time</p>
                    <a href="https://github.com/Raissadev" class="button">View Github</a>
                </div>
            </div>
        </div>
    </div>
</aside>

<main class="w75 h100 displayInlineFlexColumn w100DeviceSmall">

<header class="marginDownDefault">
    <div class="wrap w95 center itemsFlex justSpaceBetween">
        <div class="col w50 itemsFlex alignCenter" id="colResponsive">
            <div class="w10 hideDeviceSmall">
                <a><i class="ri-arrow-left-s-line"></i></a>
                <a><i class="ri-arrow-right-s-line"></i></a>
            </div>
            <form method="post" class="w60 positionRelative itemsFlex alignCenter hideDeviceSmall">
                <input type="text" name="name" placeholder="Search..." class="search w100" autocomplete="off" />
                <button name="search" class="styleNone"><i class="ri-search-line"></i></button>
                <div class="searchContainer">
                    <?php
                        if(isset($_POST['search'])){
                            $searchMovie = new \models\moviesModel;
                            $responseSearch = $searchMovie->searchMovie($_POST['name']);
                            foreach($responseSearch->results as $key => $value){
                                echo '<p class="marginDownSmallIn"><a href="'.BASE.'movie/'.$value->id.'">'.$value->title.'</a></p>';
                            }
                        }
                    ?>
                </div>
            </form>
            <a class="positionRelative toggleMenu hideDeviceBigger"><i class="ri-menu-line iconBigger"></i></a>
        </div>
        <div class="col itemsMenuHeader w50 itemsFlex alignCenter justEnd w100DeviceSmall">
            <a href="<?php echo BASE; ?>notifications" class="marginRightDefault positionRelative"><i class="ri-notification-3-line iconBigger"></i><span class="notificationCount"><?php  $countNotification = \models\usersModel::getNotification(); echo count($countNotification); ?></span></a>
            <a href="<?php echo BASE; ?>watchlist" class="marginRightDefault positionRelative"><i class="ri-heart-line iconBigger"></i><?php if(isset($_SESSION['login'])){ ?><span class="notificationCount"><?php $countWitchList = \models\usersModel::getWitchList(); echo count($countWitchList); ?></span><?php } ?></a>
            <div class="itemsFlex">
                <figure class="imgSmallUser marginRightSmall">
                    <img src="<?php echo BASE;?>uploads/<?php echo $_SESSION['image']; ?>" class="imgSmallUser" />
                </figure>
                <div>
                    <h6><?php echo $_SESSION['name']; ?></h6>
                    <p><?php echo $_SESSION['type']; ?></p>
                </div>
            </div>
        </div>
    </div>
</header>

<aside class="asideMenu displayInlineFlexColumn hideDeviceSmall">
    <div class="wrap h100 itemsFlex alignCenter justCenter">
        <ul class="items w100 itemsFlex flexColumn alignCenter justSpaceEvenly">
            <li class="marginDownSmall"><a href="<?php echo BASE; ?>movies" class="iconButton"><i class="ri-add-line"></i></a></li>
            <li class="marginDownSmall"><figure class="imgDefaultUser"><img src="<?php echo BASE;?>uploads/<?php echo $_SESSION['image']; ?>" /></figure></li>
        </ul>
    </div>
</aside>

<?php } ?>

