<?php 
    require "koneksi.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori ");

    // get produk by nama produk/keyword
    if(isset($_GET['keyword'])){
        $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
    }
    // get produk by kategori
    else if(isset($_GET['kategori'])){
            $queryGetKategoriId = mysqli_query($conn, "SELECT ID FROM kategori WHERE NAMA='$_GET[kategori]'");
            $kategoriId = mysqli_fetch_array($queryGetKategoriId);
            // echo $kategoriId['ID'];
            $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id='$kategoriId[ID]'");
        }
    // get produk default
    else {
        $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE ketersediaan_stok!='HABIS'");
    }

    $countData = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Produk</h1>
        </div>
    </div>

    <!-- body -->
    <div class="container py-5" style="height: 100vh;">
        <div class="row">
            <div class="col-lg-3 mb-5" style="position: sticky; position: -webkit-sticky; top: 0; z-index: 9999999999999;">
            <h3 class="container text-center">Kategori</h3>
            <ul class="list-group">
                <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
                    <a class="no-decoration" href="produk.php?kategori=<?php echo $kategori['NAMA']; ?>">
                    <li class="list-group-item"><?php echo $kategori['NAMA']; ?></li>
                    </a>
                <?php } ?>
            </ul>
            </div>
            <div class="col-lg-9" style="overflow: scroll; height: 80vh;">
                <h3 class="text-center mb-3">Produk</h3>
                        <div class="row">
                            <?php 
                                if($countData<1){
                                ?>
                                <h4 class="text-center my-5">Produk Yang Anda Cari Tidak Tersedia</h4>
                                <?php
                                }
                            ?>

                        <?php while($produk = mysqli_fetch_array($queryProduk)){ ?>
                            <div class="col-md-4 mb-4">
                            <div class="card h-100">
                            <div class="image-box">
                            <img src="image/<?php echo $produk['foto']; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $produk['nama'] ?></h4>
                                <p class="card-text text-truncate"><?php echo $produk['detail']; ?></p>
                                <p class="card-text text-harga">RP. <?php echo $produk['harga']; ?></p>
                                <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn warna2 text-white">Detail</a>
                                <a href="checkout.php?id=<?php echo $produk['id']; ?>" class="btn btn-primary text-white">Checkout</a>
                            </div>
                        </div>
                    </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 content-subscribe text-light">
        <div class="container">
            <h5 class="text-center mb-4">Temui kami</h5>
            <div class="row justify-content-center">
                <div class="col-sm-1 d-flex justify-content-center mb-2">
                    <a href="http://facebook.com"><i class="fab fa-facebook fs-4"></i></a>
                </div>
                <div class="col-sm-1 d-flex justify-content-center mb-2">
                    <a href="http://instagram.com"><i class="fab fa-instagram fs-4"></i></a>
                </div>
                <div class="col-sm-1 d-flex justify-content-center mb-2">
                    <a href="http://twitter.com"><i class="fab fa-twitter fs-4"></i></a>
                </div>
                <div class="col-sm-1 d-flex justify-content-center mb-2">
                    <a href="http://youtube.com"><i class="fab fa-youtube fs-4"></i></a>
                </div>
                <div class="col-sm-1 d-flex justify-content-center mb-2">
                    <a href="http://wa.me/+6285718099771"><i class="fab fa-whatsapp fs-4"></i></a>
                </div>
            </div>

            <!-- gimmick
                <h5 class="text-center mt-5 mb-0">Subsribe</h5>
            <p class="text-center font-monospace">Untuk Informasi Tentang Promo</p>
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ketikan Email"
                        aria-label="recipnt username" aria-describedby="button-addon2">
                    <button class="btn btn-warning text-light" type="button" 
                    id="button-addon2">Subsribe</button>
                </div>
            </div> -->

        </div>
    </div>

    <div class="container-fluid py-3 bg-dark text-light">
        <div class="container d-flex justify-content-beetwen">
            <label>&copy; 2023 Maman Merchandise</label>
            <label>Created by Salman</label>
        </div>
    </div>

    <script src=" bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>