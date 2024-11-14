<?php
    $connection = pg_connect("host = localhost dbname = MAHASISWA user = postgres password=@13579@08642@@");
    if (!$connection) {
        echo "EROR";
        exit;
    }

    $result = pg_query($connection, "SELECT * from MAHASISWA");
    if (!$result){
        echo "ERORRRRRRRRRRRRRR!";
        exit;
    }

    $test = pg_fetch_row($result);

    echo " $test[3] ";


?>