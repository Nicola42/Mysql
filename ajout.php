<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ampoule.css">
    <title>Ajouter</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="historique.php">Historique</a></li>
            <li><a href="ajout.php">Ajout</a></li>
        </ul>
    </nav>
    <form action="ajout.php" method="post">
        <div>
            <label for="date_changement">Date:</label>
            <input type="date" id="date_changement" name="date_changement">
        </div>
        <div>
            <select name="floor_etage" id="floor_etage">
                <option value="">--Quel étage--</option>
                <option value="floor0">Rez-de-chaussée</option>
                <option value="floor1">Etage n°1</option>
                <option value="floor2">Etage n°2</option>
                <option value="floor3">Etage n°3</option>
                <option value="floor4">Etage n°4</option>
                <option value="floor5">Etage n°5</option>
                <option value="floor6">Etage n°6</option>
                <option value="floor7">Etage n°7</option>
                <option value="floor8">Etage n°8</option>
                <option value="floor9">Etage n°9</option>
                <option value="floor10">Etage n°10</option>
                <option value="floor11">Etage n°11</option>
            </select>
        </div>
        <div>
            <select name="position_couloir" id="position_couloir">
                <option value="">--Quelle position--</option>
                <option value="pos1">côté gauche</option>
                <option value="pos2">côté droit</option>
                <option value="pos3">fond</option>
            </select>
        </div>
        <div>
            <label for="price">Prix</label>
            <input type="number" name="price" id="price">
        </div>
        <div>
            <input type="submit" value="Ajouter">
        </div>
    </form>


    <?php
        if (isset($_POST["date_changement"])){
            $servername = "localhost";
            $dataname = "ampoules";
            $user = "root";
            $date_changement = $_POST["date_changement"];
            $floor_etage = $_POST["floor_etage"];
            $position_couloir = $_POST["position_couloir"];
            $price = $_POST["price"];

            try {
                $dbc = new PDO("mysql:host=$servername; dbname=$dataname", $user);

                if (!empty($date_changement) && !empty($floor_etage) && !empty($position_couloir) && !empty($price)) {
                    $var = $dbc->prepare ("INSERT INTO historiques (date_changement, floor_etage, position_couloir, price)
                    VALUES (:date_changement, :floor_etage, :position_couloir, :price)");

                    $var->bindParam(':date_changement', $date_changement);
                    $var->bindParam(':floor_etage', $floor_etage);
                    $var->bindParam(':position_couloir', $position_couloir);
                    $var->bindParam(':price', $price);
                    $var->execute();
                }
            }
            
            catch (PDOException $e) {
                echo "Erreur : ". $e->getMessage();
            }
        }
    ?>
</body>
</html>