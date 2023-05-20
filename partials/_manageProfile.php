<?php
    include '_dbconnect.php';
    session_start();
    $id_user = $_SESSION['id_user'];
    
    
    if(isset($_POST["updateProfilePic"])){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $newfilename = "person-".$id_user.".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/Project Warteg/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                echo "<script>alert('success');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('image upload failed, please try again.');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Please select an image file to upload.");
                window.history.back(1);
            </script>';
        }
    }

    if(isset($_POST["updateProfileDetail"])){
        $nama_depan = $_POST["nama_depan"];
        $nama_belakang = $_POST["nama_belakang"];
        $email = $_POST["email"];
        $no_telp = $_POST["no_telp"];
        $password =$_POST["password"];

        $passSql = "SELECT * FROM users WHERE id='$id_user'"; 
        $passResult = mysqli_query($conn, $passSql);
        $passRow=mysqli_fetch_assoc($passResult);
        if (password_verify($password, $passRow['password'])){ 
            $sql = "UPDATE `users` SET `nama_depan` = '$nama_depan', `nama_belakang` = '$nama_belakang', `email` = '$email', `no_telp` = '$no_telp' WHERE `id` ='$id_user'";   
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>alert("Update successfully.");
                        window.history.back(1);
                    </script>';
            }else{
                echo '<script>alert("Update failed, please try again.");
                        window.history.back(1);
                    </script>';
            } 
        }
        else {
            echo '<script>alert("Password is incorrect.");
                        window.history.back(1);
                    </script>';
        }
    }
    
    if(isset($_POST["removeProfilePic"])){
        $filename = $_SERVER['DOCUMENT_ROOT']."/Project Warteg/img/person-".$id_user.".jpg";
        if (file_exists($filename)) {
            unlink($filename);
            echo "<script>alert('Removed');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('no photo available.');
                window.location=document.referrer;
            </script>";
        }
    }
    
?>

