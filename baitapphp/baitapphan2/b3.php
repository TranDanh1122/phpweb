<li>3. Viết PHP script để hiện thi văn bản Chuyển đổi mảng thành chữ hoa - chữ thường
và ngược lại thông qua button html</li>


<?php

		$mang = array('Toi','lap','trinh','PHP');  
		$str = implode(' ', $mang);
       echo "Van ban cua mang: ".$str;

   $chuhoa = strtoupper($str);
   echo "<br>Van ban thanh chu hoa: ".$chuhoa;
   $chuthuong= strtolower($str);
   echo "<br>Van ban thanh chu thuong: ".$chuthuong;

?>