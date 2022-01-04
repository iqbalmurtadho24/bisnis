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
//show data
if (isset($_GET['user']) !==  false) {

    if ($_GET['user'] === "1") {
        $query = query('select * from  user');
        // var_dump($query) or die;
        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $a = $row['status'] == 1 ? 'AKTIF' : 'NONAKTIF';
            $modal = ' <button class="btn btn-warning" onclick="edit(' . $row['id_user'] . ')" title="Edit user">
            <i class="far fa-edit"></i>
            </button> ';
            array_push($data['data'], [
                'btn' => $modal,
                'username' => exist_array($row['username']),
                'password' => exist_array($row['password']),
                'status' => $a
            ]);
        }


        echo json_encode($data);
    }
} elseif (isset($_GET['akses']) !==  false) {

    if ($_GET['akses'] === "1") {
        $query = query('select * from akses a inner join sdm s on a.id_user=s.id_user');
        // var_dump($query) or die;
        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = ' <button class="btn btn-warning" onclick="edit(' . $row['kd_akses'] . ')" title="Edit user">
            <i class="far fa-edit"></i>
            </button> ';
            array_push($data['data'], [
                'btn' => $modal,
                'nama' => exist_array($row['nama']),
                'akses' => exist_array($row['akses']),
                'kontak' => exist_array($row['kontak_akses']),
                'status' => exist_array($row['status']),
                'update' => exist_array($row['waktu'])
            ]);
        }


        echo json_encode($data);
    }
} elseif (isset($_GET['gaji']) !==  false) {

    if ($_GET['gaji'] === "1") {
        $query = query('select * from gaji a inner join sdm s on a.id_user=s.id_user');
        // var_dump($query) or die;
        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = ' <button class="btn btn-warning" onclick="edit(' . $row['kd_gaji'] . ')" title="Edit user">
            <i class="far fa-edit"></i>
            </button> ';
            array_push($data['data'], [
                'btn' => $modal,
                'nama' => exist_array($row['nama']),
                'akses' => exist_array($row['akses']),
                'gaji' => exist_array($row['gaji']),
                'status' => exist_array($row['status']),
                'update' => exist_array($row['waktu'])
            ]);
        }


        echo json_encode($data);
    }
} elseif (isset($_GET['pegawai']) !==  false) {

    if ($_GET['pegawai'] === "1") {
        $query = query('select * from sdm ');

        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = ' <button class="btn btn-warning" onclick="edit(' . $row['id_user'] . ')" title="Edit Pegawai">
            <i class="far fa-edit"></i>
            </button> ';

            array_push($data['data'], [
                'btn' => exist_array($modal),
                'nama' => exist_array($row['nama']),
                'kontak' => exist_array($row['kontak']),
                'email' => exist_array($row['email']),
                'bank' => exist_array($row['bank']),
                'rekening' => exist_array($row['rekening'])

            ]);
        }


        echo json_encode($data);
    }
} elseif (isset($_GET['kategori']) !==  false) {

    if ($_GET['kategori'] === "1") {
        $query = query('select * from kategori_produk ');

        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = " <button class='btn btn-warning' onclick=edit('".$row['kd_kategori']."') title='Edit Pegawai'>
            <i class='far fa-edit'></i>  </button> ";

            array_push($data['data'], [
                'btn' => exist_array($modal),

                'kd' => exist_array($row['kd_kategori']),
                'kategori' => exist_array($row['kategori'])

            ]);
        }


        echo json_encode($data);
    }
}elseif (isset($_GET['jenis']) !==  false) {

    if ($_GET['jenis'] === "1") {
        $query = query('select * from jenis_produk p inner join kategori_produk k on p.kd_kategori=k.kd_kategori ');

        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = " <button class='btn btn-warning' onclick=edit('".$row['kd_jenis']."') title='Edit Pegawai'>
            <i class='far fa-edit'></i>  </button> ";

            array_push($data['data'], [
                'btn' => exist_array($modal),

                'kd' => exist_array($row['kd_jenis']),
                'jenis' => exist_array($row['jenis']),
                'kategori' => exist_array($row['kategori'])

            ]);
        }


        echo json_encode($data);
    }
}

