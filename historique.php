<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Historique</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="historique.php">Historique</a></li>
            <li><a href="ajout.php">Ajout</a></li>
        </ul>
    </nav>
    
    <h1>
        Historique
    </h1>

    <?php
        $servername = "localhost";
        $dataname = "ampoules";
        $user = "root";

        try {
                $dbc = new PDO("mysql:host=$servername; dbname=$dataname", $user);
            } 
        catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        
        $historique=$dbc->query("SELECT date_changement FROM historiques");
        $historique1=$dbc->query("SELECT floor_etage FROM historiques");
        $historique2=$dbc->query("SELECT position_couloir FROM historiques");
        $historique3=$dbc->query("SELECT price FROM historiques");
    ?>
    <section>
        <div class="colonne">
            <p>Date de changement</p>
            <div>
                <?php foreach($historique as $value) : ?>
                <?= $value['date_changement']; ?> <br>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="colonne">
            <p>Etage</p>
            <div>
                <?php foreach($historique1 as $value) : ?>
                <?= $value['floor_etage']; ?> <br>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="colonne">
            <p>Position</p>
            <div>
                <?php foreach($historique2 as $value) : ?>
                <?= $value['position_couloir']; ?> <br>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="colonne">
            <p>Prix</p>
            <div>
                <?php foreach($historique3 as $value) : ?>
                <?= $value['price']; ?> <br>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</body>
</html>