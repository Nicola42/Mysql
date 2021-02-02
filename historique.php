<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ampoule.css">
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

    <table>
        <tr>
            <th>ID</th>
            <th>Date changement</th>
            <th>étage</th>
            <th>Position</th>
            <th>Prix</th>
        </tr>
    </table>

    <?php
        // $servername = "localhost";
        // $dataname = "ampoules";
        // $user = "root";
        define('DATABASE', 'ampoules');
        define('USER', 'root');
        define('PWD', '');
        define('HOST', 'localhost');

        try {
                $dbc = new PDO('mysql:host='.HOST.';dbname='. DATABASE, USER, PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

                $var = 'SELECT id, date_changement, floor_etage, position_couloir, price FROM historiques';
                $sth = $dbc->prepare($var);
                $sth->execute();
                $datas = $sth->fetchAll(PDO::FETCH_ASSOC);

                foreach( $datas as $data){
                    echo'<tr>';
                        echo'<td>'.$data['id']. ' '.'</td>';
                        echo'<td>'.$data['date_changement'].' '.'</td>';
                        echo'<td>'.$data['floor_etage'].' '.'</td>';
                        echo'<td>'.$data['position_couloir'].' '.'</td>';
                        echo'<td>'.$data['price'].' '.'</td>';
                        echo '<td><a href="ajout.php?edit=1&id='.$data['id'].' '.'">Modifier</a> <a href="ajout.php?id='.$data['id'].'">Supprimer<a><td>';
                        echo '</tr>';
                }
            } 
        catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
    ?>
</body>
</html>