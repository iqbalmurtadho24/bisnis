<?php


$data = SessionManager::getCurrentUser();

class Cs extends Controller
{
    private  $subdomain = "cs";

    public function index()
    {
        $this->chat("assalamu'alaikum-warohmatullohi-wabarokatuh", "success");
    }

    public function chat($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data Chat ";
        $data['table'] = true;
        $data['button'] = true;
        $data['judul_extra'] = "Status Pemesanan";
        if (!empty($pesan) && !empty($tipe)) {
            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;
        $chat = $this->model('Cs_model')->get();

        if (empty($chat)) {
            $data['data'] = '[["","","","","","","",""]]';
        } else {
            $a = [];
            foreach ($chat as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd') {
                        $a1 = $value1;
                        $button = '<button type="button" class="btn btn-warning" data-id="' . $value1 . '" title="edit chat"><i class="fas fa-edit"></i></button>';
                        array_push($b, $button);
                        $ky = $value1;
                    } elseif ($key1 == 'kd_pemesanan') {
                        $a2 = $value1;
                        if ($value1 != null) {
                            $button = 'data-id="' . $value1 . '" title="edit pemesanan" >';
                        } else {
                            $button = 'data-id="' . $ky . '" title="edit pemesanan">';
                        }
                    } elseif ($key1 ==  'status_pembelian') {
                        if ($value1 == "sudah") {
                            $button1 = '<button type="button" class="btn btn-success extras" data-status="sudah" data-id="' . $a2 . '"';
                            $btn = "Sudah</button>";
                        }  else {
                            $button1 = '<button type="button" class="btn btn-outline-dark extras" data-status="belum" data-id="' . $a1 . '"';
                            $btn = "Belum</button>";
                        }
                        $button  = $button1 . $button . $btn;
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }


                array_push($a, $b);
            }

            $data['data'] = json_encode($a);
        }



        $data['column'] =
            "[{title:'Aksi'},{title:'status'},
         {title:'nama'},{title:'kontak'},
         {title:'petugas'},{title:'produk'},  
        {title:'waktu'}]";
        $data['edit'] = 'edit_chat';
        $data['update'] = 'update_chat';
        $data['tambah'] = 'tambah_chat';

