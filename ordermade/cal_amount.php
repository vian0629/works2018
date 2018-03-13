<?php
session_start();
	if (isset($_POST['cal'])) {
		$cal= $_POST['cal'];
		if (isset($_SESSION['caltotal'])) {
		$caltotal=$_SESSION['caltotal'];
		$caltotal=$caltotal+$cal;
		}
		else{
			$caltotal=$cal;
		}
	}
	if(isset($_POST['kal_value'])){		
		$kal_value= $_POST['kal_value'];
		$caltotal=$_SESSION['caltotal'];
		$caltotal=$caltotal-$kal_value;	
	}
	// $count=$_POST['count'];
	// $su_count=$_POST['su_count'];
	
	$_SESSION['caltotal']=$caltotal;
	// if(isset($count)){echo 'test02:'.$count.'<br>';}
	// if(isset($su_count)){echo 'test04:'.$su_count.'<br>';}
	if(isset($_SESSION['caltotal'])){
		echo $caltotal.'kal<br>';
	}
?>