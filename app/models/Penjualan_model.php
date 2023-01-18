<?php

class Penjualan_model
{
    private  $table = 'chat';
    private  $table1 = 'pemesanan';
    private  $table2 = 'pelanggan';
    private  $table3 = 'user';
    private  $table4 = 'merek';
    private  $table5 = 'series';
    private  $table6 = 'harga';
    private  $table7 = 'suplier';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // penggunaan biasa model 
    public function get()
    {
        $user = SessionManager::getCurrentUser();
        $this->db->query("SELECT a.kd,a.kd_pemesanan,a.status_pembelian,f.nama,a.kontak,b.username,
        concat(d.series,'-',e.merek)  produk ,
        a.kontak,a.waktu          
        FROM {$this->table} a 
        left join {$this->table1} c on a.kd_pemesanan = c.kd_pemesanan 
        left join {$this->table2} f on a.kontak = f.kontak 
        inner join {$this->table3} b on a.id_user = b.id
        inner join {$this->table5} d on a.kd_produk = d.kd_series 
        inner join {$this->table4} e on d.kd_merek = e.kd_merek where a.id_user = :user order by a.waktu desc 
        ");
        $this->db->bind("user", $user['id']);
        // var_dump($this->db->resultSet()) or die;
        return $this->db->resultSet();
    }

  
 

    public function get_single($kd)
    {
        $id = Security::xss_input($kd);
        $this->db->query("SELECT f.nama FROM {$this->table} a 
        inner join {$this->table2} f on a.kontak = f.kontak where a.kd = :kd ");
        $this->db->bind('kd', $kd);
        return $this->db->single();
    }

    public function pemesanan()
    {
        $this->db->query('SELECT * FROM ' . $this->table1);

        $data = $this->db->resultSet();
        $final = [];
        foreach ($data as  $value) {
            $final[$value['kd_pemesanan']] = $value['kd_pemesanan'];
        }

        return $final;
    }


    //insert

    public function tambah()
    {
        if (isset($_POST['produk'], $_POST['kontak'])) {
            $petugas = SessionManager::getCurrentUser();
            $petugas = $petugas['id'];
            $produk = Security::xss_input($_POST['produk']);
            $kontak = Security::xss_input($_POST['kontak']);

            $pelanggan = $this->pelanggan($kontak);
            if ($pelanggan == 0) {
                $query = "INSERT INTO {$this->table2}  values( :kontak,'pelanggan',sysdate())";
                $this->db->query($query);

                $this->db->bind('kontak', $kontak);
                $this->db->execute();

                $query = "INSERT INTO $this->table  values(null, :petugas,
                :produk,:kontak,null,'belum',sysdate())";
            } else {
                $query = "INSERT INTO $this->table  values(null, :petugas,
                :produk,:kontak,null,'belum',sysdate())";
            }


            $this->db->query($query);
            $this->db->bind('produk', $produk);
            $this->db->bind('kontak', $kontak);
            $this->db->bind('petugas', $petugas);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }



    //update

    public function update()
    {
        if (isset($_POST['id'])) {
            // var_dump($_POST) or die;
            $id = intval(Security::xss_input($_POST['id']));
            $kategori = Security::xss_input($_POST['kategori']);
            $jenis = Security::xss_input($_POST['jenis']);

            $query = "update $this->table1 set
        id_kategori  = :kategori,
        jenis = :jenis
        where id_jenis = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->bind('kategori', $kategori);
            $this->db->bind('jenis', $jenis);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }

 
}
