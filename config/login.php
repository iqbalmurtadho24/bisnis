<?php
require_once('config.php');
$username = $_POST['username'];
$password = $_POST['password'];

$login = query("SELECT * FROM user where username ='$username' and password = '$password'");
$row = mysqli_fetch_array($login);
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    if($row['level']=='user' and $row['status']=='1'){
        session_start();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['level'] = $row['level'];
        header('location: ../admin/index.php');
        
    }else {
        header('location: logout.php');
    }
}else{
    header('location: logout.php');
}
?>