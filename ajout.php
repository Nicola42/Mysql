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
            <select name="floor" id="floor">
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
            <select name="position" id="position">
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
        $server = "localhost";
        $dbname = "ampoules";
        $user = "root";

        try {
            $dbc = new PDO("mysql:host=$server;dbname=$dbname", $user);


        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    ?>
</body>
</html>