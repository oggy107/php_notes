<?php
    echo "<h1>Creating Table in database</h1>";

    define("SERVER_NAME", "127.0.0.1");
    define("USER_NAME", "root");
    define("USER_PASWD", "");

    $conn = mysqli_connect(SERVER_NAME, USER_NAME, USER_PASWD);

    if(!$conn)
        die("Exiting Script!");

    echo "Connection to db server was successful" . "<br>";

    mysqli_select_db($conn, "db_from_php");

    if($res = mysqli_query($conn, "SELECT DATABASE()"))
        echo "Currently Selected Database: " . $res -> fetch_row()[0] . "<br>";

    $sql = "CREATE TABLE IF NOT EXISTS Employee (
        Sno INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(20) NOT NULL,
        age INT NOT NULL,
        skill VARCHAR(15)
    )";

    $res = mysqli_query($conn, $sql);

    if ($res)
        echo "query executed successfully" . "<br>";
    else
    {
        echo "query was not executed successfully!" . "<br>";
        echo "[ERROR]: " .  mysqli_error($conn);
    }

    mysqli_close($conn);
?>