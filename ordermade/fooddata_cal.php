<?php 
include("linkdatabase.php");
$id=$_GET['id'];
$su_count=$_GET['su_count'];
$fooddata = mysql_query("SELECT * FROM food WHERE food_number = '$id'", $conn);
$row = mysql_fetch_array($fooddata);
$name=$row['food_name'];
$ca=$row['food_calorie'];

echo "<div class='info_food'>";
echo "<span class='foodname'>".$name."</span>";
echo "<span class='fooddata'>".$ca."</span>";
echo "<input type='hidden' id='cal".$su_count."' value='".$ca."'>";
echo "</div>";
?>
