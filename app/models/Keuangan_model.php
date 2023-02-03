<?php

class Keuangan_model
{
    private  $table = 'chat';
    private  $table1 = 'pemesanan';    
    
    private  $table3 = 'merek';
    private  $table4 = 'series';
    private  $table5 = 'suplier';
    private  $table6 = 'sdm';


    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // penggunaan biasa model 
    public function get()
    {
        $this->db->query("SELECT c.kd_pemesanan,c.status_pembayaran,
        c.waktu_pemesanan,concat(d.series,'-',e.merek)  produk ,
        c.jumlah,c.nama_penerima,
        a.kontak, concat(c.alamat,'  ',c.desa,'  ',c.kecamatan,'  ',c.kabupaten,'  ',c.provinsi) ,           		
        c.jumlah_harga,c.metode_pembayaran
        FROM {$this->table1} c 
        left join {$this->table} a on c.kd_pemesanan = a.kd_pemesanan 
        inner join {$this->table4} d on a.kd_produk = d.kd_series 
        inner join {$this->table3} e on d.kd_merek = e.kd_merek         
        where status_pembayaran
        order by c.waktu_pemesanan desc 
        ");
        // var_dump($this->db->resultSet()) or die;
        return $this->db->resultSet();
    }

    public function get1()
    {
        $this->db->query("SELECT c.kd_pemesanan,g.nama,
        c.nama_penerima,a.kontak,
           concat(d.series,'-',e.merek)  produk ,c.jumlah,
           c.jumlah_harga,c.status_order_suplier,
           f.nama suplier,f.platform,
        c.invoice_suplier,c.status_pembayaran_suplier
        FROM {$this->table1} c 
        left join {$this->table} a on c.kd_pemesanan = a.kd_pemesanan 
        left join {$this->table5} f on c.id_suplier = f.id_suplier 
        inner join {$this->table4} d on a.kd_produk = d.kd_series 
        inner join {$this->table3} e on d.kd_merek = e.kd_merek    
        inner join {$this->table6} g on c.id_admin_penjualan = g.id_user    
        where c.status_pembayaran = 'lunas'
        order by c.waktu_pemesanan desc;
        ");
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
