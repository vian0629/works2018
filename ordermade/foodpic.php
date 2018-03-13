<?php 
include("linkdatabase.php");
$id=$_GET['id'];
$su_count=$_GET['su_count'];
$fooddata = mysql_query("SELECT * FROM food WHERE food_number = '$id'", $conn);
$row = mysql_fetch_array($fooddata);
echo "<div class='foodpic' id='pri_".$su_count."'><img src='images/foodicon/".$row['food_pic']."''><p>".$row['food_name']."</p></div>";
?>