<?php
    // READING WITH READFILE()

    echo "<h1> Reading with readfile() </h1>";
    
    // readfile throws the data from file directly to ouput buffer
    $res = readfile('./test.txt');

    if(!$res)
    {
        echo "[ERROR]: unable to locate or open file";
    }
    else
    {
        echo "<br>" . "No of bytes red: " . $res . "<br>";
    }

    // OPENING FILE WITH FOPEN()

    echo "<h1> Opening file with fopen() </h1>";

    $fptr = fopen('./test.txt', 'r');

    if(!$fptr)
    {
        echo "[ERROR]: unable to locate or open file";
    }
    else
    {
        echo "file opened successfully" . "<br>";

        echo "<h1> Reading file with fread(), fgetc(), fgets() </h1>";

        // fread() reads file upto given number of bytes
        // echo fread($fptr, 10) . "<br>;
        // echo fread($fptr, filesize('./test.txt'));
        
        // fgetc() reads one character at time
        // echo fgetc($fptr) . "<br>";
        // echo fgetc($fptr) . "<br>";
        // echo fgetc($fptr) . "<br>";
        // echo fgetc($fptr) . "<br>";

        // while(!feof($fptr))
        // {
        //     echo fgetc($fptr);
        // }
        
        // reads file upto end of line or end of file which ever comes first
        echo fgets($fptr) . "<br>";
        
        while(!feof($fptr))
        {
            echo fgets($fptr) . "<br>";
        }

        fclose($fptr);
    }

    // WRITING TO FILES

    echo "<h1> Writing to file with fwrite() </h1>";
    
    // opening file in write mode
    $fptr = fopen('./test_write.txt', 'w');

    if(!$fptr)
    {
        echo "[ERROR]: unable to locate or open file";
    }
    else
    {
        $str = "This file is rewriten using php";

        $n = fwrite($fptr, $str);

        if(!$n)
        {
            echo "[ERROR]: unable to write to file";
        }
        else
        {
            echo "Number of bytes witten: " . $n . "<br>";
        }

        fclose($fptr);
    }

    // APPENDING FILES

    echo "<h1> Appending file </h1>";

    // opening file in append mode
    $fptr = fopen('./test_append.txt', 'a');
    
    if(!$fptr)
    {
        echo "[ERROR]: unable to locate or open file";
    }
    else
    {
        $str = "\nthis text is appended using php. enjoy";

        $n = fwrite($fptr, $str);

        if(!$n)
        {
            echo "[ERROR]: unable to append file.";
        }
        else
        {
            echo "Number of bytes appended: " . $n . "<br>";
        }

        fclose($fptr);
    }
?>