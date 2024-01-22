<?php
    require "session.php";
    require "../koneksi.php";


    $id = $_GET['q'];

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
    $data = mysqli_fetch_array($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Detail</title>
    <!-- link bootstrapp -->
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

    <link rel="stylesheet" href="../produk-detail.css">
</head>
<body>
    <div class="header">
        <nav>
            <a href="produk.php"><i class="ri-arrow-go-back-line"></i>Back</a>
            <h1><a href="#" style="cursor: default; color: #e00cbd">Razor</a><a href="#" style="cursor: default;">Store</a></>
            <div id="marker"></div>
        </nav>
    </div>

    <div class="judul">
        <div class="detail">
        <h2>Detail <a href="#" style="text-decoration: none;">Produk</a></h2>
    </div>
    
    <form action="" method="post" enctype="multipart/form-data">
    <div style="margin: 10px;">
        <label for="nama">Nama</label>
        <input type="text" id="nama" value="<?php echo $data['nama']; ?>" class="form-control" name="nama" autocomplete="off" required>
    </div>

    <div style="margin: 10px;">
    <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori" class="form-control" required>
            <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>
                <?php
                while($dataKategori=mysqli_fetch_array($queryKategori)){
                ?>
            <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                <?php
                }
                ?>
        </select>
    </div>

    <div style="margin: 10px;">
        <label for="ketersediaan_stok">Ketersediaan</label>
        <select name="ketersediaan_stok" class="form-control" id="ketersediaan_stok">
        <option value="<?php echo $data['ketersediaan_stok']; ?>"><?php echo $data['ketersediaan_stok']; ?></option>
        <?php 
            if($data['ketersediaan_stok']=='tersedia'){
                ?>
                    <option value="habis">habis</option>
                <?php
            }else{
                ?>
                    <option value="tersedia">tersedia</option>
                <?php
            }
        ?>
        </select>
    </div>

    <div style="margin: 10px; ">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" value="<?php echo $data['harga']; ?>" name="harga" required>
    </div>
    
    <div style="margin: 10px;">
        <label for="detail">Detail</label>
        <textarea style=" margin-right:300px;" name="detail" class="form-control" id="detail" cols="10" rows="6">
        <?php echo $data['detail']; ?>
        </textarea>
    </div>

    <div style="margin: 10px; ">
        <label for="foto">Foto</label>
        <input type="file"  name="foto" id="foto" class="form-control">
        
    </div>


    <div class="wrapper-foto" style="margin:10px;">
        <label for="curentFoto"><div style="color: #e00cbd; font-weight:800;"><a href="#" style="text-decoration: none;">Foto</a></div> <a href="#" style="text-decoration: none; color:#fff; font-weight:600;">Sekarang</a></label>
        <img width="100px" src="../image/<?php echo $data['foto']; ?>" alt="">
    </div>

    
        <div style="margin: 10px; margin-top:20px;" class="containerz">
            <a href="#">
            <button type="submit" name="simpan" id="simpan">simpan</button>
            </a>
        </div>
        <div style="margin: 10px; margin-top:20px;" class="containerz">
            <a href="#">
            <button type="submit" name="hapus" id="hapus">delete</button>
            </a>
        </div>
    </form>

    <?php 
        if(isset($_POST['simpan'])){
        $nama = htmlspecialchars($_POST['nama']);
        $kategori = htmlspecialchars($_POST['kategori']);
        $harga = htmlspecialchars($_POST['harga']);
        $detail = htmlspecialchars($_POST['detail']);
        $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);
            
        $target_dir = "../image/";
        $nama_file = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $nama_file;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $image_size = $_FILES["foto"]["size"];
        $random_name = generateRandomString(20);
        $new_name = $random_name . "." . $imageFileType;

        if($nama=='' || $kategori=='' || $harga==''){
            ?>
                <div class="alert alert-dark" style="width: 45%; margin-left:43%" role="alert">
                    Nama Kategori dan Harga Wajib di isi!!
                </div>
            <?php
        }
        else{
            $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori', nama='$nama', harga='$harga', detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id=$id");
        
            if($nama_file!=''){
                if($image_size > 500000){
                    ?>
                        <div class="alert alert-dark" style="width: 45%; margin-left:43%" role="alert">
                            Nama Kategori dan Harga Wajib di isi!!
                        </div>
                    <?php
                }else{
                    if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif'){
                    ?>
                        <div class="alert alert-dark" style="width: 40%;" role="alert">
                            File wajib jpg atau png atau gif
                        </div>
                    <?php
                    }else{
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                        $queryUpdate = mysqli_query($con, "UPDATE produk SET foto='$new_name' WHERE id='$id'");

                        if($queryUpdate){
                        ?>
                            <div class="alert alert-success" style="margin-left: 43%;" role="alert">
                                Succes
                            </div>
                            <meta http-equiv="refresh" content="0; url=produk.php">
                        <?php
                        }
                        else{
                            echo mysqli_error($con);
                        }
                    }
                }
            }
        }
    }

    if(isset($_POST['hapus'])){
        $queryHapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");

        if($queryHapus){
            ?>
                <div class="alert alert-success" style="margin-left: 43%;" role="alert">
                    Deleted
                </div>
                <meta http-equiv="refresh" content="0; url=produk.php">
            <?php
        }
    }
    ?>

    <script src="../index.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>