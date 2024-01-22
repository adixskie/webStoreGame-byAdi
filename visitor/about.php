<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Source Code Of Animated Footer Design</title>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="about.css">
    <style>
    .main{
        background-image: linear-gradient(rgba(12,3,51,0.3),rgba(12,3,51,0.3)), url(background.jpg);
    }
    </style>
</head>
<body>
     <div class="main">
         <nav>
             <img src="../asset/ee1-removebg-preview.png" alt="logo" class="logo">
             <ul>
                 <li><a href="index.php">Home</a></li>
                 <li><a href="#">About</a></li>
                 <li><a href="produk.php">Produk</a></li>
                 
             </ul>
         </nav>
         <div class="content">
             <h1 class="anim">About Us</h1>
             <p class="anim">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis amet ipsum aut et odio facilis tenetur quas delectus dolorum deleniti. <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, repudiandae.</p>
             <div class="links anim">
                <button><span></span>Free Images</button>
                <button><span></span>Image API</button>
             </div>
         </div>
     </div>
     <footer>
        <div class="row">
            <div class="col">
                <img src="../asset/ee1-removebg-preview.png" class="footer_logo">
                <p class="footer_about">RAZOR STORE dolor sit amet consectetur adipisicing elit. Inventore harum molestias nesciunt, 
                    doloremque magni aspernatur iste blanditiis, fugiat quaerat accusamus ut, vero tempore. 
                    Fugiat, illum!
                </p>
            </div>
            <div class="col">
                <h3>Office <div class="bottom_line"><span></span></div></h3>
                <p>2841 Romines Mill Road</p>
                <p>Plano</p>
                <p>unsera jaya jaya jaya</p>
                <p class="footer_email">adisaphoetra27@gmail.com</p>
                <h4>081908323126</h4>
            </div>
            <div class="col">
                <h3>Links <div class="bottom_line"><span></span></div></h3>
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="">ABOUT</a></li>
                    <li><a href="">SERVICE</a></li>
                    <li><a href="">CONTACT US</a></li>
                </ul>
            </div>
            <div class="col">
                <h3>Newsletter <div class="bottom_line"><span></span></div></h3>
                <form>
                    <ion-icon class="icon" name="mail"></ion-icon>
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit"><ion-icon class="icon_right" name="arrow-round-forward"></ion-icon></button>
                </form>
                <div class="social_icons">
                    <a href="facebook.com"><ion-icon class="social_icon" name="logo-facebook"></ion-icon></a>
                    <ion-icon class="social_icon" name="logo-whatsapp"></ion-icon>
                    <ion-icon class="social_icon" name="logo-twitter"></ion-icon>
                    <ion-icon class="social_icon" name="logo-instagram"></ion-icon>
                </div>
            </div>
        </div>
        <hr>
        <p class="copyright">copyright Ⓒ 2024 - kelompok</p>
     </footer> 
</body>   
</html>