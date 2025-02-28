<?php
$sinh_vien = [
    ["ho_ten" => "Nguyễn Văn A", "ngay_sinh" => "2001-05-10", "gioi_tinh" => "Nam", "toan" => 7.5, "van" => 6.8, "tieng_anh" => 8.0],
    ["ho_ten" => "Trần Thị B", "ngay_sinh" => "2002-03-15", "gioi_tinh" => "Nữ", "toan" => 9.0, "van" => 8.5, "tieng_anh" => 8.2],
    ["ho_ten" => "Lê Văn C", "ngay_sinh" => "2001-07-20", "gioi_tinh" => "Nam", "toan" => 6.0, "van" => 7.2, "tieng_anh" => 7.5],
    ["ho_ten" => "Phạm Thị D", "ngay_sinh" => "2000-09-25", "gioi_tinh" => "Nữ", "toan" => 8.5, "van" => 7.8, "tieng_anh" => 9.0],
    ["ho_ten" => "Hoàng Anh E", "ngay_sinh" => "2003-06-12", "gioi_tinh" => "Nam", "toan" => 8.5, "van" => 8.0, "tieng_anh" => 8.2],
    ["ho_ten" => "Nguyễn Thị F", "ngay_sinh" => "2002-08-30", "gioi_tinh" => "Nữ", "toan" => 8.0, "van" => 7.0, "tieng_anh" => 7.5],
    ["ho_ten" => "Trần Văn G", "ngay_sinh" => "2001-11-10", "gioi_tinh" => "Nam", "toan" => 8.2, "van" => 7.9, "tieng_anh" => 8.4],
    ["ho_ten" => "Lê Thị H", "ngay_sinh" => "2003-04-05", "gioi_tinh" => "Nữ", "toan" => 9.1, "van" => 8.8, "tieng_anh" => 9.3],
    ["ho_ten" => "Phạm Văn I", "ngay_sinh" => "2000-02-21", "gioi_tinh" => "Nam", "toan" => 8.3, "van" => 8.0, "tieng_anh" => 8.5],
    ["ho_ten" => "Bùi Thị J", "ngay_sinh" => "2001-09-14", "gioi_tinh" => "Nữ", "toan" => 8.3, "van" => 7.5, "tieng_anh" => 8.6],
    ["ho_ten" => "Nguyễn Văn K", "ngay_sinh" => "2003-01-25", "gioi_tinh" => "Nam", "toan" => 8.5, "van" => 8.1, "tieng_anh" => 8.7],
    ["ho_ten" => "Trần Thị L", "ngay_sinh" => "2002-05-30", "gioi_tinh" => "Nữ", "toan" => 9.5, "van" => 8.9, "tieng_anh" => 9.0],
    ["ho_ten" => "Lê Văn M", "ngay_sinh" => "2001-07-19", "gioi_tinh" => "Nam", "toan" => 8.0, "van" => 8.2, "tieng_anh" => 8.4],
    ["ho_ten" => "Phạm Thị N", "ngay_sinh" => "2003-03-07", "gioi_tinh" => "Nữ", "toan" => 8.9, "van" => 8.3, "tieng_anh" => 8.5],
    ["ho_ten" => "Hoàng Văn O", "ngay_sinh" => "2000-10-16", "gioi_tinh" => "Nam", "toan" => 8.4, "van" => 8.0, "tieng_anh" => 8.2],
    ["ho_ten" => "Nguyễn Thị P", "ngay_sinh" => "2002-06-24", "gioi_tinh" => "Nữ", "toan" => 9.2, "van" => 8.7, "tieng_anh" => 9.1],
    ["ho_ten" => "Trần Văn Q", "ngay_sinh" => "2001-12-13", "gioi_tinh" => "Nam", "toan" => 8.1, "van" => 8.0, "tieng_anh" => 8.3],
    ["ho_ten" => "Lê Thị R", "ngay_sinh" => "2003-09-11", "gioi_tinh" => "Nữ", "toan" => 8.7, "van" => 8.1, "tieng_anh" => 8.6],
    ["ho_ten" => "Phạm Văn S", "ngay_sinh" => "2000-08-29", "gioi_tinh" => "Nam", "toan" => 8.0, "van" => 8.3, "tieng_anh" => 8.5]
];


foreach ($sinh_vien as &$sv) {
    $sv['diem_tb'] = round(($sv['toan'] + $sv['van'] + $sv['tieng_anh']) / 3, 2);
}
unset($sv);

function sapXepTheoTen($sinh_vien) {
    usort($sinh_vien, function($a, $b) {
        return strcmp($a['ho_ten'], $b['ho_ten']);
    });
    return $sinh_vien;
}

function laySinhVienNu($sinh_vien) {
    return array_filter($sinh_vien, function($sv) {
        return $sv['gioi_tinh'] === 'Nữ';
    });
}

function laySinhVienGioi($sinh_vien) {
    return array_filter($sinh_vien, function($sv) {
        return $sv['diem_tb'] >= 8.0;
    });
}

function layNuDiemCaoNhat($sinh_vien) {
    $nu_sinh = laySinhVienNu($sinh_vien);
    if (empty($nu_sinh)) return null;
    return array_reduce($nu_sinh, function($carry, $sv) {
        return ($carry === null || $sv['diem_tb'] > $carry['diem_tb']) ? $sv : $carry;
    });
}

function inBang($sinh_vien) {
    echo "<table border='1' cellspacing='0' cellpadding='5' style='border-collapse: collapse; text-align: center;'>";
    echo "<tr style='background-color: #4CAF50; color: white;'>";
    echo "<th>Họ Tên</th><th>Ngày Sinh</th><th>Giới Tính</th><th>Toán</th><th>Văn</th><th>Tiếng Anh</th><th>Điểm TB</th></tr>";
    foreach ($sinh_vien as $index => $sv) {
        $mau_nen = $index % 2 == 0 ? '#f2f2f2' : '#ffffff';
        echo "<tr style='background-color: $mau_nen;'>";
        echo "<td>{$sv['ho_ten']}</td><td>{$sv['ngay_sinh']}</td><td>{$sv['gioi_tinh']}</td>";
        echo "<td>{$sv['toan']}</td><td>{$sv['van']}</td><td>{$sv['tieng_anh']}</td><td>{$sv['diem_tb']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$sinh_vien_sap_xep = sapXepTheoTen($sinh_vien);
echo "<h3>Danh sách sinh viên đã sắp xếp theo tên:</h3>";
inBang($sinh_vien_sap_xep);

$sinh_vien_nu = laySinhVienNu($sinh_vien);
echo "<h3>Danh sách sinh viên nữ:</h3>";
inBang($sinh_vien_nu);

$sinh_vien_gioi = laySinhVienGioi($sinh_vien);
echo "<h3>Danh sách sinh viên có Điểm TB >= 8.0:</h3>";
inBang($sinh_vien_gioi);

$nu_diem_cao_nhat = layNuDiemCaoNhat($sinh_vien);
echo "<h3>Bạn nữ có Điểm TB cao nhất:</h3>";
if ($nu_diem_cao_nhat) {
    inBang([$nu_diem_cao_nhat]);
} else {
    echo "<p>Không có sinh viên nữ nào trong danh sách.</p>";
}
?>
