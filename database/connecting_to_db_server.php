<?php
    echo "<h1>Database Basics using php</h1>";

    # Ways to conenct to a database
    /*
    * MYSQLi extendion                   this is specificaly used to conenct to mysql database. i stands for improved
    * PDO (php data object)              this is used to connect to any database
    */

    # Connecting to database
    $serverName = "localhost";  // or 127.0.0.1 if your server is on your machine
    $userName = "root";         // default username is root
    $userPass = "";             // password is empty because the server is on our machine. if you want to connect to remote server you need to give password

    $conn = mysqli_connect($serverName, $userName, $userPass);

    if(!$conn)
        exit("Exiting script!");

    echo "Connection to db server was successful" . "<br>";

    echo mysqli_stat($conn);

    mysqli_close($conn);
?>