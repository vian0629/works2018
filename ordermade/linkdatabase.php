<?php
    $conn = mysql_connect('localhost', 'root', '');
    mysql_select_db('ShoppingCart', $conn);
    $conn_rs = mysql_query('set names utf8');
    if ($conn_rs)
    //echo "Done!";
        echo '';
    else
        die('mysql error' . mysql_error());
?>