<?php

class Konten extends Controller
{
    private  $subdomain = "konten";

    public function index()
    {

        $this->konten("assalamu'alaikum-warohmatullohi-wabarokatuh", "success");
    }

    public function konten($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data Konten";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;

        $user = $this->model('Konten_model')->get();

        if (empty($user)) {
            $data['data'] = '[["","","","","",""]]';
        } else {
            $a = [];
            foreach ($user as $key) {
                $b = [];
                $c = "";
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_konten') {
                        $button = '<button type="button" class="btn btn-warning" 
                        data-id="' . $value1 . '" title="edit konten">
                        <i class="fas fa-edit"></i></button>';
                        
                        $c ='<button type="button" class="btn btn-info" 
                        data-id="' . $value1 . '" title="proses Konten">
                        <i class="fas fa-recycle"></i></button>';
                        array_push($b, $button);
                    } elseif ($key1 == "status_produksi") {
                        if ($value1 != "dipublikasi") {
                            $b[0] .= $c;
                        }
                        array_push($b, $value1);
                    } else {
                        array_push($b, $value1);
                    }
                }

                array_push($a, $b);
            }

            $data['data'] = json_encode($a);
        }


        $data['column'] = "[{title:'Aksi'},  {title:'nama'},{title:'waktu'},{title:'Jenis Konten'},{title:'produk'},{title:'Status'}]";
        $data['edit'] = 'edit';
        $data['edit_proses'] = 'edit_proses';
        $data['update'] = 'update';
        $data['tambah'] = 'tambah';
        $data['proses'] = 'proses/konten';
        $series = $this->model('logistik_model')->series();

        if (empty($series)) {
            $data['output'] = "isi dulu tabel produk dan  user";
        } else {
            $ses = SessionManager::getCurrentUser();
            $data['output'] = flasher::input($ses['id'], 'username', 'number', 'hidden');
            $data['output'] .= flasher::input("", 'series', 'select', "", "required", "", $series);
            $data['output'] .= flasher::input("", 'jenis', 'select', "", "required", "", ['Gambar' => "gambar", "Video" => "video"]);
        }
        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function publikasi($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data Publikasi";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;

        $user = $this->model('Konten_model')->get1();
        $link = ['gd', 'ig', 'fb', 'ad'];
        if (empty($user)) {
            $data['data'] = '[["","","","","","",""]]';
        } else {
            $a = [];
            foreach ($user as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_konten') {
                        $button = '
                        <button type="button" class="btn btn-info" 
                        data-id="' . $value1 . '" title="proses Konten">
                        <i class="fas fa-recycle"></i></button>';
                        array_push($b, $button);
                    } elseif ($key1 == 'status_produksi') {
                        if ($value1 != "dipublikasi") {
                            $b[0] = "";
                        }
                    } elseif (in_array($key1, $link)) {
                        $button = "";
                        if (!empty($value1)) {
                            $button = '
                            <a href="' . $value1 . '"   class="btn btn-outline-info" target="_blank" 
                             title="Link">
                            <i class="fas fa-link"></i></a>';
                        }
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }


        $data['column'] = "[{title:'Aksi'},  {title:'Produk'},{title:'Biaya'},{title:'Gd'},{title:'fb'},{title:'ig'},{title:'ad'},{title:'Waktu Publikasi'}]";
        $data['edit_proses'] = 'edit_proses';
        $data['tambah'] = 'tambah';
        $data['proses'] = 'proses/publikasi';
        $series = $this->model('logistik_model')->series();

        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {

        if ($this->model('Konten_model')->tambah() > 0) {
            header("Location:" . BASEURL . "konten/konten/berhasil-menambah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "konten/konten/Gagal-menambah-data!/error");
            exit();
        }
    }

    public function edit()
    {
        $id = Security::xss_input($_POST['id']);
        $user = $this->model('Konten_model')->get_single($id);

        $output = flasher::input($user['kd_konten'], 'kd', "text", "hidden");
        $output .= flasher::input($user['jenis_konten'], 'jenis', 'select', "", "required", "", ['Gambar' => "gambar", 'Video' => 'video']);
        $output .= flasher::input($user['status_produksi'], 'status', "select", "required", "", "", ['Diplanning' => "diplanning", 'Diproses' => "diproses"]);
        $series = $this->model('logistik_model')->series();
        $output .= flasher::input($user['produk_konten'], 'produk', 'select', "", "required", "", $series);

        echo $output;
    }

    public function edit_proses()
    {
        $id = Security::xss_input($_POST['id']);
        $user = $this->model('Konten_model')->get_single($id);

        $output = flasher::input($user['kd_konten'], 'kd', "text", "hidden");
        $output .= flasher::input($user['biaya'], 'biaya', "number");
        $output .= flasher::input($user['gd'], 'gdrive', "url", "", "");
        $output .= flasher::input($user['ig'], 'instagram', "url", "", "");
        $output .= flasher::input($user['fb'], 'facebook', "url", "", "");
        $output .= flasher::input($user['ad'], 'advertise', "url", "", "");

        echo $output;
    }

    public function update()
    {
        if ($this->model('Konten_model')->update() > 0) {
            header("Location:" . BASEURL . "konten/konten/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "konten/konten/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }
    public function proses($page)
    {
        if ($this->model('Konten_model')->peoses() > 0) {
            header("Location:" . BASEURL . "konten/$page/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "konten/$page/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }
}
