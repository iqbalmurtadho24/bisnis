<?php

class Cs_model
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

 
    public function get2()
    {
        $petugas = SessionManager::getCurrentUser();
        
        $this->db->query('SELECT a.kontak,a.nama,a.kontak tod ,a.waktu FROM ' . $this->table2 . ' a inner join 
        '.$this->table.' b on a.kontak = b.kontak where b.id_user = :id   order by waktu desc ');
        $this->db->bind("id",$petugas['id']);
        // var_dump($this->db->resultSet()) or die;
        return $this->db->resultSet();
    }

    public function get3()
    {
        $this->db->query("SELECT c.kd_pemesanan ,c.waktu_pemesanan,
        concat(d.series,'-',e.merek)  produk ,c.jumlah,c.nama_penerima,a.kontak,
        concat(c.alamat,' ',c.desa,' ',c.kecamatan,' ',c.kabupaten,' ',c.provinsi) alamat
        ,c.harga_penjualan,c.metode_pembayaran,c.status_pembayaran,c.status_order_suplier,
        c.resi_pengiriman,c.status_pengiriman 
        
        FROM {$this->table} a 
        left join {$this->table1} c on a.kd_pemesanan = c.kd_pemesanan 
        left join {$this->table2} f on a.kontak = f.kontak 
        inner join {$this->table5} d on a.kd_produk = d.kd_series 
        inner join {$this->table4} e on d.kd_merek = e.kd_merek order by a.waktu desc");        // var_dump($this->db->resultSet()) or die;
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

    public function pelanggan($kontak)
    {
        $kontak = Security::xss_input($kontak);
        $this->db->query('SELECT * FROM ' . $this->table2 . " where kontak =:kontak");
        $this->db->bind('kontak', $kontak);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function get_single1($id)
    {
        $id = Security::xss_input(intval($id));
        $this->db->query('SELECT  * FROM ' . $this->table1 . " a inner join " . $this->table . " b on a.id_kategori = b.id_kategori where a.id_jenis=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function get_single2($id)
    {
        $id = Security::xss_input(intval($id));
        $this->db->query('SELECT * FROM ' . $this->table2 . ' where id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function get_detail_order($id)
    {
        $this->db->query("SELECT c.kd_pemesanan,c.waktu_pemesanan,
        concat(d.series,'-',e.merek)  produk ,c.jumlah,c.nama_penerima,a.kontak,
        concat(c.alamat,' ',c.desa,' ',c.kecamatan,' ',c.kabupaten,' ',c.provinsi) alamat
        ,c.harga_penjualan,c.metode_pembayaran,c.status_pembayaran,c.status_order_suplier,
        c.resi_pengiriman,c.status_pengiriman 
        
        FROM {$this->table} a 
        left join {$this->table1} c on a.kd_pemesanan = c.kd_pemesanan 
        left join {$this->table2} f on a.kontak = f.kontak 
        inner join {$this->table5} d on a.kd_produk = d.kd_series 
        inner join {$this->table4} e on d.kd_merek = e.kd_merek where c.kd_pemesanan = :id
        order by a.waktu desc");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    // public function pelanggan()
    // {
    //     $this->db->query('SELECT id, nama FROM ' . $this->table2);

    //     $data = $this->db->resultSet();
    //     $final = [];
    //     foreach ($data as  $value) {
    //         $final[$value['nama']] = $value['id'];
    //     }
    //     return $final;
    // }

    public function series()
    {
        $this->db->query('SELECT kd_series, series ,merek FROM ' .
            $this->table5 . ' a inner join ' . $this->table4 . ' b on a.kd_merek = b.kd_merek');

        $data = $this->db->resultSet();
        $final = [];
        foreach ($data as  $value) {
            $final[$value['merek'] . '-' . $value['series']] = $value['kd_series'];
        }

        return $final;
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

    public function update_belum()
    {
        // var_dump($_POST) or die;
        if (isset($_POST['kd'])) {
            $petugas = SessionManager::getCurrentUser();
            $petugas = $petugas['id'];
            $id = intval(Security::xss_input($_POST['kd']));
            $nama_penerima = Security::xss_input($_POST['nama_penerima']);
            $produk = Security::xss_input($_POST['produk']);
            $provinsi = Security::xss_input($_POST['provinsi']);
            $kabupaten = Security::xss_input($_POST['kabupaten']);
            $kecamatan = Security::xss_input($_POST['kecamatan']);
            $desa = Security::xss_input($_POST['desa']);
            $alamat = Security::xss_input($_POST['alamat']);
            $metode = Security::xss_input($_POST['metode']);
            $bank = Security::xss_input($_POST['bank']);
            $jumlah_barang = Security::xss_input($_POST['jumlah_barang']);

            $this->db->query('SELECT * FROM ' . $this->table6 . ' a inner join ' . $this->table7 . ' b
            on a.id_suplier = b.id_suplier where b.kd_series= :produk');
            $this->db->bind('produk', $produk,"int");
            $a1 =  $this->db->single();
            $harga = $a1['harga'] * intval($jumlah_barang);
            $harga_suplier = $a1['harga_suplier'] * intval($jumlah_barang);

            
            $this->db->query('SELECT * FROM ' . $this->table1 . ' order by kd_pemesanan desc limit 1');
            $a2 =  $this->db->single();
            $last_id = $a2['kd_pemesanan'] +1 ; 

            $query = "INSERT INTO $this->table1 values(:id,:produk,:jumlah_barang,
            sysdate(),:nama,:alamat,:desa,:kecamatan,:kabupaten,:provinsi, :harga ,:metode,
            :bank,0,null,:harga_suplier ,0,0,'',0)";

            $this->db->query($query);
            $this->db->bind('id', $last_id);
            $this->db->bind('produk', $produk);
            $this->db->bind('provinsi', $provinsi,"string");
            $this->db->bind('kabupaten', $kabupaten,"string");
            $this->db->bind('kecamatan', $kecamatan,"string");
            $this->db->bind('desa', $desa,"string");
            $this->db->bind('alamat', $alamat,"string");
            $this->db->bind('nama', $nama_penerima,"string");
            $this->db->bind('metode', $metode,"string");
            $this->db->bind('bank', $bank,"string");
            $this->db->bind('harga', $harga);
            $this->db->bind('harga_suplier', $harga_suplier);
            $this->db->bind('jumlah_barang', $jumlah_barang);
            $this->db->execute();
            $t1 = $this->db->rowCount();

            $query = "update  $this->table set kd_pemesanan = :last ,status_pembelian = 'sudah' where kd =:id  ";
            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->bind('last', $last_id);
            $this->db->execute();
            $t2 = $this->db->rowCount();


            $plus = $t1 + $t2;
            return $plus ;
        }
    }
    public function update1()
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

    public function update2()
    {
        if (isset($_POST['id'])) {
            // var_dump($_POST) or die;
            $id = intval(Security::xss_input($_POST['id']));
            $nama = Security::xss_input($_POST['nama']);
            $kontak = Security::xss_input($_POST['kontak']);

            $query = "update $this->table2 set
        nama  = :nama,
        kontak = :kontak
        where id= :id";

            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->bind('nama', $nama);
            $this->db->bind('kontak', $kontak);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }
}
