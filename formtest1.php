<?php
    $navn=$_REQUEST['navn'];
    $gem="$navn \n";
    file_put_contents("test.txt", $gem, FILE_APPEND);
    echo "Mange tak, $navn, nu er du tilmeldt";
?>
