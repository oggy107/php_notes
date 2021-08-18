<?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            echo "you submited form by post method<br>";
            echo "Content: ";

            foreach ($_POST as $key => $value) {
                echo $value;
            }
        }

        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            echo "you submited form by get method<br>";
            echo "Content: ";

            foreach ($_GET as $key => $value) {
                echo $value;
            }
        }

        // header("location:http://127.0.0.1/php_tutorial/get_post")
?>