<?php

    namespace models;

    class usersModel{

        public static function getUsers(){
            $idUser = $_SESSION['id'];
            $users = \MySql::connect()->prepare("SELECT * FROM `users` WHERE id != $idUser");
            $users->execute();
            $users = $users->fetchAll();
            return $users;
        }


        public static function getWitchList(){
            $getWitchList = \MySql::connect()->prepare("SELECT * FROM `wishlist` WHERE user_id = $_SESSION[id]");
            $getWitchList->execute();
            $getWitchList = $getWitchList->fetchAll();
            return $getWitchList;
        }

        public static function getNotification(){
            $getNotification = \MySql::connect()->prepare("SELECT * FROM `notification`");
            $getNotification->execute();
            $getNotification = $getNotification->fetchAll();
            return $getNotification;
        }

    }

?>