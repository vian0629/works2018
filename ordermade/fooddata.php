<?php 
include("linkdatabase.php");

$id=$_GET['id'];
$fooddata = mysql_query("SELECT * FROM food WHERE food_number = '$id'", $conn);
$row = mysql_fetch_array($fooddata);
$name=$row['food_name'];
$ca=$row['food_calorie'];
$price=$row['food_price'];

echo "<div class='info_food'>";
echo "<h2>".$name."</h2>";
echo "<p>calorie: ".$ca."</p>";
echo "<p>price: ".$price."</p>";
echo "<?php echo '".$name."test"."'; ?>";
echo "</div>";
?>