<?php  
	$digits = 5;
	echo str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
?>