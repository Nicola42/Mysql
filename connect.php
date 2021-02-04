<?php

    $servername = "localhost";
    $dataname = "ampoules";
    $user = "root";
    
    $dbc = new PDO("mysql:host=$servername; dbname=$dataname", $user);