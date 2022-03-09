<?php

$db = mysqli_connect("127.0.0.1","remoteuser","4ndr0m3d@","Thelp02");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>