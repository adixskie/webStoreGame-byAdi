<?php
    require "../koneksi.php";
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razor Store</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<body>

    <header>
        <a href="../adminpanel/index.php" class="logo"><span>Razor</span>Store</a>
        <nav>
        <a href=""class="active">Home</a>
        <a href="produk.php">Produk</a>
        <a href="about.php">About</a>
        <nav>
        </nav>
    </header>


    <h6>Hello
        <span style="--z:0;" data-text="Gamers.">Gamers.</span>
        <span style="--z:1;" data-text="Admin.">Admin.</span>
        <span style="--z:2;" data-text="Mamank.">Mamank.</span>
    </h6>


    <div class="content">
        <h1>Kategori</h1>
        
    </div>

<form method="get" action="produk.php">
    <div class="search">
        <input type="text" placeholder="Search..." name="keyword" autocomplete="off">
        <a href="#"><i class="fas fa-search"></i></a>
    </div>

    <button style="margin-top: 100px; display:none;" class="stylish-button" type="submit">cari</button>
</form>
    
<!-- top rank -->
<div class="container">
            <div class="box" data-color="clr1">
                <div class="imgBx"><img src="steam.jpg" width="200px" alt=""></div>
            <div class="glass">
                <h3><a style="text-decoration: none; color:white; font-weight:800;" href="produk.php?kategori=PC Game">PC</a><br><span>GAME</span></h3> 
            <ul>
                <a href="#" style="--a:1;"><ion-icon name="logo-playstation"></ion-icon></a>
                <a href="#" style="--a:2;"><ion-icon name="logo-xbox"></ion-icon></a>
                <a href="#" style="--a:3;"><ion-icon name="logo-steam"></ion-icon></a>
            </ul>
            </div>
        </div>
            <div class="box" data-color="clr2">
                <div class="imgBx"><img src="mobile.jpg" width="200px" alt=""></div>
            <div class="glass">
                <h3><a style="text-decoration: none; color:white; font-weight:800;" href="produk.php?kategori=Mobile Game">MOBILE</a><br><span>Game</span></h3> 
            <ul>
                <a href="#" style="--a:1;"><ion-icon name="logo-playstation"></ion-icon></a>
                <a href="#" style="--a:2;"><ion-icon name="logo-xbox"></ion-icon></a>
                <a href="#" style="--a:3;"><ion-icon name="logo-steam"></ion-icon></a>
            </ul>
            </div>
        </div>
            <div class="box" data-color="clr3">
                <div class="imgBx"><img src="xbox.jpg" width="200px" alt=""></div>
            <div class="glass">
                <h3><a style="text-decoration: none; color:white; font-weight:800;" href="produk.php?kategori=Xbox Game Pass">XBOX</a><br><span>Game</span></h3> 
            <ul>
                <a href="#" style="--a:1;"><ion-icon name="logo-playstation"></ion-icon></a>
                <a href="#" style="--a:2;"><ion-icon name="logo-xbox"></ion-icon></a>
                <a href="#" style="--a:3;"><ion-icon name="logo-steam"></ion-icon></a>
            </ul>
            </div>
        </div>
            <div class="box" data-color="clr4">
                <div class="imgBx"><img src="ninetendo.jpg" width="200px" alt=""></div>
            <div class="glass">
                <h3><a style="text-decoration: none; color:white; font-weight:800;" href="produk.php?kategori=Nintendo Switch Online">NINE TENDO</a><br><span>game</span></h3> 
            <ul>
                <a href="#" style="--a:1;"><ion-icon name="logo-playstation"></ion-icon></a>
                <a href="#" style="--a:2;"><ion-icon name="logo-xbox"></ion-icon></a>
                <a href="#" style="--a:3;"><ion-icon name="logo-steam"></ion-icon></a>
            </ul>
            </div>
        </div>
    </div>

<!-- other produk -->
<h2>Produk Lainnya</h2>
<div class="container other">
    <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
<div class="box" data-color="clr1">
                <div class="imgBx"><img src="../image/<?php echo $data['foto']; ?>" width="200px" alt=""></div>
            <div class="glass">
                <h3>Rp <?php echo $data['harga']; ?><br><span><?php echo $data['nama']; ?></span></h3> 
            <ul>
                <a href="produk-detail.php?nama=<?php echo $data['detail']; ?>" style="text-decoration:none; color:white; font-size:1em;"><ion-icon name="logo-playstation"></ion-icon></a>
            </ul>
            </div>
        </div>
        <?php } ?>
        
</div>
<a href="produk.php" class="see-more-button">See More</a>




    <script>
        function stars(){
            let e =document.createElement('div');
            e.setAttribute('class', 'star');
            document.body.appendChild(e);
            e.style.left = Math.random() * + innerWidth + 'px';

            let size = Math.random() * 12;
            let duration = Math.random() * 3;

            e.style.fontSize = 12 + size+'px';
            e.style.animationDuration = 2 + duration+'s';


            setTimeout(function(){
                document.body.removeChild(e);
            },5000)
        }

        setInterval(function(){
            stars()
        },100)
    </script>
</body>
</html>