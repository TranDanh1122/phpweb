<?php
function daochuoi($chuoi){

	return strrev($chuoi);
 }
 $chuoi='Tran Thanh Danh';
 echo 'Chuỗi '.$chuoi.' sau khi đảo '. daochuoi($chuoi);
 ?>
