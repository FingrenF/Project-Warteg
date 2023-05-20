<?php 
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $id_user = $_SESSION['id_user'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $id_user = 0;
}

$sql = "SELECT * FROM `situs`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$nama_situs = $row['nama_situs'];

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
      <a class="navbar-brand" href="index.php">'.$nama_situs.'</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kategori
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
            $sql = "SELECT nama_kategori, kategori_id FROM `kategori`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              echo '<a class="dropdown-item" href="viewMenuList.php?catid=' .$row['kategori_id']. '">' .$row['nama_kategori']. '</a>';
            }
            echo '</div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewOrder.php">Pesanan Anda</a>
          </li>
          
        </ul>
        <form method="get" action="/Project Warteg/search.php" class="form-inline my-2 my-lg-0 mx-3">
          <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search" required style="color: black;">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: black; border-color: white;">
            Go  
          </button>
        </form>

        <style>
        .btn-outline-success:hover {
        color: black;
        background-color: white;
        border-color: black;
      }
      </style>';

        $countsql = "SELECT SUM(`jumlah`) FROM `keranjang` WHERE `id_user`=$id_user"; 
        $countresult = mysqli_query($conn, $countsql);
        $countrow = mysqli_fetch_assoc($countresult);      
        $count = $countrow['SUM(`jumlah`)'];
        if(!$count) {
          $count = 0;
        }
        echo '<a href="viewCart.php"><button type="button" class="btn btn-secondary mx-2" title="MyCart" style="background-color: yellow; color: black;">
          <svg xmlns="img/cart.svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>  
          <i class="bi bi-cart">Cart(' .$count. ')</i>
        </button></a>';

        if($loggedin){
          echo '<ul class="navbar-nav mr-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> Welcome ' .$username. '</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="partials/_logout.php">Logout</a>
              </div>
            </li>
          </ul>
          <div class="text-center image-size-small position-relative">
            <a href="viewProfile.php"><img src="img/person-' .$id_user. '.jpg" class="rounded-circle" onError="this.src = \'img/profilePic.jpg\'" style="width:40px; height:40px"></a>
          </div>';
        }
        else {
          echo '
          <button type="button" class="btn btn-success mx-2"  data-toggle="modal" data-target="#loginModal" style="background-color: white; color: black;">Login</button>
          <button type="button" class="btn btn-success mx-2"  data-toggle="modal" data-target="#signupModal" style="background-color: white; color: black;">Daftar</button>';
        }
            
  echo '</div>
    </nav>';

    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> Anda bisa login sekarang
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> ' .$_GET['error']. '
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success</strong> Login
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> Data tidak sesuai
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
?>



