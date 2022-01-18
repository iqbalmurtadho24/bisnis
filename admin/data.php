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
            $modal = " <button class='btn btn-warning' onclick=edit('" . $row['kd_kategori'] . "') title='Edit Kategori'>
            <i class='far fa-edit'></i>  </button> ";

            array_push($data['data'], [
                'btn' => exist_array($modal),

                'kd' => exist_array($row['kd_kategori']),
                'kategori' => exist_array($row['kategori'])

            ]);
        }


        echo json_encode($data);
    }
} elseif (isset($_GET['jenis']) !==  false) {

    if ($_GET['jenis'] === "1") {
        $query = query('select * from jenis_produk p inner join kategori_produk k on p.kd_kategori=k.kd_kategori ');

        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = " <button class='btn btn-warning' onclick=edit('" . $row['kd_jenis'] . "') title='Edit Pegawai'>
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
} elseif (isset($_GET['merek']) !==  false) {

    if ($_GET['merek'] === "1") {
        $query = query('select * from merek m inner join jenis_produk j on m.kd_jenis=j.kd_jenis inner join kategori_produk k on j.kd_kategori=k.kd_kategori');

        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = " <button class='btn btn-warning' onclick=edit('" . $row['kd_merek'] . "') title='Edit Pegawai'>
            <i class='far fa-edit'></i>  </button> ";

            array_push($data['data'], [
                'btn' => exist_array($modal),
                'kd' => exist_array($row['kd_merek']),
                'merek' => exist_array($row['merek']),
                'jenis' => exist_array($row['jenis']),
                'kategori' => exist_array($row['kategori']),


            ]);
        }


        echo json_encode($data);
    }
} elseif (isset($_GET['produk']) !==  false) {

    if ($_GET['produk'] === "1") {
        $query = query('select * from produk p inner join merek m on p.kd_merek=m.kd_merek inner join jenis_produk j on m.kd_jenis=j.kd_jenis inner join kategori_produk k on j.kd_kategori=k.kd_kategori');

        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = " <button class='btn btn-warning' onclick=edit('" . $row['kd_produk'] . "') title='Edit Pegawai'>
            <i class='far fa-edit'></i>  </button> ";

            array_push($data['data'], [
                'btn' => exist_array($modal),
                'kd' => exist_array($row['kd_produk']),
                'produk' => exist_array($row['produk']),
                'merek' => exist_array($row['merek']),
                'jenis' => exist_array($row['jenis']),
                'kategori' => exist_array($row['kategori']),


            ]);
        }


        echo json_encode($data);
    }
} elseif (isset($_GET['suplier']) !==  false) {

    if ($_GET['suplier'] === "1") {
        $query = query('select * from suplier s inner join produk p on s.produk=p.kd_produk');

        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = " <button class='btn btn-warning' onclick=edit('" . $row['id_suplier'] . "') title='Edit Pegawai'>
            <i class='far fa-edit'></i>  </button> ";

            array_push($data['data'], [
                'btn' => exist_array($modal),
                'kd' => exist_array($row['id_suplier']),
                'nama' => exist_array($row['nama']),
                'toko' => exist_array($row['toko']),
                'alamat' => exist_array($row['alamat']),
                'kategori' => exist_array($row['kategori']),
                'produk' => exist_array($row['produk']),
                'kontak' => exist_array($row['kontak'])
            ]);
        }


        echo json_encode($data);
    }
} elseif (isset($_GET['konten']) !==  false) {

    if ($_GET['konten'] === "1") {
        $id = isset($_GET['id']) ? "where k.id_user = '{$_GET['id']}'" : "";
        $query = query("select * from konten k inner join produk p on k.kd_produk = p.kd_produk $id");

        $data['data'] = [];
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = " <button class='btn btn-warning' onclick=edit('" . $row['kd_konten'] . "') title='Edit Konten'>
            <i class='far fa-edit'></i>  </button> ";

            array_push($data['data'], [
                'btn' => exist_array($modal),
                'no' => $no++,
                'waktu' => exist_array($row['waktu']),
                'file' => "<a href='{$row['gdrive']}' class='btn btn-info' target='_blank' title='buka link'><i class='fa fa-external-link-alt'></i></a>",
                'jenis' => exist_array($row['kd_konten']),
                'produk' => exist_array($row['produk']),
                'status' => exist_array($row['status_proses'])
            ]);
        }


        echo json_encode($data);
    }
} elseif (isset($_GET['publikasi']) !==  false) {

    if ($_GET['publikasi'] === "1") {
        $query = query('select * from publikasi p inner join konten k on p.kd_konten = k.kd_produk inner join produk pr on k.kd_produk = pr.kd_produk; ');

        $data['data'] = [];
        $no = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $modal = " <button class='btn btn-warning' onclick=edit('" . $row['kd_publikasi'] . "') title='Edit Konten'>
            <i class='far fa-edit'></i>  </button> ";

            array_push($data['data'], [
                'btn' => exist_array($modal),
                'no' => $no++,
                'waktu' => exist_array($row['waktu']),
                'konten' => exist_array($row['jenis_konten']),
                'produk' => exist_array($row['produk']),
                'facebook' => exist_array($row['facebook']),
                'instagram' => exist_array($row['instagram']),
                'website' => exist_array($row['website']),
            ]);
        }


        echo json_encode($data);
    } elseif ($_GET['publikasi'] == "2") {
        $query = query("select * from konten u inner join produk p on u.kd_produk = p.kd_produk where (u.kd_konten)
         not in (SELECT uu.kd_konten from konten uu inner join publikasi s on uu.kd_konten = s.kd_konten );");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push(
                $data,
                [
                    'kd' => $row['kd_konten'],
                    'value' => $row['produk'] . " -- " . $row['jenis_konten'],
                ]
            );
        }

        echo json_encode($data);
    }
} elseif (isset($_GET['table'])) {


    $query = query("select * from {$_GET['table']}  ");
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($data, $row);
    }
    echo json_encode($data);
} elseif (isset($_GET['pesan_masuk']) !==  false) {

    if ($_GET['pesan_masuk'] === "1") {
        $query = query("select * from cs c inner join pelanggan p on c.id_pelanggan=p.id_pelanggan inner join produk pr on c.kd_produk=pr.kd_produk");

        $data['data'] = [];
        $no = 0;
        while ($row = mysqli_fetch_assoc($query)) {

            $pesanan = query("select * from pemesanan where kd_cs='{$row['kd_cs']}'");
            $row1 = mysqli_num_rows($pesanan);
            if ($row1 == 0) {
                $status = 'Belum';
            }
            if ($row1 != 0) {
                $status = 'Order';
            }


            $modal = " <button class='btn btn-warning' onclick=edit('" . $row['kd_cs'] . "') title='Edit Konten'>
            <i class='far fa-edit'></i>  </button> ";

            array_push($data['data'], [
                'btn' => exist_array($modal),
                'kd' => exist_array($row['kd_cs']),
                'waktu' => exist_array($row['waktu']),
                'pelanggan' => exist_array($row['nama']),
                'kontak' => exist_array($row['kontak']),
                'produk' => exist_array($row['produk']),
                'status' => $status
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

        $query = update($sql);
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
        $query = update($sql);
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
        $id = $_POST['id_user'];
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
        $sql = "insert into  sdm   values ('$id','$nama','$tanggal_lahir',$nik,'$jalan',$rt_rw,'$desa','$kecamatan','$kota_kabupaten','$provinsi',$kontak, '$email','$bank','$nama_rekening','$rekening')  ";
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
    if (isset($_POST['kd'], $_POST['kategori']) &&  !empty($_POST['kd']) &&  !empty($_POST['kd'])) {

        $kd = $_POST['kd'];
        $kategori = $_POST['kategori'];
        $sql = "insert into  kategori_produk  values ('$kd','$kategori')  ";
        $query = update($sql);

        if ($query != 0) {
            header("location:kategori.php?success=3");
        } else {
            header("location:kategori.php?success=4");
        }
    } else {
        header("location:kategori.php?success=2");
    }
} elseif (isset($_GET['tambah_jenis']) !==  false && $_GET['tambah_jenis'] === "1") {
    if (isset($_POST['kd'], $_POST['jenis']) &&  !empty($_POST['kd']) &&  !empty($_POST['kd'])) {

        $kd = $_POST['kd'];
        $jenis = $_POST['jenis'];
        $kategori = $_POST['kategori'];
        $kd_jenis = "$kategori$kd";
        $sql = "insert into  jenis_produk  values ('$kd_jenis','$jenis','$kategori')  ";
        $query = update($sql);
        // var_dump($query) or die;
        if ($query != 0) {
            header("location:jenis.php?success=3");
        } else {
            header("location:jenis.php?success=4");
        }
    } else {
        header("location:jenis.php?success=2");
    }
} elseif (isset($_GET['tambah_merek']) !==  false && $_GET['tambah_merek'] === "1") {
    if (isset($_POST['kd'], $_POST['merek']) &&  !empty($_POST['kd']) &&  !empty($_POST['kd'])) {

        $kd = $_POST['kd'];
        $merek = $_POST['merek'];
        $jenis = $_POST['kd_jenis'];
        $kd_merek = "$jenis$kd";


        $sql = "insert into  merek  values ('$kd_merek','$merek','$jenis')  ";
        $query = update($sql);
        // var_dump($query) or die;
        if ($query != 0) {
            header("location:merek.php?success=3");
        } else {
            header("location:merek.php?success=4");
        }
    } else {
        header("location:merek.php?success=2");
    }
} elseif (isset($_GET['tambah_produk']) !==  false && $_GET['tambah_produk'] === "1") {
    if (isset($_POST['kd'], $_POST['produk']) &&  !empty($_POST['kd']) &&  !empty($_POST['kd'])) {

        $kd = $_POST['kd'];
        $produk = $_POST['produk'];
        $merek = $_POST['kd_merek'];
        $kd_produk = "$merek$kd";


        $sql = "insert into  produk  values ('$kd_produk','$produk','$merek')  ";
        $query = update($sql);
        // var_dump($query) or die;
        if ($query != 0) {
            header("location:produk.php?success=3");
        } else {
            header("location:produk.php?success=4");
        }
    } else {
        header("location:produk.php?success=2");
    }
} elseif (isset($_GET['tambah_suplier']) !==  false && $_GET['tambah_suplier'] === "1") {
    if (isset($_POST['nama'])  &&  !empty($_POST['nama'])) {

        // $kd = $_POST['kd'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $toko = $_POST['toko'];
        $produk = $_POST['produk'];
        $kategori = $_POST['kategori'];
        $kontak = $_POST['kontak'];


        $sql = "insert into  suplier  values (null,'$nama','$toko','$alamat','$kategori','$produk',$kontak)  ";
        $query = update($sql);
        // var_dump($query) or die;
        if ($query != 0) {
            header("location:suplier.php?success=3");
        } else {
            header("location:suplier.php?success=4");
        }
    } else {
        header("location:suplier.php?success=2");
    }
} elseif (isset($_GET['tambah_konten']) !==  false && $_GET['tambah_konten'] === "1") {
    if (isset($_POST['id_user'])  &&  !empty($_POST['id_user'])) {

        $id_user = $_POST['id_user'];
        $waktu = date('Y-m-d H:i:s');
        $jenis = $_POST['jenis'];
        $produk = $_POST['produk'];
        $status = $_POST['status'];
        $link = $_POST['link'];


        $sql = "insert into konten values (null,$id_user,'$waktu','$jenis','$produk','$status',0,'$link')  ";
        $query = update($sql);
        if ($query != 0) {
            header("location:produksi_konten.php?success=3");
        } else {
            header("location:produksi_konten.php?success=4");
        }
    } else {
        header("location:produksi_konten.php?success=2");
    }
} elseif (isset($_GET['tambah_pesan_masuk']) !==  false && $_GET['tambah_pesan_masuk'] === "1") {
    if (isset($_POST['id_user'])  &&  !empty($_POST['id_user'])) {

        $id_user = $_POST['id_user'];
        $waktu = date('Y-m-d H:i:s');
        $kontak = $_POST['kontak'];
        $produk = $_POST['produk'];

        $qpelanggan = query("select * from pelanggan where kontak='$kontak'");
        $row0 = mysqli_fetch_assoc($qpelanggan);
        $row1 = mysqli_num_rows($qpelanggan);

        $pelanggan = $row0['id_pelanggan'];

        if ($row1 == 0) {
            $sql0 = "insert into pelanggan values (null,'Pelanggan Baru','$kontak')  ";
            $query0 = update($sql0);

            $sql = "insert into cs values (null,'$waktu','$pelanggan','$produk',$id_user,'$produk')  ";
            $query = update($sql);
        }
        if ($row1 != 0) {
            $sql = "insert into cs values (null,'$waktu','$pelanggan','$produk',$id_user,'$produk')  ";
            $query = update($sql);
        }

        if ($query != 0) {
            header("location:pesan_masuk.php?success=3");
        } else {
            header("location:pesan_masuk.php?success=4");
        }
    } else {
        header("location:pesan_masuk.php?success=2");
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
        $query = update($sql);



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
} elseif (isset($_GET['edit_jenis']) !==  false && $_GET['edit_jenis'] == "1") {
    if (isset($_POST['kd'], $_POST['jenis']) &&  !empty($_POST['kd'])) {
        $kd = $_POST['kd'];
        $jenis = $_POST['jenis'];

        $sql = "update jenis_produk set jenis='$jenis'   where kd_jenis = '$kd'";
        $query = update($sql);
        // var_dump($query) or die;

        if ($query != 0) {
            header("location:jenis.php?success=1");
        } else {
            header("location:jenis.php?success=4");
        }
    } else {
        header("location:jenis.php?success=2");
    }
} elseif (isset($_GET['edit_merek']) !==  false && $_GET['edit_merek'] == "1") {
    if (isset($_POST['kd'], $_POST['merek']) &&  !empty($_POST['kd'])) {
        $kd = $_POST['kd'];
        $merek = $_POST['merek'];

        $sql = "update merek set merek='$merek'   where kd_merek = '$kd'";
        $query = query($sql);

        if ($query != 0) {
            header("location:merek.php?success=1");
        } else {
            header("location:merek.php?success=4");
        }
    } else {
        header("location:merek.php?success=2");
    }
} elseif (isset($_GET['edit_produk']) !==  false && $_GET['edit_produk'] == "1") {
    if (isset($_POST['kd'], $_POST['produk']) &&  !empty($_POST['kd'])) {
        $kd = $_POST['kd'];
        $produk = $_POST['produk'];

        $sql = "update produk set produk='$produk'   where kd_produk = '$kd'";
        $query = query($sql);

        if ($query != 0) {
            header("location:produk.php?success=1");
        } else {
            header("location:produk.php?success=4");
        }
    } else {
        header("location:produk.php?success=2");
    }
} elseif (isset($_GET['edit_suplier']) !==  false && $_GET['edit_suplier'] == "1") {
    if (isset($_POST['kd'], $_POST['nama']) &&  !empty($_POST['kd'])) {
        $kd = $_POST['kd'];
        $produk = $_POST['produk'];
        $nama = $_POST['nama'];
        $toko = $_POST['toko'];
        $alamat = $_POST['alamat'];
        $kategori = $_POST['kategori'];
        $kontak = $_POST['kontak'];

        $sql = "update suplier set nama = '$nama',toko='$toko',alamat='$alamat',kategori ='$kategori', produk='$produk' , kontak =$kontak   where id_suplier = $kd";
        $query = query($sql);

        if ($query != 0) {
            header("location:suplier.php?success=1");
        } else {
            header("location:suplier.php?success=4");
        }
    } else {
        header("location:suplier.php?success=2");
    }
} elseif (isset($_GET['edit_konten']) !==  false && $_GET['edit_konten'] == "1") {
    if (isset($_POST['kd']) &&  !empty($_POST['kd'])) {
        $kd = $_POST['kd'];
        $status = $_POST['status'];
        $produk = $_POST['produk'];
        $jenis = $_POST['jenis'];
        $link = $_POST['link'];


        $sql = "update konten set status_proses = '$status',gdrive = '$link',kd_produk = '$produk',jenis_konten = '$jenis'    where kd_konten = $kd";
        $query = query($sql);

        if ($query != 0) {
            header("location:produksi_konten.php?success=1");
        } else {
            header("location:produksi_konten.php?success=4");
        }
    } else {
        header("location:produksi_konten.php?success=2");
    }
} elseif (isset($_GET['edit'], $_GET['kd'], $_GET['where']) !== false && !empty($_GET['kd'])) {
    $query = query('select * from ' . $_GET['edit'] . ' where ' . $_GET['where'] . '= "' . $_GET['kd'] . '"');

    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
} else {
    header("location:index.php");
}
