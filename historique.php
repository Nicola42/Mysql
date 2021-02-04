<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Historique</title>
</head>
<body class="historique">
    <header>
        <nav>
            <ul>
                <li><a href="historique.php">Historique</a></li>
                <li><a href="ajout.php">Ajout</a></li>
            </ul>
        </nav>
    </header>
    <?php
        
        require_once('connect.php');


        $req=$dbc->query("SELECT * FROM historiques");
    ?>
    <table>
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Floor</th>
                <th scope="col">Position</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($req as $value) :
            ?>
                <tr>
                <td><?= $value['date_changement']; ?></td>
                <td><?= $value['floor_etage']; ?></td> 
                <td><?= $value['position_couloir']; ?></td> 
                <td><?= $value['price']; ?></td> 
                <td>
                    <a href="delete.php?id=<?= $value['id']; ?>">Supprimer</a>
                </td>
                </tr>
            <?php
                endforeach;
            ?>        
        </tbody>
    </table>
    <footer>

    </footer>
</body>
</html>