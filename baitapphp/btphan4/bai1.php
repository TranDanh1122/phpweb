<?php

function tinhgiaithua($num){
	$giaithua=1;
	for($i=1;$i<=$num;$i++){
		$giaithua*=$i;
	}
	return $giaithua;
} 
echo 'Giai thua cua so nhap vao ham la '.tinhgiaithua(3);
?>