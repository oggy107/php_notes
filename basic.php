<?php

$name = "Oggy";
echo "hello $name";
echo "<br>";

// var_dump returns the datatype and value of variable passed
echo var_dump($name);
echo "<br>";
echo "<br>";
echo "<br>";

// common string functions
echo "<h2>Common String Functions</h2>";
$str = "Oggy is noob";

echo "string length: ";
echo strlen($str);
echo "<br>";

// . operator concatenates strings
echo "string word count: " . str_word_count($str);
echo "<br>";

echo "string reverse: " . strrev($str);
echo "<br>";

echo "position of substring in string: " . strpos($str, "is");
echo "<br>";

echo "substring replacement: ". str_replace("noob", "pro", $str);
echo "<br>";

echo "repeats string: " . str_repeat("this is php ", 5);
echo "<br>";

// used <pre> to show white space
echo "<pre>";
// there are rtrim and ltrim as well
echo "string triming: " . trim("    testing hello   world  ");
echo "</pre>";

echo "<br>";

$a = 10;

// need to use global keyword to access global variables
function print_value(){
    global $a;
    echo $a;
}

print_value();
echo "<br>";

// This is called super global. it stores all global variables as associative array (same as dictionary in python)
echo var_dump($GLOBALS);
echo "<br>";
echo $GLOBALS["a"];
echo "<br>";
echo $GLOBALS["name"];
?>