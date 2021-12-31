<?php
require_once('../config/config.php');
function exist_array($data)
{
    if ($data) {
        return $data;
    } else {
        return [];
    }
}
if (isset($_GET['user']) !==  false) {

    if ($_GET['user'] === "1") {
        $query = query('select * from user ');
        // var_dump($query) or die;
        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = ' <button class="btn btn-warning" onclick="edit(' . $row['id_user'] . ')" title="Edit user">
            <i class="far fa-edit"></i>
               </button> ';
            if ($row['status'] == 1) {
                $row['status'] = 'AKTIF';
            } else {
                $row['status'] = 'NONAKTIF';
            }
            array_push($data['data'], [
                'btn' => $modal, 'username' => exist_array($row['username']),
                'level' => exist_array($row['level']),  'status' => exist_array($row['status'])
            ]);
        }


        echo json_encode($data);
    }
} elseif (isset($_GET['tambah_user']) !==  false && $_GET['tambah_user'] === "1") {
    if (isset($_POST['username']) &&  !empty($_POST['username'])) {


        $nama = $_POST['username'];


        $sql = "insert into  user (id_user,username,password,status,level) values (null,'$nama','{$_POST['password']}}',1,'{$_POST['level']}')  ";
        //   var_dump($sql) or die;
        $query = update($sql);


        if ($query != 0) {
            header("location:user.php?success=3");
        } else {
            header("location:user.php?success=4");
        }
    } else {
        header("location:user.php?success=2");
    }
} elseif (isset($_GET['edit_user']) !==  false && $_GET['edit_user'] == "1") {
    if (isset($_POST['username'], $_POST['id_user'], $_POST['status']) &&  !empty($_POST['username']) || !empty($_POST['status'])) {
        $kd = $_POST['id_user'];
        $nama = $_POST['username'];
        $status = $_POST['status'];
        $password = $_POST['password'];
        $level = $_POST['level'];


        $sql = "update user set   username= '$nama', password = '$password' ,status= $status,level='$level'  where id_user = $kd";
        // var_dump($sql) or die;
        $query = update($sql);


        if ($query != 0) {
            header("location:user.php?success=1");
        } else {
            header("location:user.php?success=4");
        }
    } else {
        header("location:user.php?success=2");
    }
} elseif (isset($_GET['edit_user'], $_GET['kd']) !== false && !empty($_GET['kd']) && $_GET['edit_user'] == 'data') {
    $query = query('select * from user where id_user= "' . $_GET['kd'] . '"');

    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
    // var_dump($data) or die;
} else {
    header("location:index.php");
}
