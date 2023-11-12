<?php

$conn = mysqli_connect("localhost", "root", "",
 "pos");

if (mysqli_connect_error()) {
    echo " 
    <script>
     alert('can not connect to the database');
    </script>
    ";
    exit();
}