        $produk = $this->model("Cs_model")->series();
        $data['output'] = flasher::input("", 'produk', 'select', "", "required", "", $produk);
        $data['output'] .= flasher::input("", 'kontak', 'number');


        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function pelanggan($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data Pelanggan ";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {
            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;
        $pelanggan = $this->model('Cs_model')->get2();

        if (empty($pelanggan)) {
            $data['data'] = '[["","","",""]]';
        } else {
            $a = [];
            foreach ($pelanggan as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kontak') {
                        $button = '<button type="button" class="btn btn-warning"
                         data-id="' . $value1 . '" title="edit pelanggan">
                         <i class="fas fa-edit"></i></button>';
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }


        $data['column'] = "[{title:'Aksi'},  {title:'Pelanggan'},  {title:'kontak'},  {title:'waktu'}]";
        $data['edit'] = 'edit_pelanggan';
        $data['update'] = 'update_pelanggan';
        $data['output'] = flasher::input("", 'pelanggan');


        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }



    public function pemesanan($pesan = "", $tipe = "")
    {

        $data['judul'] = "Data Pemesanan ";
        $data['table'] = true;
        $data['button'] = true;
        if (!empty($pesan) && !empty($tipe)) {
            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;
        $pemesanan = $this->model('Cs_model')->get3();

        if (empty($pemesanan)) {
            $data['data'] = '[["","","","","","","","","","","",""]]';
        } else {
            $a = [];
            foreach ($pemesanan as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_pemesanan') {
                        $button = '<button type="button" class="btn btn-warning" data-id="' . $value1 . '" title="edit pemesanan"><i class="fas fa-edit"></i></button>';
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }
        
        $data['column'] = "[{title:'Aksi'},  {title:'Waktu'}
        ,  {title:'Produk'}  ,  {title:'Jumlah'}  
        ,  {title:'Nama Penerima'}  ,  {title:'Kontak'}
        ,  {title:'Alamat'}  ,  {title:'Harga'}  
        ,  {title:'Pembayaran Via'}  ,  {title:'Status Pembayaran'}  
        ,  {title:'Status Order Suplier'},  {title:'Resi Pengiriman'}
        ,{title:'Status Pengiriman'}]";
        $data['edit'] = 'edit_pemesanan';
        $data['update'] = 'update_pemesanan';
        $data['tambah'] = 'tambah_pemesanan';
        $data['output'] = flasher::input("", 'jumlah', 'number');
        $data['output'] .= flasher::input("", 'alamat', 'text');
        $data['output'] .= flasher::input("", 'harga', 'number');


        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function edit_pelanggan()
    {
        $id = Security::xss_input($_POST['id']);
        $pelanggan = $this->model('Cs_model')->get_single2($id);
        $output = flasher::input($pelanggan['id'], 'id', "text", "hidden");
        $output .= flasher::input($pelanggan['nama'], 'nama', 'text');
        $output .= flasher::input($pelanggan['kontak'], 'kontak', 'number');
        echo $output;
    }

    public function edit_chat()
    {
        $id = Security::xss_input($_POST['id']);
        $pelanggan = $this->model('Cs_model')->get_singlez($id);
        $output = flasher::input($pelanggan['kd'], 'kd', "text", "hidden");
        $output .= flasher::input($pelanggan['nama'], 'nama', 'text');
        $output .= flasher::input($pelanggan['kontak'], 'kontak', 'number');
        echo $output;
    }

    public function edit_extras()
    {
        if (isset($_POST['id'], $_POST['status'])) {
            $id = Security::xss_input($_POST['id']);
            $pelanggan = $this->model('Cs_model')->get_single($id);

            $output = flasher::input($id, 'kd', "text", "hidden");

            if ($_POST['status'] == 'sudah') {
                $id = Security::xss_input($_POST['id']);
                $pemesanan = $this->model('Cs_model')->get_detail_order($id);
                $output = "";
                foreach ($pemesanan as $key => $value) {
                    if ($key != "kd_pemesanan") {
                        $output .= flasher::input($value,$key, 'text', "", "required", "disabled");

                    }
                }

            }
            //  elseif ($_POST['status'] == 'proses') {
            //     $produk = $this->model("Cs_model")->pemesanan();
            //     $output .= flasher::input("", 'pemesanan', 'select', "", "required", "", $produk);
            //     $output .= flasher::input('', 'nama');
            // } 
            else {
                $produk = $this->model("Cs_model")->series();
                $provinsi = $this->model("Alamat_model")->provinsi();
                $bank = ["BRI" => "bri"];
                $output .= flasher::input($pelanggan['nama'], 'nama_pelanggan', 'text', "", "required", "readonly");
                $output .= flasher::input($pelanggan['nama'], 'nama_penerima', 'text');
                $output .= flasher::input("", 'produk', 'select', "", "required", "", $produk);
                
                $output .= flasher::input("", 'provinsi', 'select', "", "required", "", $provinsi,"",'provinsi');
                $output .= flasher::input("", 'kabupaten', 'select', "", "required", "");
                $output .= flasher::input("", 'kecamatan', 'select', "", "required", "");
                $output .= flasher::input("", 'desa', 'select', "", "required", "");
                $output .= flasher::input("", 'alamat');
                $output .= flasher::input("transfer", 'metode', 'text', "", "required", "readonly");

                $output .= flasher::input("", 'bank', 'select', "", "required", "", $bank);
                $output .= flasher::input('', 'jumlah_barang', 'number');
            }
        }
        echo $output;
    }
    public function edit_pemesanan()
    {
        $id = Security::xss_input($_POST['id']);
        $pelanggan = $this->model('Cs_model')->get_singlez($id);
        $output = flasher::input($pelanggan['kd'], 'kd', "text", "hidden");
        $output .= flasher::input($pelanggan['nama'], 'nama', 'text');
        $output .= flasher::input($pelanggan['kontak'], 'kontak', 'number');
        echo $output;
    }
    public function kabupaten()
    {

         echo    $this->model('Alamat_model')->kabupaten();
    
    }
    
    public function kecamatan()
    {

         echo    $this->model('Alamat_model')->kecamatan();
    
    }
    
    public function kelurahan()
    {

         echo    $this->model('Alamat_model')->kelurahan();
    
    }
    

    public function tambah_chat()
    {
        if ($this->model('Cs_model')->tambah() > 0) {
            header("Location:" . BASEURL . "cs/chat/berhasil-menambah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "cs/chat/Gagal-menambah-data!/error");
            exit();
        }
    }

    public function update_belum()
    {
        if ($this->model('Cs_model')->update_belum() > 1) {
            header("Location:" . BASEURL . "cs/chat/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "cs/chat/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }


}
