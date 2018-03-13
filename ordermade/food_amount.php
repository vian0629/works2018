<?php
	$formtest= $_POST['formtest'];
	$ps= $_POST['pass'];
	$su2= $_POST['su2'];
	$su_count=$_POST['su_count'];	
	if(isset($formtest)){echo 'test01:'.$formtest.'<br>';}
	if(isset($ps)){echo 'test02:'.$ps.'<br>';}
	if(isset($su2)){echo 'test03:'.$su2.'<br>';}
	if(isset($su_count)){echo 'test04:'.$su_count.'<br>';}
?>