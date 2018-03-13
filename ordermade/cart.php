<?php 
session_start();
include("linkdatabase.php");
$fooddata = mysql_query("SELECT * FROM food", $conn);
try{
		$pdo=new PDO('mysql:host=localhost;dbname=shoppingcart;charset=utf8','root','');
		// echo "datebase";
	}
	catch(PDOException $e){
	echo "miss";
	};
	$stmt = $pdo -> prepare("SELECT * FROM food where food_type = :inputid");
	// $od=$_POST["order"];
	$pri=$_POST["pri"];
///////////////
if (isset($_GET["id"])) {
	$id=$_GET["id"];
	if (isset($_SESSION['od_arr'])) {
		$od_arr=$_SESSION['od_arr'];
		array_push($od_arr, $id);
	}
	else{
		$od_arr[]=$id;
	}
	$_SESSION['od_arr']=$od_arr;
}
if (isset($_GET["id_delete"])) {
	$id_delete=$_GET["id_delete"]-1;
	$od_arr=$_SESSION['od_arr'];
	unset($od_arr[$id_delete]); 
	$_SESSION['od_arr']=$od_arr;
}
else{
	$od_arr=$_SESSION['od_arr'];

	?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<!-- <head> -->
<title>HAL屋</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/checkout.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/owl.carousel_v1.js"></script>
<script type="text/javascript" src="js/function.js"></script>

</head>
<body>
<div id="main">
<div id="headerin">
	<div id="headertop">
		<div id="logo">
			<img src="images/logo.png">
			<ul>
			<li><img src="images/icon001.png"></li>
			<li><img src="images/icon002.png"></li>
			</ul>
		</div>
	</div>
	<nav>
		<ul>
			<li><a href="index.html">トップページ</a>|</li>
			<li><a href="order.php">オーダーメイド</a>|</li>
			<li><a href="list_product.html">メニュー</a>|</li>
			<li><a href="#">旬の食材</a>|</li>
			<li><a href="#">本社について</a></li>
		</ul>
	</nav>
</div>
<div id="content">
	<ul class="breadcrumbs">
      <li><a href="#">トップページ</a></li>
      <li>買い物カート</li>
    </ul>
	<ul>
		<li id="my_cart_title"><p>1</p><span>カートを確認</span></li>
		<li id="my_cart_title_style2" class="my_cart_title_off"><p>2</p><span>買い物完了</span></li>
	</ul>
	<ul id="buylist_word">		
		<li class="booktitle">
			<div class="opendetail" style="width:855px; cursor: pointer;"><span>　1　</span>オリジナル弁当<span class="price" style="float: right; width: 200px;text-align: right;font-weight: normal;"><?=$pri?></span></div>
			<ul style="margin-top: 20px; width: 700px;">
			<li>
			<?php 
			foreach ( $od_arr as $value ) {
			try{
				$pdo=new PDO('mysql:host=localhost;dbname=shoppingcart;charset=utf8','root','');
				// echo "datebase";
			}
			catch(PDOException $e){
			echo "miss";
			}
			$stmt = $pdo -> prepare("SELECT * FROM food where food_number=:inputid");
			$stmt->bindValue(':inputid',$value,PDO::PARAM_STR);
			$stmt -> execute();
			$rows = $stmt -> fetch();
			echo $rows ['food_name']. "、";
			}
			}
			?>
			</li>
			</ul>
		</li>
	</ul>	
	<div id="total_list">
		<article>
			<div><span class="subtotal">小計：</span><span class="count"><?=$pri?></span></div>
			<div><span class="discount">割引料：</span><span class="count"><span>0</span></span></div>
			<div><span class="cashflow">ポイント：</span><span class="count">0</span></div>
		</article>
		<div style="height:10px; border-bottom: #DBDBDB solid 1px; clear:both;"></div>
		<article>
			<div><span class="total">合計：</span><span class="totalcount"><?=$pri?>円</span></div>
		</article>
	</div>
	<ul id="subtotal_bar">
		<li id="backtoshopping"><a href="index.html">&lt;&lt; トップページへ</a></li>
	</ul>
	<div class="alignright right">
    	<a href="order.php" style="padding-right: 30px; display: inline-block;">カートを空にする</a>
    	<a href="cart_e.html"><div class="btn" style="display: inline-block;">注文する</div></a>
    	<!-- <input type="submit" value="注文する" class="btn"></div> -->
	</div>
</div>

<div id="footer">
	Copyright(C) Chen Pei Chu. All Rights Reserved.
</div>
</div>
<script type="text/javascript">
$(".opendetail").click(function () {

    $(this).toggleClass('expand').nextUntil('tr.header').slideToggle(500);

});
</script>
</body>
</html>