<?php
// Tạo một đối tượng mới từ class products và category
$products = new products();
$category = new category();

// Lấy tất cả sản phẩm và thể loại
$allProducts = $products->getAllProducts();
$allCategories = $category->getAllCategory();

// Tạo một mảng để lưu trữ thông tin thống kê
$categoryStats = array();

// Thống kê sản phẩm theo thể loại
foreach ($allCategories as $cat) {
    $categoryProducts = array_filter($allProducts, function ($product) use ($cat) {
        return $product['category_id'] == $cat['id'];
    });

    $productPrices = array_map(function ($product) {
        return $product['price'];
    }, $categoryProducts);

    if (count($productPrices) > 0) {
        $categoryStats[] = array(
            'name' => $cat['name'],
            'max_price' => max($productPrices),
            'min_price' => min($productPrices),
            'avg_price' => array_sum($productPrices) / count($productPrices)
        );
    }
}

// Chuyển dữ liệu thành mảng JavaScript
echo '<script>';
echo 'var categories = ' . json_encode($categoryStats) . ';';
echo '</script>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #myChart {
            width: 100%;
            height: 400px;
        }

        #statsTable {
            width: 100%;
        }
    </style>
    <title>Thống kê sản phẩm</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <!-- Thêm thẻ canvas vào đây -->
                <canvas id="myChart"></canvas>
            </div>

            <div class="col-sm-6">
                <!-- Thêm bảng thống kê vào đây -->
                <table id="statsTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Thể loại</th>
                            <th>Giá cao nhất</th>
                            <th>Giá thấp nhất</th>
                            <th>Giá trung bình</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Giả sử bạn đã lấy dữ liệu từ cơ sở dữ liệu và chuyển nó thành mảng JavaScript
        var categoryNames = categories.map(function(category) {
            return category.name;
        });
        var maxPrices = categories.map(function(category) {
            return category.max_price;
        });
        var minPrices = categories.map(function(category) {
            return category.min_price;
        });
        var avgPrices = categories.map(function(category) {
            return category.avg_price;
        });

        // Tạo biểu đồ
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Thay đổi kiểu biểu đồ thành bar
            data: {
                labels: categoryNames, // Tên các thể loại
                datasets: [{
                        label: 'Giá cao nhất',
                        data: maxPrices, // Giá cao nhất của các sản phẩm theo thể loại
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255,99,132,1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Giá thấp nhất',
                        data: minPrices, // Giá thấp nhất của các sản phẩm theo thể loại
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54,162,235,1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Giá trung bình',
                        data: avgPrices, // Giá trung bình của các sản phẩm theo thể loại
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75,192,192,1)',
                        borderWidth: 1
                    }
                ]
            },
        });

        // Thêm dữ liệu vào bảng thống kê
        var tableBody = document.querySelector('#statsTable tbody');
        for (var i = 0; i < categories.length; i++) {
            var row = tableBody.insertRow(-1);
            row.insertCell(0).innerHTML = categories[i].name;
            row.insertCell(1).innerHTML = categories[i].max_price;
            row.insertCell(2).innerHTML = categories[i].min_price;
            row.insertCell(3).innerHTML = categories[i].avg_price;
        }
    </script>
</body>

</html>