<?php

    namespace controllers;

    class usersController{

        public static function logout(){
            if(isset($_GET['logout'])){
                unset($_SESSION['id']);
                unset($_SESSION['login']);
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                unset($_SESSION['image']);
                unset($_SESSION['type']);
                setcookie('remember', true, time()-(60*60*7), '/');
                setcookie('name', $name, time()-(60*60*7), '/');
                setcookie('password', $password, time()-(60*60*7), '/');
                header('Location: '.BASE.'');
                die();
            }
        }

        public static function updateUser($name, $email, $password, $image){
            $idUser = $_SESSION['id'];
            $type = $_SESSION['type'];
            $update = \MySql::connect()->prepare("UPDATE `users` SET name = ? , email = ? , 
            password = ? , image = ? ,  type = ? WHERE id = '$idUser'");
            $update->execute(array($name, $email, $password, $image['name'], $type));
            move_uploaded_file($image['tmp_name'], BASE_UPLOADS.$image['name']);
            if($update->rowCount() == 1){
                echo "<script> alert('Profile success edit!'); </script>";
            }
        }

        public static function witchList($userId,$movieId,$name,$image){
            $insert = \MySql::connect()->prepare("INSERT INTO `wishlist` VALUES (null,?,?,?,?)");
            $insert->execute(array($userId,$movieId,$name,$image));
            if($insert->rowCount() == 1){
                die();
                header('Location: '.BASE.'');
            }else{
                echo "<script> alert('Ops... Ocorreu um erro!'); </script>";
            }
        }

        public static function deleteWitchList($movie){
            $deleteWitchList = \MySql::connect()->prepare("DELETE FROM `wishlist` WHERE movie_id = '$movie'");
            $deleteWitchList->execute();
            return $deleteWitchList;
        }

    }

?>
