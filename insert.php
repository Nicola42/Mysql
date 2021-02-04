<?php

    require_once('connect.php');

    if(isset($_POST["date_changement"])){
        $date_changement = $_POST["date_changement"];
        $floor_etage = $_POST["floor_etage"];
        $position_couloir = $_POST["position_couloir"];
        $price = $_POST["price"];

        if(!empty($date_changement) && !empty($floor_etage) && !empty($position_couloir) && !empty($price)){
            $req = $dbc->prepare ("INSERT INTO historiques (date_changement, floor_etage, position_couloir, price)
            VALUES (:date_changement, :floor_etage, :position_couloir, :price)");
            $req->bindParam(':date_changement', $date_changement);
            $req->bindParam(':floor_etage', $floor_etage);
            $req->bindParam(':position_couloir', $position_couloir);
            $req->bindParam(':price', $price);
            $req->execute();
        }

        header('Location: ajout.php');
    } 
    else{
        $erreur = 'Désolé les champs ne sont pas remplis !';
    }
?>