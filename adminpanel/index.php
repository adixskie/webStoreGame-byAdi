<?php
    require "session.php";
    require "../koneksi.php";


    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);
    
    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    $jumlahProduk = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <!-- boxicons link -->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- remixicon link -->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css"
    rel="stylesheet"
    />

    <!-- google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Permanent+Marker&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../style.css">


</head>
<body>
<div class="bg">
        <div class="bubbles">
            <span style="--i:11;"></span>
            <span style="--i:12;"></span>
            <span style="--i:24;"></span>
            <span style="--i:10;"></span>
            <span style="--i:14;"></span>
            <span style="--i:23;"></span>
            <span style="--i:18;"></span>
            <span style="--i:16;"></span>
            <span style="--i:19;"></span>
            <span style="--i:20;"></span>
            <span style="--i:22;"></span>
            <span style="--i:25;"></span>
            <span style="--i:18;"></span>
            <span style="--i:21;"></span>
            <span style="--i:13;"></span>
            <span style="--i:15;"></span>
            <span style="--i:26;"></span>
            <span style="--i:17;"></span>
            <span style="--i:13;"></span>
            <span style="--i:28;"></span>
            <span style="--i:11;"></span>
            <span style="--i:12;"></span>
            <span style="--i:24;"></span>
            <span style="--i:10;"></span>
            <span style="--i:14;"></span>
            <span style="--i:23;"></span>
            <span style="--i:18;"></span>
            <span style="--i:16;"></span>
            <span style="--i:19;"></span>
            <span style="--i:20;"></span>
            <span style="--i:22;"></span>
            <span style="--i:25;"></span>
            <span style="--i:18;"></span>
            <span style="--i:21;"></span>
            <span style="--i:13;"></span>
            <span style="--i:15;"></span>
            <span style="--i:26;"></span>
            <span style="--i:17;"></span>
            <span style="--i:13;"></span>
            <span style="--i:28;"></span>
        </div>
    </div>
    <header>
        <a href="../visitor/index.php" class="logo"><span>Razor</span>Store</a>
        <nav>
        <a href="#"class="active">Home</a>
        <a href="kategori.php">Kategori</a>
        <a href="produk.php">Produk</a>
        <a href="login.php">Logout</a>
        <nav>
        </nav>
    </header>

    <section>
        <div class="content">
            <h2><span>Hello</span><?php echo $_SESSION["username"] ?></h2>
            <p>Saat ini Razor Store memiliki <?php echo $jumlahKategori; ?> Kategori, dan saat ini di Razor Store toko milik anda memiliki <?php echo $jumlahProduk; ?> Produk.</p>
                <div class="buttons">
                    <a href="kategori.php">Kategori</a>
                    <a href="produk.php">Produk</a>
                </div>
            </div>
    </section>

    <!-- card sessioin -->

        <div class="container">
            <div class="box" data-color="clr1">
                <div class="imgBx"><img src="../asset/pexels-anthony-🙂-139038.jpg" width="200px" alt=""></div>
            <div class="glass">
                <h3>Game<br><span>For Life</span></h3> 
            <ul>
                <a href="#" style="--a:1;"><ion-icon name="logo-playstation"></ion-icon></a>
                <a href="#" style="--a:2;"><ion-icon name="logo-xbox"></ion-icon></a>
                <a href="#" style="--a:3;"><ion-icon name="logo-steam"></ion-icon></a>
            </ul>
            </div>
        </div>
            <div class="box" data-color="clr2">
                <div class="imgBx"><img src="../asset/gta.jpg" width="200px" alt=""></div>
            <div class="glass">
                <h3>Game<br><span>For Style</span></h3> 
            <ul>
                <a href="#" style="--a:1;"><ion-icon name="logo-playstation"></ion-icon></a>
                <a href="#" style="--a:2;"><ion-icon name="logo-xbox"></ion-icon></a>
                <a href="#" style="--a:3;"><ion-icon name="logo-steam"></ion-icon></a>
            </ul>
            </div>
        </div>
            <div class="box" data-color="clr3">
                <div class="imgBx"><img src="../asset/1337465.png" width="200px" alt=""></div>
            <div class="glass">
                <h3>Game<br><span>To Die</span></h3> 
            <ul>
                <a href="#" style="--a:1;"><ion-icon name="logo-playstation"></ion-icon></a>
                <a href="#" style="--a:2;"><ion-icon name="logo-xbox"></ion-icon></a>
                <a href="#" style="--a:3;"><ion-icon name="logo-steam"></ion-icon></a>
            </ul>
            </div>
        </div>
            <div class="box" data-color="clr4">
                <div class="imgBx"><img src="../asset/peakpx.jpg" width="200px" alt=""></div>
            <div class="glass">
                <h3>Game<br><span>And You</span></h3> 
            <ul>
                <a href="#" style="--a:1;"><ion-icon name="logo-playstation"></ion-icon></a>
                <a href="#" style="--a:2;"><ion-icon name="logo-xbox"></ion-icon></a>
                <a href="#" style="--a:3;"><ion-icon name="logo-steam"></ion-icon></a>
            </ul>
            </div>
        </div>
    </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>