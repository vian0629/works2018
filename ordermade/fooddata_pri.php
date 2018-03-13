<?php 
include("linkdatabase.php");
$id=$_GET['id'];
$su_count=$_GET['su_count'];
$fooddata = mysql_query("SELECT * FROM food WHERE food_number = '$id'", $conn);
$row = mysql_fetch_array($fooddata);
$name=$row['food_name'];
$price=$row['food_price'];

echo "<div class='info_food'>";
echo "<span>".$price."</span>";
echo "<input type='hidden' id='pri".$su_count."' value='".$price."'>";
echo "</div>";
?>