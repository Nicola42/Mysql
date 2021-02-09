<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Ajouter</title>
</head>
<body class="ajout">
    <nav>
        <ul>
            <li><a href="list.php">Historique</a></li>
            <li><a href="ajout.php">Ajout</a></li>
        </ul>
    </nav>
    
    <form action="insert.php" method="POST">
        <?php
            if(isset($_GET['id'])) :
        ?>
            <input type="hidden" value="<?= $_GET['id']; ?>" name="id">
        <?php
            require_once('connect.php');
            $req = $dbc->prepare('SELECT `id`, `date_changement`, `floor_etage`, `position_couloir`, `price` FROM `historiques` WHERE `id` = :id');
            $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetch();
            endif;
        ?>
        
        <div class="input-group mb-3">
            <label for="date_changement" class="input-group-text">Date:</label>
            <input type="date" id="date_changement" name="date_changement" value="<?= $data['date_changement'] ?? '' ?>">
        </div>
        <div class="input-group mb-3 select">
            <label for="floor_etage" class="input-group-text"> étages:</label>
            <select  name="floor_etage" id="floor_etage" value="<?= $data['floor_etage'] ?? '' ?>">
                <option value="">--Quel étage--</option>
                <option value="rez-de-chaussee" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "rez-de-chaussee")? "selected" : "" ?>>Rez-de-chaussee</option>
                <option value="Etage 1" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 1")? "selected" : "" ?>>Etage n°1</option>
                <option value="Etage 2" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 2")? "selected" : "" ?>>Etage n°2</option>
                <option value="Etage 3" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 3")? "selected" : "" ?>>Etage n°3</option>
                <option value="Etage 4" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 4")? "selected" : "" ?>>Etage n°4</option>
                <option value="Etage 5" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 5")? "selected" : "" ?>>Etage n°5</option>
                <option value="Etage 6" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 6")? "selected" : "" ?>>Etage n°6</option>
                <option value="Etage 7" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 7")? "selected" : "" ?>>Etage n°7</option>
                <option value="Etage 8" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 8")? "selected" : "" ?>>Etage n°8</option>
                <option value="Etage 9" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 9")? "selected" : "" ?>>Etage n°9</option>
                <option value="Etage 10" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 10")? "selected" : "" ?>>Etage n°10</option>
                <option value="Etage 11" <?= (isset($data['floor_etage']) && $data['floor_etage'] == "Etage 11")? "selected" : "" ?>>Etage n°11</option>
            </select>
        </div>
        <div class="input-group mb-3 select">
            <label for="position_couloir" class="input-group-text">couloir:</label>
            <select  name="position_couloir" id="position_couloir" value="<?= $data['position_couloir'] ?? '' ?>">
                <option value="">--Quelle position--</option>
                <option value="Gauche" <?= (isset($data['position_couloir']) && $data['position_couloir'] == "Gauche")? "selected" : "" ?>>côté gauche</option>
                <option value="Droite" <?= (isset($data['position_couloir']) && $data['position_couloir'] == "Droite")? "selected" : "" ?>>côté droit</option>
                <option value="Fond" <?= (isset($data['position_couloir']) && $data['position_couloir'] == "Fond")? "selected" : "" ?>>fond</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <label for="price" class="input-group-text">Prix:</label>
            <input type="number" name="price" id="price" step="0.1" value="<?= $data['price'] ?? '' ?>">
        </div>
        <div class="sub">
            <input type="submit" value="Ajouter" class="btn btn-primary">
        </div>
    </form>
</body>
</html>