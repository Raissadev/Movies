<?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    $autoload = function($class){
        include('classes/'.$class.'.php');
    };
    spl_autoload_register($autoload);

    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','myfilmes');
    define('BASE','http://localhost/Projects/myFilmes/');
    define('BASE_UPLOADS', __DIR__.'/uploads/');
    define('BASE_IMAGES_MOVIES','https://image.tmdb.org/t/p/w500');

    if(!isset($_SESSION['login'])){
        $_SESSION['id'] = uniqid();
        $_SESSION['name'] = 'Visitante';
        $_SESSION['email'] = 'email@example.com';
        $_SESSION['password'] ='';
        $_SESSION['image'] = 'avatar.png';
        $_SESSION['type'] = 'user';
    }

?>