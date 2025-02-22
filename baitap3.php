<?php
function timGiaTri($giaTri, $mang) {
  
    foreach ($mang as $index => $value) {
        if ($value == $giaTri) {
            return $index; 
        }
    }
    return -1; 
}
$mang = [10, 20, 30, 40, 50]; 
$giaTri = 60; 
$index = timGiaTri($giaTri, $mang);
if ($index != -1) {
    echo "Giá trị $giaTri tìm thấy tại index $index.";
} else {
    echo "Giá trị $giaTri không có trong mảng.";
}
?>