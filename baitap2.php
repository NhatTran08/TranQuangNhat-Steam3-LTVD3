<?php
function daoNguocMang($mang) {
    return array_reverse($mang);
}

$mang = [1, 2, 3, 4, 5, 10, 20, 40, 45, 55, 70]; 
$mangDaoNguoc = daoNguocMang($mang);
echo "Mảng sau khi đảo ngược là: ";
print_r($mangDaoNguoc);
?>