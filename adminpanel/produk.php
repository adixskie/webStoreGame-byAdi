<?php
    require "session.php";
    require "../koneksi.php";

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
    $jumlahProduk = mysqli_num_rows($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

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
    <title>Produk</title>
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

    <link rel="stylesheet" href="../produk.css">
    
</head>
<body>
    <?php require "navbar.php"; ?>
    
    <div class="container">
        <div class="home-page">
            <a href="../adminpanel"><p>Home <i class="ri-home-office-fill"></i></p></a> 
        </div>

        <div class="home-kategori">
            <p>/  Produk</p>
        </div>       
    </div>
    
    <div class="my-5 c0l-12 col-md-6">
        <h3>Tambah Produk</h3>

        <form action="" method="post" enctype="multipart/form-data">

            <div>
                <label for="nama">Nama</label>
                <input type="text" id="nama" class="form-control" name="nama" autocomplete="off" required>
            </div>

                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">select one</option>
                    <?php
                        while($data=mysqli_fetch_array($queryKategori)){
                    ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                    <?php
                        }
                    ?>
                </select>
                
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>

                <div style="margin-top: 10px;">
                    <label for="foto">Foto</label>
                    <input type="file"  name="foto" id="foto" class="form-control">
                </div>

                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" class="form-control" id="detail" cols="10" rows="1"></textarea>
                </div>

                <div>
                    <label for="ketersediaan_stok">Ketersediaan Stok</label>
                    <select name="ketersediaan_stok" class="form-control" id="ketersediaan_stok">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>

                <div class="containerz">
                    <a href="#">
                    <button type="submit" name="simpan" id="simpan">simpan</button>
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
                                if($nama_file!=''){
                                    if($image_size > 500000){
                        ?>
                                <div class="alert alert-dark" style="width: 45%;" role="alert">
                                    File tidak boleh lebih dari 500kb
                                </div>
                        <?php
                                    }
                                    else{
                                        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif'){
                        ?>
                                    <div class="alert alert-dark" style="width: 40%;" role="alert">
                                        File wajib jpg atau png atau gif
                                    </div>
                        <?php
                                        }
                                        else{
                                            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                                        }
                                    }
                                }

                                // query insert to product table
                                $queryTambah = mysqli_query($con, "INSERT INTO produk (kategori_id, nama, harga, foto, detail, ketersediaan_stok) VALUES ('$kategori', '$nama', '$harga', '$new_name', '$detail', '$ketersediaan_stok')");

                                if($queryTambah){
                        ?>
                                <div class="alert alert-success" style="margin-left: 43%;" role="alert">
                                    Succes
                                </div>
                                <meta http-equiv="refresh" content="2; url=produk.php">
                        <?php
                                }
                                else{
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    ?>

    </div>

    <div class="mt-2" style="margin-left: 130px;">
        <h2>List Produk</h2>
    
        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Ketersediaan stok</th>
                    <th>Action</th>
                </thead>
            

            <tbody>
                <?php 
                    if($jumlahProduk==0){
                ?>
                    <tr>
                        <td colspan="6" class="text-center">KAGAK ADA CUYY!!!</td>
                    </tr>
                <?php
                    }
                    else{
                        $jumlah = 1;
                        while($data=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['nama_kategori']; ?></td>
                            <td><?php echo $data['harga']; ?></td>
                            <td><?php echo $data['ketersediaan_stok']; ?></td>
                            <td>
                                <a href="produk-detail.php?q=<?php echo $data['id'] ?>" 
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