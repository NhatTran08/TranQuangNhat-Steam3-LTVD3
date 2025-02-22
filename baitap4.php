<?php
// Tạo danh sách sinh viên
$students = [
    ["name" => "Nguyễn Văn A", "dob" => "2001-05-10", "gender" => "Nam", "math" => 7.5, "literature" => 6.8, "english" => 8.0],
    ["name" => "Trần Thị B", "dob" => "2002-03-15", "gender" => "Nữ", "math" => 9.0, "literature" => 8.5, "english" => 8.2],
    ["name" => "Lê Văn C", "dob" => "2001-07-20", "gender" => "Nam", "math" => 6.0, "literature" => 7.2, "english" => 7.5],
    ["name" => "Phạm Thị D", "dob" => "2000-09-25", "gender" => "Nữ", "math" => 8.5, "literature" => 7.8, "english" => 9.0],
    // Thêm các sinh viên khác
];

// Thêm điểm trung bình cho từng sinh viên
foreach ($students as &$student) {
    $student["average"] = ($student["math"] + $student["literature"] + $student["english"]) / 3;
}
unset($student);

// Hàm sắp xếp theo tên
function sortByName(&$students) {
    usort($students, function ($a, $b) {
        return strcmp($a["name"], $b["name"]);
    });
}

// Hàm lọc danh sách sinh viên nữ
function getFemaleStudents($students) {
    return array_filter($students, function ($student) {
        return $student["gender"] === "Nữ";
    });
}

// Hàm lọc danh sách sinh viên có điểm TB >= 8.0
function getHighAchievers($students) {
    return array_filter($students, function ($student) {
        return $student["average"] >= 8.0;
    });
}

// Tìm nữ sinh có điểm TB cao nhất
function getTopFemaleStudent($students) {
    $femaleStudents = getFemaleStudents($students);
    if (empty($femaleStudents)) {
        return null;
    }
    usort($femaleStudents, fn($a, $b) => $b["average"] <=> $a["average"]);
    return $femaleStudents[0];
}

// Hàm in danh sách sinh viên dưới dạng bảng
function printStudents($students) {
    echo "<style>
            table { border-collapse: collapse; width: 100%; }
            th, td { border: 1px solid black; padding: 8px; text-align: left; }
            th { background-color: #4CAF50; color: white; }
            tr:nth-child(even) { background-color: #f2f2f2; }
            tr:hover { background-color: #ddd; }
          </style>";
    
    echo "<table>";
    echo "<tr><th>Họ tên</th><th>Ngày sinh</th><th>Giới tính</th><th>Toán</th><th>Văn</th><th>Tiếng Anh</th><th>Điểm TB</th></tr>";
    foreach ($students as $student) {
        echo "<tr>
                <td>{$student["name"]}</td>
                <td>{$student["dob"]}</td>
                <td>{$student["gender"]}</td>
                <td>{$student["math"]}</td>
                <td>{$student["literature"]}</td>
                <td>{$student["english"]}</td>
                <td>" . number_format($student["average"], 2) . "</td>
              </tr>";
    }
    echo "</table>";
}

// Thực thi các hàm và in kết quả
sortByName($students);
echo "<h3>Danh sách sinh viên sắp xếp theo tên:</h3>";
printStudents($students);

echo "<h3>Danh sách sinh viên nữ:</h3>";
printStudents(getFemaleStudents($students));

echo "<h3>Danh sách sinh viên có điểm TB >= 8.0:</h3>";
printStudents(getHighAchievers($students));

$topFemale = getTopFemaleStudent($students);
if ($topFemale) {
    echo "<h3>Nữ sinh có điểm TB cao nhất:</h3>";
    printStudents([$topFemale]);
}
?>
