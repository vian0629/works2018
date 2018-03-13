<?php 
session_start();
unset ($_SESSION['caltotal']);  
unset ($_SESSION['ptotal']);
unset ($_SESSION['od_arr']);
 // unset ($_SESSION['order']);
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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>HAL屋</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var count=0;
	var su_count=1;	
	$(".food .foodpic").draggable({
		connectToSortable: '.basket',
		cursor: 'move',
		cursorAt: { top: 15, left: 45 },
		opacity: 0.5,
		revert: 'invalid',
		helper: myHelper,
		stop :dragstop,
	})
	.dblclick(function(e) {
		var id= $(this).attr("id");		
		$.get("foodpic.php",
				{id:id,su_count:su_count},
				function(data1){
				$(".basket").html($(".basket").html()+"<span class='divremove' id='cal_"+count+"'>"+data1+"<span class='remove' id='"+count+"'>×</span></span>");
			});
			$.get("fooddata_cal.php",
				{id:id,su_count:su_count,},
				function(data){
				$(".basket_cal").html($(".basket_cal").html()+"<span id='cal_"+count+"'>"+data+"</span>");
				var cal = $('#cal'+ count).val();
				$('#cal_h').html($("#cal_h").html()+"<input type='hidden' id='cal_"+count+"' value='"+cal+"'>");
				$.ajax({
		         	url: 'cal_amount.php',
		         	cache: false,
		         	dataType: 'html',
		         	type: 'post',
		         	data: {
						cal: cal,
				 	},
		         	error: function(xhr) {
		           		alert('request error');
		         	},
		         	success: function(response) {

		                $('#cal_t').html(response);
		           		$('#cal_t').fadeIn();
		        	}
    			});
			});
			$.get("fooddata_pri.php",
				{id:id,su_count:su_count,}, 
				function(data){
				$(".basket_pri").html($(".basket_pri").html()+"<span id='"+count+"'>"+data+"</span>");
				var pri = $('#pri'+ count).val();
				$('#pri_h').html($("#pri_h").html()+"<input type='hidden' id='"+count+"' value='"+pri+"'>");
    			$.ajax({
		         	url: 'pri_amount.php',
		         	cache: false,
		         	dataType: 'html',
		         	type: 'post',
		         	data: {
						pri: pri,
				 	},
		         	error: function(xhr) {
		           		alert('request error');
		         	},
		         	success: function(response) {
		                $('#pri_t').html(response);
		           		$('#pri_t').fadeIn();
		        	}
    			});
    			$.ajax({
		         	url: 'cart.php',
		         	cache: false,
		         	dataType: 'html',
		         	type: 'get',
		         	data: {
		         		id:id,		         		
				 	},
		         	error: function(xhr) {
		           		alert('request error');
		         	},
		         	success: function(response) {
		        	}
    			});
			});
    		su_count++;
			count++;			
	});
	function myHelper(event) {
        // return $(this).clone();
        return $('<div><img src="'+$(this).find("img").attr("src")+'" />');
    }
    function dragstop(event, ui) {
			}
	$(".basket").droppable({
		activeClass: 'basket_active',
		hoverClass: 'basket_hover', 
		drop:fordrop})
		function fordrop(e, ui)
		{	
			var id 	= ($(ui.draggable).attr("id"));
				$.get("foodpic.php",
				{id:id,su_count:su_count},
				function(data1){
				$(".basket").html($(".basket").html()+"<span class='divremove' id='cal_"+count+"'>"+data1+"<span class='remove' id='"+count+"'>×</span></span>");
			});
			$.get("fooddata_cal.php",
				{id:id,su_count:su_count,},
				function(data){
				$(".basket_cal").html($(".basket_cal").html()+"<span id='cal_"+count+"'>"+data+"</span>");
				var cal = $('#cal'+ count).val();
				$('#cal_h').html($("#cal_h").html()+"<input type='hidden' id='cal_"+count+"' value='"+cal+"'>");
				$.ajax({
		         	url: 'cal_amount.php',
		         	cache: false,
		         	dataType: 'html',
		         	type: 'post',
		         	data: {
						cal: cal,
				 	},
		         	error: function(xhr) {
		           		alert('request error');
		         	},
		         	success: function(response) {

		                $('#cal_t').html(response);
		           		$('#cal_t').fadeIn();
		        	}
    			});
			});
			$.get("fooddata_pri.php",
				{id:id,su_count:su_count,}, 
				function(data){
				$(".basket_pri").html($(".basket_pri").html()+"<span id='"+count+"'>"+data+"</span>");
				var pri = $('#pri'+ count).val();
				$('#pri_h').html($("#pri_h").html()+"<input type='hidden' id='"+count+"' value='"+pri+"'>");
    			$.ajax({
		         	url: 'pri_amount.php',
		         	cache: false,
		         	dataType: 'html',
		         	type: 'post',
		         	data: {
						pri: pri,
				 	},
		         	error: function(xhr) {
		           		alert('request error');
		         	},
		         	success: function(response) {
		                $('#pri_t').html(response);
		           		$('#pri_t').fadeIn();
		        	}
    			});
    			$.ajax({
		         	url: 'cart.php',
		         	cache: false,
		         	dataType: 'html',
		         	type: 'get',
		         	data: {
		         		id:id,		         		
				 	},
		         	error: function(xhr) {
		           		alert('request error');
		         	},
		         	success: function(response) {
		        	}
    			});
			});
    		su_count++;
			count++;			
		}

	$(document).on('mouseenter', '.divremove', function () {
        $(this).find('.remove').show();
    }).on('mouseleave', '.divremove', function () {
        $(this).find('.remove').hide();
    }).on('click', '.remove', function() {
    	var id1 = $(this).parent().attr('id');
    	var id2 = $(this).attr('id');
        // alert(id);
        $(this).parent().remove();
        $('#'+id1).remove();
        $('#'+id2).remove();
        var kal_value = document.getElementById(id1).value;//kal
        var pri_value = document.getElementById(id2).value;//price
       
        $.ajax({
		    url: 'cal_amount.php',
		    cache: false,
		    dataType: 'html',
		    type: 'post',
		    data: {
				kal_value: kal_value,

			},
		    error: function(xhr) {
		        alert('request error');
		    },
		    success: function(response) {
		        $('#cal_t').html(response);
		        $('#cal_t').fadeIn();
		    }
    	});
        $.ajax({
		    url: 'pri_amount.php',
		    cache: false,
		    dataType: 'html',
		    type: 'post',
		    data: {
				pri_value: pri_value,
			},
		    error: function(xhr) {
		        alert('request error');
		    },
		    success: function(response) {
		        $('#pri_t').html(response);
		        $('#pri_t').fadeIn();
		    }
    	});
    	$.ajax({
		    url: 'cart.php',
		    cache: false,
		    dataType: 'html',
		    type: 'get',
		    data: {
		        id_delete:id2,		         		
			},
		    error: function(xhr) {
		        alert('request error');
		    },
		    success: function(response) {
		    }
    	});
    });
});

