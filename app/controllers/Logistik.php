<?php


$data = SessionManager::getCurrentUser();

class Logistik extends Controller
{
    private  $subdomain = "logistik";

    public function index()
    {

        $this->kategori("assalamu'alaikum-warohmatullohi-wabarokatuh", "success");
    }

    public function kategori($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data Kategori Produk";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;
        $kategori = $this->model('logistik_model')->get();

        if (empty($kategori)) {
            $data['data'] = '[["",""]]';
        } else {
            $a = [];
            foreach ($kategori as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_kategori') {
                        $button = '<button type="button" class="btn btn-warning" data-id="' . $value1 . '" title="edit kategori"><i class="fas fa-edit"></i></button>';
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }


        $data['column'] = "[{title:'Aksi'},  {title:'kategori'}]";
        $data['edit'] = 'edit_kategori';
        $data['update'] = 'update_kategori';
        $data['tambah'] = 'tambah_kategori';
        $data['output'] = flasher::input("", 'kategori');


        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function jenis($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data jenis Produk";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;
        $jenis = $this->model('logistik_model')->get1();

        if (empty($jenis)) {
            $data['data'] = '[["","",""]]';
        } else {
            $a = [];
            foreach ($jenis as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_jenis') {
                        $button = '<button type="button" class="btn btn-warning" data-id="' . $value1 . '" title="edit jenis"><i class="fas fa-edit"></i></button>';
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }


        $data['column'] = "[{title:'Aksi'},  {title:'jenis'},{title:'kategori'}]";
        $data['edit'] = 'edit_jenis';
        $data['update'] = 'update_jenis';
        $data['tambah'] = 'tambah_jenis';

        $username = $this->model('logistik_model')->kategori();
        if (!empty($username)) {
            $data['output'] = flasher::input("", 'kategori', 'select', "", "required", "", $username);
            $data['output'] .= flasher::input("", 'jenis');
        } else {
            $data['output'] = "isi dulu tabel kategori";
        }


        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function merek($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data merek Produk";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;
        $merek = $this->model('logistik_model')->get2();

        if (empty($merek)) {
            $data['data'] = '[["","",""]]';
        } else {
            $a = [];
            foreach ($merek as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_merek') {
                        $button = '<button type="button" class="btn btn-warning" data-id="' . $value1 . '" title="edit merek"><i class="fas fa-edit"></i></button>';
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }


        $data['column'] = "[{title:'Aksi'},  {title:'merek'},{title:'jenis'}]";
        $data['edit'] = 'edit_merek';
        $data['update'] = 'update_merek';
        $data['tambah'] = 'tambah_merek';

        $username = $this->model('logistik_model')->jenis();
        if (!empty($username)) {
            $data['output'] = flasher::input("", 'jenis', 'select', "", "required", "", $username);
            $data['output'] .= flasher::input("", 'merek');
        } else {
            $data['output'] = "isi dulu table jenis";
        }

        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function series($pesan = "", $tipe = "")
    {
        $data['judul'] = "Data Produk";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;
        $series = $this->model('logistik_model')->get3();

        if (empty($series)) {
            $data['data'] = '[["","","",""]]';
        } else {
            $a = [];
            foreach ($series as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_series') {
                        $button = '<button type="button" class="btn btn-warning" data-id="' . $value1 . '" title="edit series"><i class="fas fa-edit"></i></button>';
                        array_push($b, $button);
                    } elseif ($key1 == 'status_series') {
                        $button = $value1 == 1 ? "Berlaku" : "Tidak Berlaku";
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }


        $data['column'] = "[{title:'Aksi'},  {title:'series'},{title:'merek'} ,{title:'status'}]";
        $data['edit'] = 'edit_series';
        $data['update'] = 'update_series';
        $data['tambah'] = 'tambah_series';

        $username = $this->model('logistik_model')->merek();

        if (!empty($username)) {
            $data['output'] = flasher::input("", 'merek', 'select', "", "required", "", $username);
            $data['output'] .= flasher::input("", 'series');
        } else {
            $data['output'] = "isi dulu mereknya";
        }

        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function suplier($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data Suplier";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;
        $suplier = $this->model('logistik_model')->get4();

        if (empty($suplier)) {
            $data['data'] = '[["","","",""]]';
        } else {
            $a = [];
            foreach ($suplier as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'id_suplier') {
                        $button = '<button type="button" class="btn btn-warning" data-id="' . $value1 . '" title="edit suplier"><i class="fas fa-edit"></i></button>';
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }


        $data['column'] = "[{title:'Aksi'}, {title:'series'}, {title:'nama'},{title:'Kategori'} ,{title:'Kontak'}]";
        $data['edit'] = 'edit_suplier';
        $data['update'] = 'update_suplier';
        $data['tambah'] = 'tambah_suplier';

        
        $username = $this->model('logistik_model')->series();
        if(!empty($username)){
        $data['output'] = flasher::input("", 'nama');
        $data['output'] .= flasher::input("", 'series', 'select', "", "required", "", $username);

        $data['output'] .= flasher::input("", 'kategori', 'select', "", "required", "", ['online' => "online", "Offline" => "offline"]);
        $data['output'] .= flasher::input("", 'kontak', 'number');
        }else{
            $data['output'] = "isi dulu tabel produk";
        }

        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function harga($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data Harga";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;
        $harga = $this->model('logistik_model')->get5();

        if (empty($harga)) {
            $data['data'] = '[["","","","","","",""]]';
        } else {
            $a = [];
            foreach ($harga as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_harga') {
                        $button = '<button type="button" class="btn btn-warning" data-id="' . $value1 . '" title="hapus harga"><i class="fas fa-edit"></i></button>';
                        array_push($b, $button);
                    } elseif ($key1 == 'status_harga') {
                        $button = $value1 == 1 ? "Berlaku" : "Tidak Berlaku";
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }


        $data['column'] = "[{title:'Aksi'},  {title:'Produk'},
        {title:'suplier'},{title:'harga'},
        {title:'harga suplier'},{title:'dibuat'} ,{title:'status'}]";
        $data['edit'] = 'edit_harga';
        $data['update'] = 'update_harga';
        $data['delete'] = 'delete_harga';
        $data['tambah'] = 'tambah_harga';

        $username = $this->model('logistik_model')->series();
        if(!empty($username)){
            $data['output'] = flasher::input("", 'series', 'select', "", "required", "", $username);
            $data['output'] .= flasher::input("", 'harga', 'number');
    
        }else{
            $data['output'] = "isi dulu produk nya";
        }
        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah_kategori()
    {
        if ($this->model('logistik_model')->tambah() > 0) {
            header("Location:" . BASEURL . "logistik/jenis/berhasil-menambah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/jenis/Gagal-menambah-data!/error");
            exit();
        }
    }


    public function tambah_jenis()
    {

        if ($this->model('logistik_model')->tambah1() > 0) {
            header("Location:" . BASEURL . "logistik/jenis/berhasil-menambah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/jenis/Gagal-menambah-data!/error");
            exit();
        }
    }

    public function tambah_merek()
    {

        if ($this->model('logistik_model')->tambah2() > 0) {
            header("Location:" . BASEURL . "logistik/merek/berhasil-menambah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/merek/Gagal-menambah-data!/error");
            exit();
        }
    }


    public function tambah_series()
    {

        if ($this->model('logistik_model')->tambah3() > 0) {
            header("Location:" . BASEURL . "logistik/series/berhasil-menambah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/series/Gagal-menambah-data!/error");
            exit();
        }
    }

    public function tambah_suplier()
    {

        if ($this->model('logistik_model')->tambah4() > 0) {
            header("Location:" . BASEURL . "logistik/suplier/berhasil-menambah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/suplier/Gagal-menambah-data!/error");
            exit();
        }
    }

    public function tambah_harga()
    {

        if ($this->model('logistik_model')->tambah5() > 0) {
            header("Location:" . BASEURL . "logistik/harga/berhasil-menambah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/harga/Gagal-menambah-data!/error");
            exit();
        }
    }

    public function edit_kategori()
    {

        $id = Security::xss_input($_POST['id']);
        $kategori = $this->model('logistik_model')->get_single($id);
        $output = flasher::input($kategori['kd_kategori'], 'kd', "text", "hidden");
        $output .= flasher::input($kategori['kategori'], 'kategori', 'text');
        echo $output;
    }

    public function edit_jenis()
    {

        $id = Security::xss_input($_POST['id']);
        $jenis = $this->model('logistik_model')->get_single1($id);
        $output = flasher::input($jenis['kd_jenis'], 'kd', "text", "hidden");
        $output .= flasher::input($jenis['jenis'], 'jenis', 'text');

        $kategori = $this->model('logistik_model')->kategori();
        $output .= flasher::input($jenis['kd_kategori'], 'kategori', 'select', "", "required", "", $kategori);

        echo $output;
    }



    public function edit_merek()
    {

        $id = Security::xss_input($_POST['id']);
        $merek = $this->model('logistik_model')->get_single2($id);
        $output = flasher::input($merek['kd_merek'], 'kd', "text", "hidden");
        $output .= flasher::input($merek['merek'], 'merek', 'text');

        $jenis = $this->model('logistik_model')->jenis();
        $output .= flasher::input($merek['kd_jenis'], 'jenis', 'select', "", "required", "", $jenis);
        echo $output;
    }

    public function edit_series()
    {

        $id = Security::xss_input($_POST['id']);
        $series = $this->model('logistik_model')->get_single3($id);
        $output = flasher::input($series['kd_series'], 'kd', "text", "hidden");
        $output .= flasher::input($series['series'], 'series', 'text');

        $merek = $this->model('logistik_model')->merek();
        $output .= flasher::input($series['kd_merek'], 'merek', 'select', "", "required", "", $merek);
        $output .= flasher::input($series['status_series'], 'status', 'select', "", "required", "", ['Tidak Berlaku' => 0, 'Berlaku' => 1]);

        echo $output;
    }

    public function edit_harga()
    {

        $id = Security::xss_input($_POST['id']);

        $suplier = $this->model('logistik_model')->get_single5($id);
        $series = $this->model('logistik_model')->series();
        $output = flasher::input($suplier['kd_harga'], 'kd', "text", "hidden");
        $output .= flasher::input($suplier["kd_series"], 'series', 'select', "", "required", "", $series);
        $output .= flasher::input($suplier['harga'], 'harga','number');
        $output .= flasher::input($suplier["status_harga"], 'status', 'select', "", "required", "", ['Tidak Berlaku' => "0", "Berlaku" => "1"]);


        echo $output;
    }

    public function edit_suplier()
    {

        $id = Security::xss_input($_POST['id']);

        $suplier = $this->model('logistik_model')->get_single4($id);
        $series = $this->model('logistik_model')->series();
        $output = flasher::input($suplier['id_suplier'], 'kd', "text", "hidden");
        $output .= flasher::input($suplier["kd_series"], 'series', 'select', "", "required", "", $series);
        $output .= flasher::input($suplier['nama'], 'nama');
        $output .= flasher::input($suplier["kategori"], 'kategori', 'select', "", "required", "", ['online' => "online", "Offline" => "offline"]);
        $output .= flasher::input($suplier["kontak"], 'kontak', 'number');


        echo $output;
    }

    public function update_kategori()
    {

        if ($this->model('logistik_model')->update() > 0) {
            header("Location:" . BASEURL . "logistik/kategori/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/kategori/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }

    public function update_jenis()
    {

        if ($this->model('logistik_model')->update1() > 0) {
            header("Location:" . BASEURL . "logistik/jenis/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/jenis/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }

    public function update_merek()
    {

        if ($this->model('logistik_model')->update2() > 0) {
            header("Location:" . BASEURL . "logistik/merek/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/merek/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }

    public function update_series()
    {

        if ($this->model('logistik_model')->update3() > 0) {
            header("Location:" . BASEURL . "logistik/series/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/series/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }

    public function update_suplier()
    {

        if ($this->model('logistik_model')->update4() > 0) {
            header("Location:" . BASEURL . "logistik/suplier/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/suplier/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }

    public function update_harga()
    {

        if ($this->model('logistik_model')->update5() > 0) {
            header("Location:" . BASEURL . "logistik/harga/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "logistik/harga/Tidak-ada-data-yang-dihapus!/error");
            exit();
        }
    }
}
