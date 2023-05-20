<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/b67e368fa6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./pemesanan.css">
    <title>Pemesanan</title>
</head>
<body>
    <div class="hero">
        <nav>
        <img src="./Gambar/logo-warteg.png" alt="Warteg Cibadak" class="logo">
        
        <!--Search bar-->
        <form onsubmit="event.preventDefault();" role="search">
            <label for="search">Search</label>
            <input id="search" type="search" placeholder="Search..." />
            <!-- <button type="submit">Go</button>     -->
        </form>

        <ul>
            <li><a href="./Pemesanan.php">Menu</a></li>
            <li><a href="./Pemesanan.php">Promo</a></li>
            <li><a href="./Pemesanan.php">Pesanan</a></li>
        </ul>
        <img src="./Gambar/akun.jpg" class="user-pic" onclick="toggleMenu()">

        <div class="sub-menu-warp" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="./Gambar/akun.jpg">
                    <h3>User Info</h3>
                </div>
                <hr>

                <a href="PengaturanAkun.php" class="sub-menu-link">
                    <img src="./Gambar/akun.jpg">
                    <p>Pengaturan Akun</p>
                    <span></span>
                </a>
                <a href="PengaturanAkun.php" class="sub-menu-link">
                    <img src="./Gambar/Password.jpg">
                    <p>Ganti Password</p>
                    <span></span>
                </a>
                <a href="PengaturanAkun.php" class="sub-menu-link">
                    <img src="./Gambar/Rating.jpg">
                    <p>Rating & Ulasan</p>
                    <span></span>
                </a>
                <a href="index.php" class="sub-menu-link">
                    <img src="./Gambar/logout.jpg">
                    <p>Keluar</p>
                    <span></span>
                </a>
            </div>
        </div>
        </nav>
    </div>

    <img src="./Gambar/promo.jpg" class="promo">

    <div class="main">
        <div class="content" id='foodList'></div>
        <div class="sidebar" id="cartList"></div>
    </div>
    <script type="text/javascript" src="./script.js"></script>
</body>
</html>