</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/drag.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/owl.carousel_v1.js"></script>
<script type="text/javascript" src="js/function.js"></script>
</head>
<body>
<div id="main">
<div id="headerin">
	<div id="headertop">
		<div id="logo" >
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
      <li><a href="index.html">トップページ</a></li>
      <li>オーダーメイド</li>
    </ul>
	<h1>オーダーメイド<span>オリジナル弁当</span></h1>
	<h2>好きな食べ物をダブルクリック又は下のボックスまでドロップしてください</h2>
	<div class="menu">
		<ul class="tabs">
			<li class="active" rel="tab1">米、麺</li>
			<?php
				for ($i=2; $i < 7; $i++) { 
					$type_no = "SELECT * FROM food_type WHERE type_no = '$i';";
    				$typeresult = mysql_query($type_no) or die('MySQL query error');
    				while($type = mysql_fetch_array($typeresult)){
			?>
			<li rel="tab<?php echo $i; ?>"><?php echo $type['type_name']; ?></li>
			<?php
					}
				}		
			?>
		</ul>
	</div>
	<div class="clear"></div>
	<div id="principal"><form action="cart.php" method="post">
		<div class="tab_container">
		<?php
			for ($i=1; $i < 7; $i++) {			
		?>
		<div id="tab<?php echo $i; ?>" class="food tab_content">
		<center>		
			<?php
				$id2=$i;
				$stmt->bindValue(':inputid',$id2,PDO::PARAM_STR);
				$stmt -> execute();
				foreach ($stmt as $row) {
				$id=$row['food_number'];
				$pic=$row['food_pic'];		
			?>
			<div class="foodpic" id="<?php echo $id; ?>">
            <?php echo "<img src=\"images/foodicon/".$pic."\">"?>
            <p><?php echo $row['food_name']?><span>(<?php echo $row['food_gram']?>g)</span></p>  
            </div>
            <?php
				}		
			?>
			</center>
        </div>
        <?php
			}		
		?>
		</div>
	
		
		<div class="basketresult">
			<div class="basket"><P>DROP HERE</P></div>
		    <div class="basket2">
		    	<div class="basket2_l">
		    		<h3>カロリー(kal)</h3>
				    <div class="basket_cal">
					</div>				    
				</div>
				<div class="basket2_r">
					<h3>価額(円)</h3>
				    <div class="basket_pri">
				    </div>
				</div>
		  		<div id="cal_t">0kal</div>
				<div id="pri_t">0円</div>
				
	    	</div>	    	

	    	
    	</div>
    	<div class="clear"></div>
    	<input type="hidden" name="order" value="0">
    	<div class="alignright">
    	<a href="order.php" style="padding-right: 20px;">やり直す</a>
    	<input type="submit" value="カートに入れる" class="btn"></div>
    </form></div>
</div>

<div id="footer">
	Copyright(C) Chen Pei Chu. All Rights Reserved.
</div>

</div>
<div id="cal_h"></div>
<div id="pri_h"></div>
<script type="text/javascript">
$(".tab_content").hide();
    $(".tab_content:first").show();

    $("ul.tabs li").click(function() {
		
      $(".tab_content").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();		
		
      $("ul.tabs li").removeClass("active");
      $(this).addClass("active");
	  
    });
	$('ul.tabs li').last().addClass("tab_last");   
</script>
</body>
</html>