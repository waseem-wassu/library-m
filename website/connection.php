<?php

    $db = mysqli_connect("localhost","root","","LMS");  
                    /* server name, username, passwor, database name */
    if($db == false)

     {

        die("connection failed :". mysqli_connect_error());

     }
     else {
        // echo "connected";
     }

?>