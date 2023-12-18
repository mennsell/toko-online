<?php
    require "koneksi.php";
    $queryProduk = mysqli_query($conn, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");

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
    
    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Toko Online</h1>
            <h5>Mau Cari Apa?</h5>
            <div class="col-md-8 offset-md-2">
        <form method="get" action="produk.php">
            <div class="input-group input-group-lg my-4">
            <input type="text" class="form-control" placeholder="Nama Barang" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
            <button type="submit" class="btn warna2 text-white">Telusuri</button>
            </div>
            </div>
        </form>
        </div>
    </div>
    
    <!-- higtlighted kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-baju-pria d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Baju Pria">Baju Pria</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-baju-wanita d-flex justify-content-center align-items-center">
                    <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Baju Wanita">Baju Wanita</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-sepatu d-flex justify-content-center align-items-center">
                    <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Sepatu">Sepatu</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami-->
    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>Tentang kami</h3>
            <p class="fs-5 mt-3">
                Latar Belakang pembuatan Toko ini itu <br>
                Kalau di lihat dari perkembangan zaman, <br>
                sekarang sudah banyak aplikasi-aplikasi E-commerce, <br>
                nah kebanyakan konsumen sekarang cenderung berbelanja secara online<br>
                karna kenyamanan dan flexibilitas yang ditawarkan. <br>
                Konsumen dapat membeli produk atau layanannya kapan aja dan dimana aja.<br>

            </p>
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
            <?php while ($data = mysqli_fetch_array($queryProduk)){ ?>
                <div class="col-sm-6 col-md-4 mb-3">
                <div class="card h-100">
                    <div class="image-box">
                    <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $data['nama'] ?></h4>
                        <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                        <p class="card-text text-harga">RP. <?php echo $data['harga']; ?></p>
                        <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn warna2 text-white">Detail</a>
                    </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            <a class="btn btn-outline-warning mt-3 p-2 fs-3" href="produk.php">See more</a>
        </div>
    </div>

    <!-- footer -->
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