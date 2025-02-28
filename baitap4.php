<?php
$students = [
    ["name" => "Nguyễn Văn A", "dob" => "2001-05-10", "gender" => "Nam", "math" => 7.5, "literature" => 6.8, "english" => 8.0],
    ["name" => "Trần Thị B", "dob" => "2002-03-15", "gender" => "Nữ", "math" => 9.0, "literature" => 8.5, "english" => 8.2],
    ["name" => "Lê Văn C", "dob" => "2001-07-20", "gender" => "Nam", "math" => 6.0, "literature" => 7.2, "english" => 7.5],
    ["name" => "Phạm Thị D", "dob" => "2000-09-25", "gender" => "Nữ", "math" => 8.5, "literature" => 7.8, "english" => 9.0],
    ["name" => "Hoàng Anh E", "dob" => "2003-06-12", "gender" => "Nam", "math" => 8.5, "literature" => 8.0, "english" => 8.2],
    ["name" => "Nguyễn Thị F", "dob" => "2002-08-30", "gender" => "Nữ", "math" => 8.0, "literature" => 7.0, "english" => 7.5],
    ["name" => "Trần Văn G", "dob" => "2001-11-10", "gender" => "Nam", "math" => 8.2, "literature" => 7.9, "english" => 8.4],
    ["name" => "Lê Thị H", "dob" => "2003-04-05", "gender" => "Nữ", "math" => 9.1, "literature" => 8.8, "english" => 9.3],
    ["name" => "Phạm Văn I", "dob" => "2000-02-21", "gender" => "Nam", "math" => 8.3, "literature" => 8.0, "english" => 8.5],
    ["name" => "Bùi Thị J", "dob" => "2001-09-14", "gender" => "Nữ", "math" => 8.3, "literature" => 7.5, "english" => 8.6],
    ["name" => "Nguyễn Văn K", "dob" => "2003-01-25", "gender" => "Nam", "math" => 8.5, "literature" => 8.1, "english" => 8.7],
    ["name" => "Trần Thị L", "dob" => "2002-05-30", "gender" => "Nữ", "math" => 9.5, "literature" => 8.9, "english" => 9.0],
    ["name" => "Lê Văn M", "dob" => "2001-07-19", "gender" => "Nam", "math" => 8.0, "literature" => 8.2, "english" => 8.4],
    ["name" => "Phạm Thị N", "dob" => "2003-03-07", "gender" => "Nữ", "math" => 8.9, "literature" => 8.3, "english" => 8.5],
    ["name" => "Hoàng Văn O", "dob" => "2000-10-16", "gender" => "Nam", "math" => 8.4, "literature" => 8.0, "english" => 8.2],
    ["name" => "Nguyễn Thị P", "dob" => "2002-06-24", "gender" => "Nữ", "math" => 9.2, "literature" => 8.7, "english" => 9.1],
    ["name" => "Trần Văn Q", "dob" => "2001-12-13", "gender" => "Nam", "math" => 8.1, "literature" => 8.0, "english" => 8.3],
    ["name" => "Lê Thị R", "dob" => "2003-09-11", "gender" => "Nữ", "math" => 8.7, "literature" => 8.1, "english" => 8.6],
    ["name" => "Phạm Văn S", "dob" => "2000-08-29", "gender" => "Nam", "math" => 8.0, "literature" => 8.3, "english" => 8.5],
    ["name" => "Bùi Thị T", "dob" => "2002-04-17", "gender" => "Nữ", "math" => 9.4, "literature" => 9.0, "english" => 9.3]
];

foreach ($students as &$student) {
    $student['average'] = round(($student['math'] + $student['literature'] + $student['english']) / 3, 2);
}
unset($student);

function sortByName($students) {
    usort($students, function($a, $b) {
        return strcmp($a['name'], $b['name']);
    });
    return $students;
}

function getFemaleStudents($students) {
    return array_filter($students, function($student) {
        return $student['gender'] === 'Nữ';
    });
}

function getHighAchievers($students) {
    return array_filter($students, function($student) {
        return $student['average'] >= 8.0;
    });
}

function getTopFemaleStudent($students) {
    $femaleStudents = getFemaleStudents($students);
    if (empty($femaleStudents)) return null;
    return array_reduce($femaleStudents, function($carry, $student) {
        return ($carry === null || $student['average'] > $carry['average']) ? $student : $carry;
    });
}

function printTable($students) {
    echo "<table border='1' cellspacing='0' cellpadding='5' style='border-collapse: collapse; text-align: center;'>";
    echo "<tr style='background-color: #4CAF50; color: white;'>";
    echo "<th>Họ Tên</th><th>Ngày Sinh</th><th>Giới Tính</th><th>Toán</th><th>Văn</th><th>Tiếng Anh</th><th>Điểm TB</th></tr>";
    foreach ($students as $index => $student) {
        $bgColor = $index % 2 == 0 ? '#f2f2f2' : '#ffffff';
        echo "<tr style='background-color: $bgColor;'>";
        echo "<td>{$student['name']}</td><td>{$student['dob']}</td><td>{$student['gender']}</td>";
        echo "<td>{$student['math']}</td><td>{$student['literature']}</td><td>{$student['english']}</td><td>{$student['average']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$sortedStudents = sortByName($students);
echo "<h3>Danh sách sinh viên đã sắp xếp theo tên:</h3>";
printTable($sortedStudents);

$femaleStudents = getFemaleStudents($students);
echo "<h3>Danh sách sinh viên nữ:</h3>";
printTable($femaleStudents);

$highAchievers = getHighAchievers($students);
echo "<h3>Danh sách sinh viên có Điểm TB >= 8.0:</h3>";
printTable($highAchievers);

$topFemale = getTopFemaleStudent($students);
echo "<h3>Bạn nữ có Điểm TB cao nhất:</h3>";
if ($topFemale) {
    printTable([$topFemale]);
} else {
    echo "<p>Không có sinh viên nữ nào trong danh sách.</p>";
}

?>