<li>4.Viết PHP script để hiển thị số lượng một ký tự bất kì trong chuỗi</li>
<?php
        $str="mon hoc lap trinh ma nguon mo";  
		$kitu = "m";  
		$dem = 0;  
		for($i=0; $i < strlen($str); $i++)  
		  {   
			if(substr($str,$i,1) == $kitu)  
			{  
			 $dem++;  
			 }  
		  }  
		echo "Chuoi ban dau: ".$str ;
		echo "<br>Chuoi co " .$dem. " ki tu " .$kitu ;
       ?>