<?php

    namespace controllers;

    class accessController{

        public static function controlAccess(){
            if(isset($_SESSION['login'])){
                if($_GET['url'] === 'login' || $_GET['url'] === 'register'){
                    header('Location: '.BASE.'');
                    die();
                }
            }
        }

        public static function controlAccessType(){
            if($_SESSION['type'] === 'user'){
                if($_GET['url'] === 'send-mail'){
                    header('Location: '.BASE.'');
                    die();
                }
            }
        }

    }

?>