//add
elseif (isset($_GET['tambah_user']) !==  false && $_GET['tambah_user'] === "1") {
    if (isset($_POST['username']) &&  !empty($_POST['username'])) {


        $nama = $_POST['username'];
        $password = $_POST['password'];

        $sql = "insert into  user (id_user,username,password,status,level) values (null,'$nama','$password',1,'user')  ";

        $query = query($sql);
        // var_dump($query) or die;

        if ($query != 0) {
            header("location:user.php?success=3");
        } else {
            header("location:user.php?success=4");
        }
    } else {
        header("location:user.php?success=2");
    }
} elseif (isset($_GET['tambah_akses']) !==  false && $_GET['tambah_akses'] === "1") {
    if (isset($_POST['id_user']) &&  !empty($_POST['id_user'])) {

        $id_user = $_POST['id_user'];
        $akses = $_POST['akses'];
        $kontak = $_POST['kontak_akses'];
        $waktu = date('Y-m-d H:i:s');

        $sql = "insert into  akses (kd_akses,id_user,akses,status,waktu,kontak_akses) values (null,$id_user,'$akses',1,'$waktu','$kontak')  ";
        $query = update($sql);
        // var_dump($query) or die;

        if ($query != 0) {
            header("location:akses.php?success=3");
        } else {
            header("location:akses.php?success=4");
        }
    } else {
        header("location:user.php?success=2");
    }
} elseif (isset($_GET['tambah_gaji']) !==  false && $_GET['tambah_gaji'] === "1") {
    if (isset($_POST['id_user']) &&  !empty($_POST['id_user'])) {

        $id_user = $_POST['id_user'];
        $akses = $_POST['akses'];
        $gaji = $_POST['gaji'];
        $waktu = date('Y-m-d H:i:s');

        $sql = "insert into  gaji (kd_gaji,id_user,akses,status,waktu,gaji) values (null,$id_user,'$akses',1,'$waktu','$gaji')  ";
        $query = query($sql);
        // var_dump($query) or die;

        if ($query != 0) {
            header("location:gaji.php?success=3");
        } else {
            header("location:gaji.php?success=4");
        }
    } else {
        header("location:gaji.php?success=2");
    }
} elseif (isset($_GET['tambah_pegawai']) !==  false && $_GET['tambah_pegawai'] === "1") {
    if (isset($_POST['nama']) &&  !empty($_POST['nama'])) {
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $nik = $_POST['nik'];
        $jalan = $_POST['jalan'];
        $rt_rw = $_POST['rt_rw'];
        $desa = $_POST['desa'];
        $kecamatan = $_POST['kecamatan'];
        $kota_kabupaten = $_POST['kota_kabupaten'];
        $provinsi = $_POST['provinsi'];
        $kontak = $_POST['kontak'];
        $email = $_POST['email'];
        $bank = $_POST['bank'];
        $nama_rekening = $_POST['nama_rekening'];
        $rekening = $_POST['rekening'];
        $sql = "insert into  sdm   values (null,'$nama','$tanggal_lahir',$nik,'$jalan',$rt_rw,'$desa','$kecamatan','$kota_kabupaten','$provinsi',$kontak, '$email','$bank','$nama_rekening','$rekening')  ";
        $query = update($sql);
        //   var_dump($query) or die;


        if ($query != 0) {
            header("location:pegawai.php?success=3");
        } else {
            header("location:pegawai.php?success=4");
        }
    } else {
        header("location:pegawai.php?success=2");
    }
} elseif (isset($_GET['tambah_kategori']) !==  false && $_GET['tambah_kategori'] === "1") {
    if (isset($_POST['kd'],$_POST['kategori']) &&  !empty($_POST['kd']) &&  !empty($_POST['kd'])) {
      
        $kd = $_POST['kd'];
        $kategori = $_POST['kategori'];
        $sql = "insert into  kategori_produk  values ('$kd','$kategori')  ";
        $query = query($sql);

        if ($query != 0) {
            header("location:kategori.php?success=3");
        } else {
            header("location:kategori.php?success=4");
        }
    } else {
        header("location:kategori.php?success=2");
    }
} elseif (isset($_GET['tambah_jenis']) !==  false && $_GET['tambah_jenis'] === "1") {
    if (isset($_POST['kd'],$_POST['jenis']) &&  !empty($_POST['kd']) &&  !empty($_POST['kd'])) {
      
        $kd = $_POST['kd'];
        $jenis = $_POST['jenis'];
        $kategori = $_POST['kategori'];
        $sql = "insert into  jenis_produk  values ('$kd','$jenis','$kategori')  ";
        $query = query($sql);
        var_dump($query) or die;
        if ($query != 0) {
            header("location:jenis.php?success=3");
        } else {
            header("location:jenis.php?success=4");
        }
    } else {
        header("location:jenis.php?success=2");
    }
}

