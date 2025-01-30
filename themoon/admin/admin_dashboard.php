<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Dashboard Admin</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Produk</h5>
                        <p class="card-text">100</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Pesanan</h5>
                        <p class="card-text">50</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Kategori</h5>
                        <p class="card-text">10</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="admin_products.php" class="btn btn-primary mt-4">Kelola Produk</a>
        <a href="admin_categories.php" class="btn btn-primary mt-4">Kelola Kategori</a>
        <a href="admin_orders.php" class="btn btn-primary mt-4">Kelola Pesanan</a>
        <a href="change_password.php" class="btn btn-secondary mt-4">Ganti Password</a> <!-- Tautan Ganti Password -->
        <a href="admin_logout.php" class="btn btn-danger mt-4">Logout</a>
    </div>
</body>
</html>