<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter</title>
</head>
<body class="ajout">
    <nav>
        <ul>
            <li><a href="historique.php">Historique</a></li>
            <li><a href="ajout.php">Ajout</a></li>
        </ul>
    </nav>
    <form action="insert.php" method="POST">
        
        <div>
            <label for="date_changement">Date:</label>
            <input type="date" id="date_changement" name="date_changement">
        </div>
        <div>
            <select name="floor_etage" id="floor_etage">
                <option value="">--Quel étage--</option>
                <option value="rez-de-chaussee">Rez-de-chaussee</option>
                <option value="Etage 1">Etage n°1</option>
                <option value="Etage 2">Etage n°2</option>
                <option value="Etage 3">Etage n°3</option>
                <option value="Etage 4">Etage n°4</option>
                <option value="Etage 5">Etage n°5</option>
                <option value="Etage 6">Etage n°6</option>
                <option value="Etage 7">Etage n°7</option>
                <option value="Etage 8">Etage n°8</option>
                <option value="Etage 9">Etage n°9</option>
                <option value="Etage 10">Etage n°10</option>
                <option value="Etage 11">Etage n°11</option>
            </select>
        </div>
        <div>
            <select name="position_couloir" id="position_couloir">
                <option value="">--Quelle position--</option>
                <option value="Gauche">côté gauche</option>
                <option value="Droite">côté droit</option>
                <option value="Fond">fond</option>
            </select>
        </div>
        <div>
            <label for="price">Prix</label>
            <input type="number" name="price" id="price" step="0.1">
        </div>
        <div>
            <input type="submit" value="Ajouter">
        </div>
    </form>

</body>
</html>