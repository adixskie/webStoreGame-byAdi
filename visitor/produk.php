<?php
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    // get produk by nama produk/keyword
    if(isset($_GET['keyword'])){
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
    }
    // get by kategori
    else if(isset($_GET['kategori'])){
        $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);
        
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
    }
    // get default kategori
    else{
        $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    }
    $countData = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razor Store || Produk</title>
    <link rel="stylesheet" href="produk.css">
</head>
<body>

<nav>
    <a href="index.php">Home<span></span></a>
    <a href="#">Produk<span></span></a>
    <a href="about.php">About<span></span></a>
</nav>

    <div class="container">
        <div class="box one" style="--img:url(../visitor/img1.jpg);" data-text="God of war"></div>
        <div class="box two" style="--img:url(../visitor/img2.jpg);" data-text="GTA"></div>
        <div class="box three" style="--img:url(../visitor/img3.jpg);" data-text="star wars"></div>
        <div class="box four" style="--img:url(../visitor/img4.jpg);" data-text="Call of duty"></div>
        <div class="box five" style="--img:url(../visitor/img5.jpg);" data-text="PUBG"></div>
    </div>

    <h1 contenteditable="true">Produk</h1>

    <?php 
        if($countData<1){
            ?>
                <h4>produk kagak ada</h4>
            <?php
        }
    ?>

    <!-- list katefori -->
    <div class="container-list">
<?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
        <div class="box-list" style="--clr:#03bcf4;">
            <div class="box-content">
                <div class="icon"><ion-icon name="logo-steam"></ion-icon></div>
                    <div class="text">
                        <h3>Kategori</h3>
                        <a style="text-decoration: none;" href="produk.php?kategori=<?php echo $kategori['nama']; ?>">
                        <p><?php echo $kategori['nama']; ?></p>
                        </a>
                    </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="container-card">
    <?php while($produk = mysqli_fetch_array($queryProduk)){ ?>
<div class="box" data-color="clr1">
                <div class="imgBx"><img src="../image/<?php echo $produk['foto']; ?>" width="200px" alt=""></div>
            <div class="glass">
                <h3>Rp <?php echo $produk['harga']; ?><br><span><?php echo $produk['nama'];?></span></h3> 
            <ul>
            <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" style="text-decoration:none; color:white; font-size:1em;">lihat detail</a>
            </ul>
            </div>
        </div>
    <?php }?>
</div>
        

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>