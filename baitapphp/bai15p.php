<?php 
class baitap{


function tinhtong(){
	$truyen=func_get_args();
	$tong=0;
	foreach ($truyen as $key => $value) {
		$tong+=$value;
	}
	return $tong;
}

}

$newclass= new baitap;
echo $newclass->tinhtong(1,2,3,4,5,6);
//thong qua ten bien
$tenham='tinhtong';

echo '<br>'.$newclass->$tenham(1,2,3,4,5,6);
?>