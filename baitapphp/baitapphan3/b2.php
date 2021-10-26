<li>2. Viết PHP script để hiển thị tổng dãy số nguyên từ 1 đến 200.</li>
<?php 

$i=0;
$tong=0;
while($i<=200){
$tong=$tong+$i;
$i++;
}
echo "Tong day so = ".$tong;
?>