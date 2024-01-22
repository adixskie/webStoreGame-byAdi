<?php
    require "session.php";
    require "../koneksi.php";


    $id = $_GET['q'];

    $query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
    $data = mysqli_fetch_array($query);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
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

    <link rel="stylesheet" href="../kategori-detail.css">
</head>

<body>
    <div class="header">
    <nav>
        <a href="kategori.php"><i class="ri-arrow-go-back-line"></i>Back</a>
        <h1><a href="#" style="cursor: default; color: #e00cbd">Razor</a><a href="#" style="cursor: default;">Store</a></h1>
        <div id="marker"></div>
    </nav>
    </div>

    <div class="container">
        <div class="detail">
            <h2>Detail <a href="#" style="text-decoration: none;">Kategori</a></h2>
        </div>

    <div class="col-12 col-md-6 ">
        <form method="post" action="">
            <div>
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" id="kategori" class="form-control" value="<?php 
                echo $data['nama']; ?>">
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
                <button type="submit" class="btn btn-danger" name="deleteBtn">delete</button>
            </div>
        </form>

    <?php if(isset($_POST['editBtn'])){
        $kategori = htmlspecialchars($_POST['kategori']);

        if($data['nama']==$kategori){
            ?>
            <meta http-equiv="refresh" content="0; url=kategori.php">
            <?php
        }
        else{
            $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
            $jumlahData = mysqli_num_rows($query);

            if($jumlahData > 0){
                echo '<script type ="text/JavaScript">';  
                echo 'alert("UDAH ADA CUYY!!")';  
                echo '</script>'; 
            }else{
                $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id=$id");

                if($querySimpan){
                    ?>
                        <div class="alert alert-success" style="margin-left: 86%;" role="alert">
                            Succes
                        </div>
                        <meta http-equiv="refresh" content="0; url=kategori.php"/>
                    <?php
                }
                else{
                    echo mysqli_error($con);
                }
            }
        }
    } 

    if(isset($_POST['deleteBtn'])){
        $queryCheck = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$id'");
        $dtaaCount = mysqli_num_rows($queryCheck);
        
        if($dtaaCount>0){
        ?>
            <div class="alert alert-warning" style="margin-left: 0; text-align :center; margin-top:20px;" role="alert">
                Tidak dapat di hapus karna sudah ada produk!!
            </div>
        <?php
        die();
        }
        
        $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");

        if($queryDelete){
        ?>
            <div class="alert alert-success" style="margin-left: 86%;" role="alert">
                Deleted
            </div>
            <meta http-equiv="refresh" content="2; url=kategori.php"/>
        <?php
        }else{
            echo mysqli_error($con);
        }
    }
    ?>

    </div>
    </div>
    
    <script src="../index.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>