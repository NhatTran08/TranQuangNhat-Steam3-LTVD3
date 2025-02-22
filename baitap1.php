<?php
function sapXep($mang) {
    $n = count($mang); 
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($mang[$j] > $mang[$j + 1]) {
                $temp = $mang[$j];
                $mang[$j] = $mang[$j + 1];
                $mang[$j + 1] = $temp;
            }
        }
    }
    return $mang;
}
$mang = [34, 9, 23, 132, 5, 62, 190, 240, 99, 45]; 
$mangSapXep = sapXep($mang);
echo "Mảng sau khi sắp xếp là: ";
print_r($mangSapXep);
?>