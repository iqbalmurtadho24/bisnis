<?php
// $data = SessionManager::getCurrentUser();
class marketing extends Controller
{
    private  $subdomain = "marketing";

    public function index()
    {

        $this->konten("assalamu'alaikum-warohmatullohi-wabarokatuh", "success");
    }

    public function konten($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data Marketing Per-Konten";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;

        $user = $this->model('Marketing_model')->get();

        if (empty($user)) {
            $data['data'] = '[["","","","","","","","","","","","",""]]';
        } else {
            $a = [];
            foreach ($user as $key) {
                $b = [];
                $c = "";
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_konten') {
                        $button = '<a href="' . BASEURL . $data['subdomain'] . '\multiple\\' . $value1 . '" 
                        class="btn bg-orange"  title="edit marketing">
                        <i class="fas fa-edit"></i></a>';
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }

                array_push($a, $b);
            }

            $data['data'] = json_encode($a);
        }


        $data['column'] = "[{title:'Aksi'},  {title:'User'},{title:'Produk Konten'},{title:'Jenis'},{title:'biaya'},{title:'pajak'},{title:'budget'},{title:'rv'},{title:'ipv'},{title:'slp'},{title:'atc'}]";
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

    public function marketing($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data Marketing Harian";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;

        $user = $this->model('Marketing_model')->get1();

        if (empty($user)) {
            $data['data'] = '[["","","","","","","",""]]';
        } else {
            $a = [];
            foreach ($user as $key) {
                $b = [];
                $c = "";
                foreach ($key as $key1 => $value1) {
                    array_push($b, $value1);
                }

                array_push($a, $b);
            }

            $data['data'] = json_encode($a);
        }


        $data['column'] = "[ {title:'Tanggal'},{title:'Produk'},
        {title:'Jenis'},{title:'biaya'},
        {title:'pajak'},{title:'budget'},
        {title:'rv'},{title:'ipv'},
        {title:'slp'},{title:'atc'}]";
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

    public function rekap($pesan = "", $tipe = "")
    {

        $data['judul'] = "Rekap Data Marketing ";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;
        
        $user = $this->model('Marketing_model')->get2();

        if (empty($user)) {
            $data['data'] = '[["","","","","","","",""]]';
        } else {
            $a = [];
            foreach ($user as $key) {
                $b = [];
                $c = "";
                foreach ($key as $key1 => $value1) {
                    array_push($b, $value1);
                }

                array_push($a, $b);
            }

            $data['data'] = json_encode($a);
        }


        $data['column'] = "[ {title:'Tanggal'},{title:'Produk'},
        {title:'Jenis'},{title:'biaya'},
        {title:'pajak'},{title:'budget'},
        {title:'rv'},{title:'ipv'},
        {title:'slp'},{title:'atc'}]";
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

    public function multiple($id)
    {
        $data['judul'] = "Data Publikasi";
        $data['table'] = true;
        $data['subdomain'] = $this->subdomain;

        $last = $this->model("Marketing_model")->last($id);

        $data['data'] = $this->model("Marketing_model")->multiple($last['waktu_progres'], $id);

        $this->view('templates/header', $data);
        $this->view('templates/multiple', $data);
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

        $user = $this->model('marketing_model')->get1();
        $link = ['gd', 'ig', 'fb', 'ad'];
        if (empty($user)) {
            $data['data'] = '[["","","","","","",""]]';
        } else {
            $a = [];
            foreach ($user as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_marketing') {
                        $button = '
                        <button type="button" class="btn btn-info" 
                        data-id="' . $value1 . '" title="proses marketing">
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

        if ($this->model('marketing_model')->tambah() > 0) {
            header("Location:" . BASEURL . "marketing/marketing/berhasil-menambah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "marketing/marketing/{$this->model('marketing_model')->tambah()}/error");
            exit();
        }
    }

    public function edit()
    {
        $id = Security::xss_input($_POST['id']);
        $user = $this->model('marketing_model')->get_single($id);

        $output = flasher::input($user['kd_marketing'], 'kd', "text", "hidden");
        $output .= flasher::input($user['jenis_marketing'], 'jenis', 'select', "", "required", "", ['Gambar' => "gambar", 'Video' => 'video']);
        $output .= flasher::input($user['status_produksi'], 'status', "select", "required", "", "", ['Diplanning' => "diplanning", 'Diproses' => "diproses"]);
        $series = $this->model('logistik_model')->series();
        $output .= flasher::input($user['produk_marketing'], 'produk', 'select', "", "required", "", $series);

        echo $output;
    }

    public function edit_proses()
    {
        $id = Security::xss_input($_POST['id']);
        $user = $this->model('marketing_model')->get_single($id);

        $output = flasher::input($user['kd_marketing'], 'kd', "text", "hidden");
        $output .= flasher::input($user['biaya'], 'biaya', "number");
        $output .= flasher::input($user['gd'], 'gdrive', "url", "", "");
        $output .= flasher::input($user['ig'], 'instagram', "url", "", "");
        $output .= flasher::input($user['fb'], 'facebook', "url", "", "");
        $output .= flasher::input($user['ad'], 'advertise', "url", "", "");

        echo $output;
    }

    public function update()
    {
        if ($this->model('marketing_model')->update() > 0) {
            header("Location:" . BASEURL . "marketing/marketing/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "marketing/marketing/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }
    public function proses($page)
    {
        if ($this->model('marketing_model')->peoses() > 0) {
            header("Location:" . BASEURL . "marketing/$page/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "marketing/$page/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }
}
