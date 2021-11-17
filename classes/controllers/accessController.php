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

        public static function signUp($name, $email, $password, $image){
            if($name == '' || $email == '' || $password == '' || $image == ''){
                echo "<script> alert('Preencha todos os campos!'); </script>";
                return;
            }else{
                $register = \MySql::connect()->prepare("INSERT INTO `users` VALUES (null,?,?,?,?,?)");
                $register->execute(array($name,$email,$password,$image['name'],'user'));
                move_uploaded_file($image['tmp_name'], BASE_UPLOADS.$image['name']);
                if($register->rowCount() == 1){
                    $_SESSION['login'] = true;
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['image'] = $image;
                    $_SESSION['type'] = 'user';
                    header('Location: '.BASE.'');
                    die();
                }else{
                    echo "<script> alert('Erro ao registrar'); </script>";
                }
            }
        }

        public static function signIn($name, $password){
            if($name == '' || $password == ''){
                echo "<script> alert('Preencha todos os campos!'); </script>";
                return;
            }
            $login = \MySql::connect()->prepare("SELECT * FROM `users` WHERE name = ? AND password = ?");
            $login->execute(array($name,$password));
            if($login->rowCount() == 1){
                $info = $login->fetch();
                $_SESSION['id'] = $info['id'];
                $_SESSION['login'] = true;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $info['email'];
                $_SESSION['password'] = $password;
                $_SESSION['image'] = $info['image'];
                $_SESSION['type'] = $info['type'];
                if(isset($_POST['remember'])){
                    setcookie('remember', true, time()+(60*60*7), '/');
                    setcookie('name', $name, time()+(60*60*7), '/');
                    setcookie('password', $password, time()+(60*60*7), '/');
                }
                header('Location: '.BASE.'');
                die();
            }else{
                echo "<script> alert('Dados inválidos!'); </script>";
                return;
            }
        }

    }

?>