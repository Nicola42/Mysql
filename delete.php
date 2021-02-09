<?php

    require_once('connect.php');

    if(isset($_GET['id']) && !empty($_GET['id'])){
        try{
            $req = $dbc->prepare('DELETE FROM `historiques` WHERE `id` = :id');
            $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $req->execute();
        } catch(Exception $e){
            echo 'erreur query : '. $e->getMessage();
        }
        

        header('Location: list.php');
    } else {
        $erreur = 'Désolé l\'ID n\'existe pas';
    }