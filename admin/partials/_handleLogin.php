<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    $sql = "Select * from users where username='$username'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $tipe_user = $row['tipe_user'];
        if($tipe_user == 1) {
            $id_user = $row['id'];
            if (password_verify($password, $row['password'])){ 
                session_start();
                $_SESSION['adminloggedin'] = true;
                $_SESSION['adminusername'] = $username;
                $_SESSION['adminid_user'] = $id_user;
                header("location: /Project Warteg/admin/index.php?loginsuccess=true");
                exit();
            } 
            else{
                header("location: /Project Warteg/admin/login.php?loginsuccess=false");
            }
        }
        else {
            header("location: /Project Warteg/admin/login.php?loginsuccess=false");
        }
    } 
    else{
        header("location: /Project Warteg/admin/login.php?loginsuccess=false");
    }
}    
?>

