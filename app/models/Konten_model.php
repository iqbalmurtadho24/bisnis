<?php

class Konten_model
{
    private  $table = 'konten';
    private  $table1 = 'user';
    private  $table2 = 'sdm';
    private  $table3 = 'series';
    private  $table4 = 'merek';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // penggunaan biasa model 
    public function get()
    {
        $this->db->query('SELECT a.kd_konten,b.username,a.waktu_produksi,a.jenis_konten,
        concat(d.series,"-",e.merek)  produk ,a.status_produksi FROM ' . $this->table
            . ' a inner join ' . $this->table1 . " b on a.id_user = b.id 
        inner join {$this->table3} d on a.produk_konten =d.kd_series 
        inner join {$this->table4} e on d.kd_merek = e.kd_merek ");
        return $this->db->resultSet();
    }
    // penggunaan biasa model 
    public function get1()
    {
        $this->db->query('SELECT a.kd_konten,concat(d.series,"-",e.merek)  produk ,a.biaya,
        a.gd,a.fb,a.ig,a.ad,a.waktu_publikasi,a.status_produksi  FROM ' . $this->table
            . ' a inner join ' . $this->table1 . " b on a.id_user = b.id 
        inner join {$this->table3} d on a.produk_konten =d.kd_series 
        inner join {$this->table4} e on d.kd_merek = e.kd_merek ");
        return $this->db->resultSet();
    }

    public function get_single($id)
    {
        $id = Security::xss_input($id);
        $this->db->query('SELECT a.gd,a.ig,a.fb,a.ad, a.kd_konten,b.username,a.biaya,a.waktu_produksi,a.jenis_konten,a.produk_konten,
        concat(d.series,"-",e.merek)  produk ,a.status_produksi FROM ' . $this->table
            . ' a inner join ' . $this->table1 . " b on a.id_user = b.id 
        inner join {$this->table3} d on a.produk_konten =d.kd_series 
        inner join {$this->table4} e on d.kd_merek = e.kd_merek where kd_konten = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function kategori()
    {
        $this->db->query('SELECT kd_kategori, kategori FROM ' . $this->table);
        $data = $this->db->resultSet();
        foreach ($data as  $value) {
            $final[$value['kategori']] = $value['kd_kategori'];
        }
        return $final;
    }

    //insert
    public function tambah()
    {
        if (isset($_POST['jenis'], $_POST['series'], $_POST['username'])) {
            $jenis = Security::xss_input($_POST['jenis']);
            $series = Security::xss_input($_POST['series']);
            $username = Security::xss_input($_POST['username']);
            $query = "INSERT INTO $this->table  values(null,:username,sysdate(), :jenis,:series,'diplanning',0,'','','','','0000-00-00 00:00:00')";
            $this->db->query($query);
            $this->db->bind('jenis', $jenis);
            $this->db->bind('series', $series);
            $this->db->bind('username', $username);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    //update
    public function update()
    {
        if (isset($_POST['kd'])) {
            $kd = intval(Security::xss_input($_POST['kd']));
            $jenis = Security::xss_input($_POST['jenis']);
            $produk = Security::xss_input($_POST['produk']);
            $status = Security::xss_input($_POST['status']);

            $query = "update $this->table set
        jenis_konten  = :jenis,
        produk_konten  = :produk,
        status_produksi  = :status,
        waktu_produksi = sysdate()
        where kd_konten  = :kd";

            $this->db->query($query);
            $this->db->bind('kd', $kd);
            $this->db->bind('jenis', $jenis);
            $this->db->bind('produk', $produk);
            $this->db->bind('status', $status);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }
    public function peoses()
    {
        if (isset($_POST['kd'])) {
            $kd = intval(Security::xss_input($_POST['kd']));
            $biaya = Security::xss_input($_POST['biaya']);
            $gdrive = Security::xss_input($_POST['gdrive']);
            $instagram = Security::xss_input($_POST['instagram']);
            $facebook = Security::xss_input($_POST['facebook']);
            $advertise = Security::xss_input($_POST['advertise']);

            $query = "update $this->table set
        status_produksi  = 'dipublikasi',
        waktu_publikasi = sysdate(),
        biaya = :biaya,
        gd = :gdrive,
       ig = :instagram,
       fb = :facebook,
       ad = :advertise
        where kd_konten  = :kd";

            $this->db->query($query);
            $this->db->bind('kd', $kd);
            $this->db->bind('biaya', $biaya);
            $this->db->bind('gdrive', $gdrive);
            $this->db->bind('instagram', $instagram);
            $this->db->bind('facebook', $facebook);
            $this->db->bind('advertise', $advertise);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }
}
