<?php


$data = SessionManager::getCurrentUser();

class Penjualan extends Controller
{


    private  $subdomain = "penjualan";

    public function index()
    {

        $this->pemesanan("assalamu'alaikum-warohmatullohi-wabarokatuh", "success");
    }

    public function pemesanan($pesan = '', $tipe = '')
    {
        $data['judul'] = "Data Pemesanan";
        $data['table'] = true;
        $data['button'] = true;

        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;

        $user = $this->model('Penjualan_model')->get();
        if (empty($user)) {
            $data['data'] = '[["","","","","","","","",""]]';
        } else {
            $a = [];
            foreach ($user as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_pemesanan') {
                        $a1 = $value1;
                    } elseif ($key1 ==  'status_pembayaran') {
                        $button1 = '<button type="button" class="btn btn-success extras" data-status="sudah" data-id="' . $a1 . '" title="Order SUplier">
                        Order 
                        </button>';
                        $button  = $button1 ;
                        array_push($b, $button);
                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }

        $data['column'] = "[{title:'Status Pembayaran'},{title:'Waktu'},
        {title:'Produk'},{title:'Jumlah'},{title:'Nama Penerima'},{title:'Kontak'},
        {title:'Alamat'},{title:'Harga'},{title:'Pembayaran Via'}]";

        $data['edit'] = 'edit_penjualan';
        $data['update'] = 'update_penjualan';

        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }
    public function penjualan($pesan = '', $tipe = '')
    {
        $data['judul'] = "Data Penjualan";
        $data['table'] = true;
        $data['button'] = true;

        if (!empty($pesan) && !empty($tipe)) {

            $data['pesan'] = flasher::setFlash($pesan, $tipe);
        }

        $data['subdomain'] = $this->subdomain;

        $user = $this->model('Penjualan_model')->get1();
        if (empty($user)) {
            $data['data'] = '[["","","","","","","","","",""]]';
        } else {
            $a = [];
            foreach ($user as $key) {
                $b = [];
                foreach ($key as $key1 => $value1) {
                    if ($key1 == 'kd_pemesanan') {
                        $button = '<button type="button" class="btn btn-warning" data-id="' . $value1 . '" title="edit user"><i class="fas fa-edit"></i></button>';
                        array_push($b, $button);

                    } else {
                        array_push($b, $value1);
                    }
                }
                array_push($a, $b);
            }
            $data['data'] = json_encode($a);
        }

        $data['column'] = "[{title:'Aksi'},{title:'Nama Penerima'},
        {title:'Kontak'},{title:'Produk'},{title:'Jumlah Barang'},{title:'Total Harga'},
        {title:'Nama Suplier'},{title:'Jasa Pengiriman'},{title:'Resi Pengiriman'},{title:'Status Pengiriman'}]";

        $data['edit'] = 'edit_penjualan';
        $data['update'] = 'update_penjualan';

        $this->view('templates/header', $data);
        $this->view('templates/crud', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        if ($this->model('User_model')->tambah() > 0) {
            header("Location:" . BASEURL . "sdm/sdm/berhasil-menambah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "sdm/sdm/Gagal-menambah-data!/error");
            exit();
        }
    }

    public function edit()
    {
        $id = Security::xss_input($_POST['id']);
        $user = $this->model('User_model')->get_single($id);
        $output = flasher::input($user['id'], 'user', "text", "hidden");

        $output .= flasher::input($user['username'], 'username', 'text');
        $output .= flasher::input($user['status_akun'], 'status', "select", "required", "", "", ['Aktif' => 1, 'Nonaktif' => 0]);
        $output .= flasher::input("reset", 'reset_password', "checkbox", "", "");

        echo $output;
    }

    public function update()
    {

        if ($this->model('User_model')->update() > 0) {
            header("Location:" . BASEURL . "sdm/sdm/berhasil-mengubah-data!/success");
            exit();
        } else {
            header("Location:" . BASEURL . "sdm/sdm/Tidak-ada-data-yang-berubah!/error");
            exit();
        }
    }
}
