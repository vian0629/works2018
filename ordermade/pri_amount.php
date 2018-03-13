<?php
session_start();
	if (isset($_POST['pri'])) {
		$pri= $_POST['pri'];
		if (isset($_SESSION['ptotal'])) {
		$ptotal=$_SESSION['ptotal'];
		$ptotal=$ptotal+$pri;
		}
		else{
			$ptotal=$pri;
		}		
	}	
	if(isset($_POST['pri_value'])){		
		$pri_value= $_POST['pri_value'];
		$ptotal=$_SESSION['ptotal'];
		$ptotal=$ptotal-$pri_value;	
	}
	$_SESSION['ptotal']=$ptotal;
	if(isset($_SESSION['ptotal'])){
		echo $ptotal.'円<br>';
		echo '<input type="hidden" name="pri" value="'.$ptotal.'">';
	}
?>