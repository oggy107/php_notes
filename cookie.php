
<?php
    $res = setcookie("myfirstcookie", "hello this is my cookie");
    if(!$res)
    {
        echo "[ERROR]: error while setting up cookie";
    }
    else
    {
        echo "cookie was set successfully" . "<br>";
        echo var_dump($_COOKIE);
    }
?>