//update
elseif (isset($_GET['edit_user']) !==  false && $_GET['edit_user'] == "1") {
    if (isset($_POST['username'], $_POST['id_user'], $_POST['status']) &&  !empty($_POST['username']) || !empty($_POST['status'])) {
        $kd = $_POST['id_user'];
        $nama = $_POST['username'];
        $status = $_POST['status'];
        $password = $_POST['password'];
        $level = $_POST['level'];


        $sql = "update user set   username= '$nama', password = '$password' ,status= $status,level='$level'  where id_user = $kd";
        $query = query($sql);



        if ($query != 0) {
            header("location:user.php?success=1");
        } else {
            header("location:user.php?success=4");
        }
    } else {
        header("location:user.php?success=2");
    }
} elseif (isset($_GET['edit_pegawai']) !==  false && $_GET['edit_pegawai'] == "1") {
    if (isset($_POST['nama'], $_POST['id_user']) &&  !empty($_POST['nama'])) {
        $kd = $_POST['id_user'];
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $nik = $_POST['nik'];
        $jalan = $_POST['jalan'];
        $rt_rw = $_POST['rt_rw'];
        $desa = $_POST['desa'];
        $kecamatan = $_POST['kecamatan'];
        $kota_kabupaten = $_POST['kota_kabupaten'];
        $provinsi = $_POST['provinsi'];
        $kontak = $_POST['kontak'];
        $email = $_POST['email'];
        $bank = $_POST['bank'];
        $nama_rekening = $_POST['nama_rekening'];
        $rekening = $_POST['rekening'];



        $sql = "update sdm set   nama='$nama',tanggal_lahir='$tanggal_lahir',nik=$nik,jalan='$jalan',rt_rw=$rt_rw,desa='$desa',kecamatan='$kecamatan',kota_kabupaten='$kota_kabupaten',provinsi='$provinsi',kontak=$kontak, email='$email',bank= '$bank',nama_rekening='$nama_rekening',rekening ='$rekening'  where id_user = $kd";
        $query = update($sql);


        if ($query != 0) {
            header("location:pegawai.php?success=1");
        } else {
            header("location:pegawai.php?success=4");
        }
    } else {
        header("location:pegawai.php?success=2");
    }
} elseif (isset($_GET['edit_akses']) !==  false && $_GET['edit_akses'] == "1") {
    if (isset($_POST['kd_akses'], $_POST['kontak_akses']) &&  !empty($_POST['kd_akses'])) {
        $kd = $_POST['kd_akses'];
        $akses = $_POST['akses'];
        $status = $_POST['status'];
        $kontak_akses = $_POST['kontak_akses'];
        $waktu = date('Y-m-d  H:i:s');

        $sql = "update akses set akses='$akses' , status =$status,kontak_akses = $kontak_akses, waktu = '$waktu'  where kd_akses = $kd";
        $query = update($sql);


        if ($query != 0) {
            header("location:akses.php?success=1");
        } else {
            header("location:akses.php?success=4");
        }
    } else {
        header("location:akses.php?success=2");
    }
} elseif (isset($_GET['edit_kategori']) !==  false && $_GET['edit_kategori'] == "1") {
    if (isset($_POST['kd'], $_POST['kategori']) &&  !empty($_POST['kd'])) {
        $kd = $_POST['kd'];
        $kategori = $_POST['kategori'];
   
        $sql = "update kategori_produk set kategori='$kategori'   where kd_kategori = '$kd'";
        $query = update($sql);
        // var_dump($query) or die;

        if ($query != 0) {
            header("location:kategori.php?success=1");
        } else {
            header("location:kategori.php?success=4");
        }
    } else {
        header("location:kategori.php?success=2");
    }
} elseif (isset($_GET['edit_user'], $_GET['kd']) !== false && !empty($_GET['kd']) && $_GET['edit_user'] == 'data') {
    $query = query('select * from user where id_user= "' . $_GET['kd'] . '"');

    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
    // var_dump($data) or die;

} elseif (isset($_GET['edit_pegawai'], $_GET['kd']) !== false && !empty($_GET['kd']) && $_GET['edit_pegawai'] == 'data') {
    $query = query('select * from sdm where id_user= "' . $_GET['kd'] . '"');

    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
    // var_dump($data) or die;
} elseif (isset($_GET['edit_akses'], $_GET['kd']) !== false && !empty($_GET['kd']) && $_GET['edit_akses'] == 'data') {
    $query = query('select * from akses where kd_akses= "' . $_GET['kd'] . '"');

    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
    // var_dump($data) or die;
} elseif (isset($_GET['edit_kategori'], $_GET['kd']) !== false && !empty($_GET['kd']) && $_GET['edit_kategori'] == 'data') {
    $query = query('select * from kategori_produk where kd_kategori= "' . $_GET['kd'] . '"');

    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
    // var_dump($data) or die;
} else {
    header("location:index.php");
}
