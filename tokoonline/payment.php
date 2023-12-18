<?php
// payment.php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $queryProduct = mysqli_query($conn, "SELECT * FROM produk WHERE ID = '$productId'");
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
        <h3 class="text-center mb-4">Metode Pembayaran</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan Pesanan</h5>
                        <p class="card-text"><?php echo $product['nama']; ?></p>
                        <p class="card-text">Harga: RP. <?php echo $product['harga']; ?></p>
                
                        <form action="payment.php?id=<?php echo $product['id'] ?>" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <label for="payment_method">Pilih Metode Pembayaran:</label>
                            <select name="payment_method" id="payment_method" class="form-control" required>
                                <option value="gopay">GoPay</option>
                                <option value="atm">ATM</option>
                                <option value="dana">Dana</option>
                                <option value="alfamart">Alfamart</option>
                                <option value="indomart">Indomart</option>
                            </select>
                            <button type="submit" class="btn btn-primary" name="bayar">Bayar Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <?php 
            if(isset($_POST['bayar'])){
                echo "<div class='alert alert-warning' role='alert'>
                            Pembayaran Berhasil
                        </div>";
                echo "<meta http-equiv='refresh' content='1; url=index.php' />";
            }
        ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>
