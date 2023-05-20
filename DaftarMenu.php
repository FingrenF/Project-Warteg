<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/b67e368fa6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./daftarmenu.css">
    <title>Daftar Menu</title>
</head>
<body>
    
    <div class="hero">
        <nav>
        <img src="./Assets/logo-warteg.png" alt="Warteg Cibadak" class="logo">
        
        <!--Search bar-->
        <form onsubmit="event.preventDefault();" role="search">
            <label for="search">Search</label>
            <input id="search" type="search" placeholder="Search..." />
            <!-- <button type="submit">Go</button>     -->
        </form>

        <ul>
            <li><a href="DaftarMenu.php">Daftar Menu</a></li>
            <li><a href="#">Laporan</a></li>
            <li><a href="#">Bahan Baku</a></li>
        </ul>
        <img src="./Assets/akun.jpg" class="user-pic" onclick="toggleMenu()">

        <div class="sub-menu-warp" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="./Assets/akun.jpg">
                    <h3>User Info</h3>
                </div>
                <hr>

                <a href="PengaturanAdmin.php" class="sub-menu-link">
                    <img src="./Assets/akun.jpg">
                    <p>Pengaturan Akun</p>
                    <span></span>
                </a>
                <a href="PengaturanAdmin.php" class="sub-menu-link">
                    <img src="./Assets/Password.jpg">
                    <p>Ganti Password</p>
                    <span></span>
                </a>
                <a href="index.php" class="sub-menu-link">
                    <img src="./Assets/logout.jpg">
                    <p>Keluar</p>
                    <span></span>
                </a>
            </div>
        </div>
        </nav>
    </div>

    <div class="main">
        <div class="content" id='foodList'></div>
        <div class="sidebar" id="cartList"></div>
    </div>
    <script src="./script.js"></script>
</body>
</html>