<?php
    echo "<h1>Creating Database</h1>";

    define("SERVER_NAME", "127.0.0.1");
    define("USER_NAME", "root");
    define("USER_PASWD", "");

    $conn = mysqli_connect(SERVER_NAME, USER_NAME, USER_PASWD);

    if(!$conn)
        die("Exiting Script!");

    echo "Connection to db server was successful" . "<br>";

    $sql = "CREATE DATABASE IF NOT EXISTS db_from_php";
    $res = mysqli_query($conn, $sql);

    if ($res)
    {
        echo "query executed successfully" . "<br>";
    }
    else
    {
        echo "query was not executed successfully!" . "<br>";
        echo "[ERROR]: " .  mysqli_error($conn);
    }

    mysqli_close($conn);
?>