

<li>3. Viết PHP script để hiển thị giai thừa của một số trong PHP</li>
<?php 
$n = 6;

echo "Giai thua cua so ".$n." = ";
$giaithua=1;
if ($n == 0 || $n == 1) {
        echo $n;
    } 
else {
        for($i = 2; $i <= $n; $i ++) {
            $giaithua *= $i;
        }
        echo $giaithua;
    }
?>

       