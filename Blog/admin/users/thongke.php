<?php
// Tạo một đối tượng mới từ class user
$user = new user();

// Lấy tất cả người dùng
$allUsers = $user->getAllUsers();

// Tạo một mảng để lưu trữ số lượng người dùng theo vai trò
$roleCounts = array();

// Tạo một mảng để lưu trữ số lượng hoạt động của người dùng
$userActivityCounts = array();

$roleNames = array(
    1 => 'User',
    2 => 'Admin',
    // Thêm các vai trò khác nếu cần
);

// Đếm số lượng người dùng theo vai trò
foreach ($allUsers as $user) {
    if (!isset($roleCounts[$user['role']])) {
        $roleCounts[$user['role']] = 0;
    }
    $roleCounts[$user['role']]++;
}

// Chuyển dữ liệu thành mảng JavaScript
echo '<script>';
echo 'var roles = ' . json_encode(array_keys($roleCounts)) . ';';
echo 'var counts = ' . json_encode(array_values($roleCounts)) . ';';
echo '</script>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Thêm Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white !important;
        }

        #myChart {
            width: 100%;
            height: 100%;
        }
    </style>
    <title>Thống kê người dùng</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Tên người dùng</td>
                            <td>Vai trò</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allUsers as $user) : ?>
                            <tr>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $roleNames[$user['role']]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-6">
                <!-- Thêm thẻ canvas vào đây -->
                <canvas id="myChart"></canvas>

                <script>
                    // Tạo mảng chứa tên vai trò
                    var roleNames = roles.map(function(role) {
                        return role == 1 ? 'User' : 'Admin';
                    });

                    // Tạo biểu đồ
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar', // Thay đổi kiểu biểu đồ thành bar
                        data: {
                            labels: roleNames, // Tên các vai trò
                            datasets: [{
                                label: 'Số lượng người dùng',
                                data: counts, // Số lượng người dùng theo vai trò
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255,159,64,0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54,162,235,1)',
                                    'rgba(255,206,86,1)',
                                    'rgba(75,192,192,1)',
                                    'rgba(153,102,255,1)',
                                    'rgba(255,159,64,1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                    });
                </script>
            </div>
        </div>
    </div>
</body>

</html>