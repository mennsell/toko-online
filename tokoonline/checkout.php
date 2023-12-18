<?php
// checkout.php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $queryProduct = mysqli_query($conn, "SELECT * FROM produk WHERE id = '$productId'");
    $product = mysqli_fetch_array($queryProduct);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container py-5">
        <h3 class="text-center mb-4">Checkout</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan Pesanan</h5>
                        <p class="card-text"><?php echo $product['nama']; ?></p>
                        <p class="card-text">Harga: RP. <?php echo $product['harga']; ?></p>
                        <!-- Informasi tambahan pesanan -->
                        <!-- ... -->
                        <a href="payment.php?id=<?php echo $product['id']; ?>" class="btn btn-success">Pilih Metode Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>
