<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($conn,"SELECT * FROM kategori");
    $jumlahKategori  = mysqli_num_rows($queryKategori);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../foontawesome/css/foontawesome.min.css">
</head>

<style>
    .no-decoration{
        text-decoration: none;

    }


</style>
<body>
<?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" class="no-decoration text-muted">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-align-justify"></i> Kategori
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Kategori</h3>

            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="input nama kategori" 
                    class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>

           <?php
               if(isset($_POST['simpan_kategori'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    $queryExist = mysqli_query($conn,"SELECT nama FROM kategori WHERE
                    nama='$kategori'");
                    $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);
                    if($jumlahDataKategoriBaru > 0){
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            kategori Sudah Ada
                        </div>
                        <?php
                    }
                    else{
                        $querySimpan = mysqli_query( $conn,"INSERT INTO kategori (nama) VALUES
                        ('$kategori')");

                        if($querySimpan){

                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                            kategori Berhasil tersimpan
                        </div>

                        <meta http-equiv="refresh" content="2; url=kategori.php" />
                            <?php

                        }
                            else{
                                echo mysqli_error($conn);
                            }
                        }
                 }
           ?>
        </div>
        
        <div class="mt-3">
            <h3>List Kategori</h3>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                            if($jumlahKategori==0){
                        ?>
                            <tr>
                                <td  colspan=3 class="text-center">Data kategori tidak tersedia</td>
                            </tr>
                        <?php
                            }
                            else{
                                $jumlah = 1;
                                while($data = mysqli_fetch_array($queryKategori)){
                        ?>
                            <tr>
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $data['NAMA']; ?></td>
                                <td>
                                    <a href="kategori-detail.php?p=<?php echo $data ['ID']; ?>"
                                    class="btn btn-info"><i class="fas fa-search"></i></a>
                                </td>
                            </tr>
                        <?php 
                            $jumlah++;
                                } 
                            }
                       ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>