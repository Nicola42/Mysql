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
    <form action="#" method="post">
        <div>
            <label for="date_changement">Date:</label>
            <input type="date" id="date_changement" name="date_changement">
        </div>
        <div>
            <select name="floor" id="floor" name="floor">
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
            <select name="position" id="position" name="position">
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
            $server = "localhost";
            $dbname = "ampoules";
            $user = "root";

            $date= $_POST["date_changement"];
            $floor= $_POST["floor"];
            $position= $_POST["position"];
            $price= $_POST["price"];

            try {
                $dbc = new PDO("mysql:host=$server;dbname=$dbname", $user);
                if (!empty($date) && !empty($floor) && !empty($position) && !empty($price)) {
                    $sql = $dbc->prepare("INSERT INTO historiques(date_changement, floor, position, price)
                    VALUES (:date_changement, :floor, :position, :price)");

                    $sql->bindParam(':date_changement', $date);
                    $sql->bindParam(':floor', $floor);
                    $sql->bindParam(':position', $position);
                    $sql->bindParam(':price', $price);
                    $sql->execute();
                }
            }
            
            catch (PDOException $e) {
                echo "Erreur : ". $e->getMessage();
            }
        }
    ?>
</body>
</html>