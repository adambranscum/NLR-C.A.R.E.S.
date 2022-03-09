<?php
$link = mysqli_connect("127.0.0.1", "remoteuser", "4ndr0m3d@", "Thelp02");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

printf("System status: %s\n", mysqli_stat($link));

mysqli_close($link);
?>