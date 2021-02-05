<?php

    require_once('connect.php');

    if(isset($_POST["date_changement"])){
        $date_changement = $_POST["date_changement"];
        $floor_etage = $_POST["floor_etage"];
        $position_couloir = $_POST["position_couloir"];
        $price = $_POST["price"];

        if(isset($_POST['id'])){
            $req = $dbc->prepare('UPDATE `historiques` SET `date_changement`= :date_changement, `floor_etage`= :floor_etage, `position_couloir`= :position_couloir, `price`= :price WHERE `id` = :id');
            $req->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
            $req->bindParam(':date_changement', $_POST['date_changement'], PDO::PARAM_INT);
            $req->bindParam(':floor_etage', $_POST['floor_etage'], PDO::PARAM_INT);
            $req->bindParam(':position_couloir', $_POST['position_couloir'], PDO::PARAM_INT);
            $req->bindParam(':price', $_POST['price'], PDO::PARAM_INT);

            $req->execute();
            $data = $req->fetch();
        }
        else{
            $req = $dbc->prepare ('INSERT INTO historiques (date_changement, floor_etage, position_couloir, price)
            VALUES (:date_changement, :floor_etage, :position_couloir, :price)');
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