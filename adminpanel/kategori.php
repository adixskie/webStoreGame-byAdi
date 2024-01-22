<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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

    <link rel="stylesheet" href="../kategori.css">
    <style>
        body{
            background-image: url(../asset/ai.jpg);
            background-position: center;
            background-size: cover;
            
        }
    
        header{
    position: absolute;
    top: 0;
    width: 100%;
    height: 100px;
    padding: 0 80px;
    z-index: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}
header .logo{
    color: #fff;
    font-size: 2em;
    font-weight: 700;
    text-decoration: none;
}
header .logo span{
    color: #ff2d75;
}
header nav{
    display: flex;
    gap: 25px;
}
header nav a{
    color: #fff;
    font-size: 1.1em;
    text-decoration: none;
}
header nav a.active,
header nav a:hover
{
    color: #4fc3dc;
}

    </style>
</head>
<body>
<header>
        <a href="#" class="logo"><span>Razor</span>Store</a>
        <nav>
        <a href=""class="active">Home</a>
        <a href="kategori.php">Kategori</a>
        <a href="produk.php">Produk</a>
        <a href="about.php">About</a>
        <nav>
        </nav>
    </header>    

    <div class="container">
        <div class="home-page">
            <a href="../adminpanel"><p>Home <i class="ri-home-office-fill"></i></p></a> 
        </div>

        <div class="home-kategori">
            <p>/  Kategori</p>
        </div>       
    </div>

    <div class="my-5 c0l-12 col-md-6">
        <h3 style="color: #fff;">Tambah Kategori</h3>

        <form action="" method="post">
            <div>
                <form action="" method="post">
                    <div class="input-boxs animation" style="--i:1 --j:22;">
                        <input type="text" name="kategori" placeholder="masukan nama kategori" id="kategori" required>
                        <label for="kategori"></label>
                
                    </div>
            </div>

            <div class="containerz">
                <a href="#">
                    <button type="submit" name="simpan_kategori">tambah</button>
                </a>
            </div>
            
        </form>

        <?php 
            if(isset($_POST['simpan_kategori'])){
                $kategori = htmlspecialchars($_POST['kategori']);

                $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                $jumlahKategoriBaru = mysqli_num_rows($queryExist);

                if($jumlahKategoriBaru > 0){
                    ?>
                        <div class="alert alert-dark" style="width: 40%;" role="alert">
                            Kategori Sudah Ada!!
                        </div>
                    <?php
                }
                else{
                    $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                    
                    if($querySimpan){
                        ?>
                            <div class="alert alert-success" style="margin-left: 86%;" role="alert">
                                Succes
                            </div>
                            <meta http-equiv="refresh" content="2; url=kategori.php">
                        <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }
        ?>
    </div>

                                                <!-- table -->


    <div class="mt-2" style="margin-left: 130px;">
        <h2>List Kategori</h2>

        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    <?php 
                        if($jumlahKategori==0){
                    ?>
                            <tr>
                                <td colspan="3" class="text-center">KAGAK ADA ANJAYYY !!!</td>
                            </tr>
                    <?php
                        }
                        else{
                            $jumlah = 1;
                            while($data=mysqli_fetch_array($queryKategori)){
                    ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td>
                                        <a href="kategori-detail.php?q=<?php echo $data['id'] ?>" 
                                        class="btn btn-info"><i class="ri-search-line"></i></a>
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
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>