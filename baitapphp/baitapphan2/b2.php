
<li>2. Viết PHP script để tìm giá trị trung bình của các phần tử mảng và hiển thị 5 phần tử
nhỏ nhất và lớn nhất. Dữ liệu được khai báo trực tiếp trong file.</li>
<?php
$mang=array(1,2,4,2,9,6,2,3,5,2,6,8,9,6,7);
$gttb=0;
foreach($mang as $gtri){
$gttb = $gttb + $gtri;
}
echo "Phan tu mang :";
foreach($mang as $gtri){
 echo ", ".$gtri;
}
echo "<br>Tìm giá trị trung bình của các phần tử mảng:".(float)$gttb/count($mang);
sort($mang);  
echo "<br> 5 số nhỏ nhất: ";  
		for ($i=0; $i < 5; $i++)  
		{   
		  echo $mang[$i].", ";  
		}  
		echo "<br> 5 số lớn nhất: ";  
		for ($i=(count($mang)-5); $i < count($mang); $i++)  
		{  
		  echo $mang[$i].", ";  
		}
?>