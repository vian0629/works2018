<?php
session_start();
unset ($_SESSION['shop_cart']);
header("refresh:0;url=shop_list.php"); 
?>