<?php

require "../koneksi.php";
    $nama = htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
    $produk = mysqli_fetch_array($queryProduk);
    
    $queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produk-detail</title>
    <link rel="stylesheet" href="produk-detail.css">
</head>
<body>

<header>
        <a href="#" class="logo"><span>Razor</span>Store</a>
        <nav>
        <a href="index.php"class="active">Home</a>
        <a href="produk.php">Produk</a>
        <a href="about.php">About</a>
        <nav>
        </nav>
</header>


<div class="container-detail">
    <div class="card">
        <div class="detail-content">
            <img src="../image/<?php echo $produk['foto']; ?>" style="height: 100px;" alt="">
            <h3><?php echo $produk['nama']; ?></h3>
            <p><?php echo $produk['detail']; ?></p>
            <p style="color: red; font-size:1.5em; font-weight:800;"><?php echo $produk['ketersediaan_stok']; ?></p>
                <a href="">Rp <?php echo $produk['harga']; ?></a>
        </div>
    </div>
</div>

<h1 contenteditable="true">Produk Terkait</h1>


<div class="container-card">
    <?php while($data=mysqli_fetch_array($queryProdukTerkait)){ ?>
<div class="box" data-color="clr1">
                <div class="imgBx"><img src="../image/<?php echo $data['foto']; ?>" style="text-decoration:none; color:white; font-size:1em;" width="200px" alt=""></div>
            <div class="glass">
                <h3>Rp <?php echo $data['harga']; ?><br><span><?php echo $data['nama']; ?></span></h3> 
            <ul>
            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">lihat detail</a>
            </ul>
            </div>
        </div>
    <?php } ?>
</div>

<script type="text/javascript" src="vanilla-tilt.js"></script>
<script>
    VanillaTilt.init(document.querySelectorAll(".card"), {
		max: 25,
		speed: 400,
        glare: true,
        "max-glare": 1,
	});
</script>
</body>
</html>