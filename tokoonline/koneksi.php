<?php
    $conn = mysqli_connect("localhost", "root", "", "toko_online");
    if (mysqli_connect_error()) {
  die("Connection failed: " . mysqli_connect_error());
}

?>