<?php

class Logistik_model
{
    private  $table = 'kategori_produk';
    private  $table1 = 'jenis_produk';
    private  $table2 = 'merek';
    private  $table3 = 'series';
    private  $table4 = 'suplier';
    private  $table5 = 'harga';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // penggunaan biasa model 
    public function get()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        // var_dump($this->db->resultSet()) or die;
        return $this->db->resultSet();
    }

    public function get1()
    {
        $this->db->query('SELECT a.kd_jenis,a.jenis,b.kategori FROM ' . $this->table1 . " a inner join " . $this->table . " b on a.kd_kategori = b.kd_kategori ");
        // var_dump($this->db->resultSet()) or die;
        return $this->db->resultSet();
    }

    public function get2()
    {
        $this->db->query('SELECT a.kd_merek,a.merek,b.jenis FROM ' . $this->table2 . " a
         inner join " . $this->table1 . " b on a.kd_jenis = b.kd_jenis ");
        // var_dump($this->db->resultSet()) or die;
        return $this->db->resultSet();
    }

    public function get3()
    {
        $this->db->query('SELECT a.kd_series,a.series,b.merek,a.status_series FROM ' . $this->table3 . " a inner join " . $this->table2 . " b on a.kd_merek = b.kd_merek ");
        // var_dump($this->db->resultSet()) or die;
        return $this->db->resultSet();
    }

    public function get4()
    {
        $this->db->query('SELECT a.id_suplier,b.series,a.nama,a.kategori,a.kontak FROM ' . $this->table4 . " a inner join {$this->table3} b on a.kd_series = b.kd_series  ");
        // var_dump($this->db->resultSet()) or die;
        return $this->db->resultSet();
    }

    public function get5()
    {
        $this->db->query('SELECT a.kd_harga,b.series,d.nama,a.harga,a.harga_suplier,
        a.tanggal,a.status_harga FROM ' .$this->table5 . ' a 
        inner join ' . $this->table4 . ' d on a.id_suplier = d.id_suplier
        inner join ' . $this->table3 . ' b on d.kd_series = b.kd_series ');
        // var_dump($this->db->resultSet()) or die;
        return $this->db->resultSet();
    }

    public function get_single($id)
    {
        $id = Security::xss_input($id);
        $this->db->query('SELECT * FROM ' . $this->table . " where kd_kategori=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function get_single1($id)
    {
        $id = Security::xss_input($id);
        $this->db->query('SELECT  a.kd_kategori,a.kd_jenis,a.jenis,b.kategori FROM ' . $this->table1 . " a inner join " . $this->table . " b on a.kd_kategori = b.kd_kategori where a.kd_jenis=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function get_single2($id)
    {
        $id = Security::xss_input($id);
        $this->db->query('SELECT a.kd_jenis, a.kd_merek,a.merek,b.jenis FROM ' . $this->table2 . " a inner join " . $this->table1 . " b on a.kd_jenis = b.kd_jenis where a.kd_merek=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function get_single3($id)
    {
        $id = Security::xss_input($id);
        $this->db->query('SELECT a.kd_series,a.kd_merek,a.series,b.merek,a.status_series FROM ' . $this->table3 . " a inner join " . $this->table2 . " b on a.kd_merek = b.kd_merek where a.kd_series=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function get_single4($id)
    {
        $id = Security::xss_input($id);
        $this->db->query('SELECT a.id_suplier,b.kd_series,b.series,a.nama,a.kategori,a.kontak FROM ' . $this->table4 . " a inner join {$this->table3} b on a.kd_series = b.kd_series    where a.id_suplier = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function get_single5($id)
    {
        $id = Security::xss_input($id);
        $this->db->query('SELECT * FROM ' . $this->table5 . " a inner join {$this->table3} b on a.kd_series = b.kd_series    where a.kd_harga = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }


    public function kategori()
    {
        $this->db->query('SELECT kd_kategori, kategori FROM ' . $this->table);
        $final = [];
        $data = $this->db->resultSet();
        foreach ($data as  $value) {
            $final[$value['kategori']] = $value['kd_kategori'];
        }

        return $final;
    }
    public function jenis()
    {
        $this->db->query('SELECT kd_jenis, jenis FROM ' . $this->table1);
        $final = [];
        $data = $this->db->resultSet();
        foreach ($data as  $value) {
            $final[$value['jenis']] = $value['kd_jenis'];
        }

        return $final;
    }

    public function merek()
    {
        $this->db->query('SELECT kd_merek, merek FROM ' . $this->table2);
        $final = [];
        $data = $this->db->resultSet();
        foreach ($data as  $value) {
            $final[$value['merek']] = $value['kd_merek'];
        }

        return $final;
    }

    public function series()
    {
        $this->db->query('SELECT kd_series, series FROM ' . $this->table3);

        $data = $this->db->resultSet();
        $final = [];
        foreach ($data as  $value) {
            $final[$value['series']] = $value['kd_series'];
        }

        return $final;
    }



    //insert


    public function tambah()
    {
        if (isset($_POST['kategori'])) {
            $kategori = Security::xss_input($_POST['kategori']);
            $query = "INSERT INTO $this->table  values(null, :kategori)";

            $this->db->query($query);
            $this->db->bind('kategori', $kategori);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
    public function tambah1()
    {

        if (isset($_POST['kategori'], $_POST['jenis'])) {
            $kategori = Security::xss_input($_POST['kategori']);
            $jenis = Security::xss_input($_POST['jenis']);
            $query = "INSERT INTO $this->table1  values(null,:jenis, :kategori)";

            $this->db->query($query);
            $this->db->bind('kategori', $kategori);
            $this->db->bind('jenis', $jenis);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function tambah2()
    {

        if (isset($_POST['jenis'], $_POST['merek'])) {
            $merek = Security::xss_input($_POST['merek']);
            $jenis = Security::xss_input($_POST['jenis']);
            $query = "INSERT INTO $this->table2  values(null, :merek,:jenis)";

            $this->db->query($query);
            $this->db->bind('merek', $merek);
            $this->db->bind('jenis', $jenis);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
    public function tambah3()
    {

        if (isset($_POST['series'], $_POST['merek'])) {
            $merek = Security::xss_input($_POST['merek']);

            $series = Security::xss_input($_POST['series']);
            $query = "INSERT INTO $this->table3  values(null, :series ,'1', :merek)";

            $this->db->query($query);
            $this->db->bind('merek', $merek);
            $this->db->bind('series', $series);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function tambah4()
    {

        if (isset($_POST['nama'], $_POST['kategori'], $_POST['kontak'])) {
            $nama = Security::xss_input($_POST['nama']);
            $kategori = Security::xss_input($_POST['kategori']);
            $kontak = Security::xss_input($_POST['kontak']);
            $series = Security::xss_input($_POST['series']);

            $query = "INSERT INTO $this->table4  values(null, :series,:nama ,:kategori, :kontak)";

            $this->db->query($query);
            $this->db->bind('nama', $nama);
            $this->db->bind('series', $series);
            $this->db->bind('kategori', $kategori);
            $this->db->bind('kontak', $kontak);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function tambah5()
    {

        if (isset($_POST['series'], $_POST['harga'])) {
            $series = Security::xss_input($_POST['series']);
            $harga = Security::xss_input($_POST['harga']);

            $this->db->query('update ' . $this->table5  . ' set status_harga = 0 where  kd_series = :series ');
            $this->db->bind('series', $series);
            $this->db->execute();

            $query = "INSERT INTO $this->table5  values(null, :series ,:harga, sysdate(),'1')";
            $this->db->query($query);
            $this->db->bind('series', $series);
            $this->db->bind('harga', $harga);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }


    //update

    public function update()
    {
        if (isset($_POST['kd'])) {
            $kd = intval(Security::xss_input($_POST['kd']));
            $kategori = Security::xss_input($_POST['kategori']);

            $query = "update $this->table set
        kategori  = :kategori
        where kd_kategori = :kd";

            $this->db->query($query);
            $this->db->bind('kd', $kd);
            $this->db->bind('kategori', $kategori);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }
    public function update1()
    {
        if (isset($_POST['kd'])) {
            // var_dump($_POST) or die;
            $kd = intval(Security::xss_input($_POST['kd']));
            $kategori = Security::xss_input($_POST['kategori']);
            $jenis = Security::xss_input($_POST['jenis']);

            $query = "update $this->table1 set
        kd_kategori  = :kategori,
        jenis = :jenis
        where kd_jenis = :kd";

            $this->db->query($query);
            $this->db->bind('kd', $kd);
            $this->db->bind('kategori', $kategori);
            $this->db->bind('jenis', $jenis);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function update2()
    {
        if (isset($_POST['kd'])) {
            // var_dump($_POST) or die;
            $kd = intval(Security::xss_input($_POST['kd']));
            $merek = Security::xss_input($_POST['merek']);
            $jenis = Security::xss_input($_POST['jenis']);

            $query = "update $this->table2 set
        merek  = :merek,
        kd_jenis = :jenis
        where kd_merek = :kd";

            $this->db->query($query);
            $this->db->bind('kd', $kd);
            $this->db->bind('merek', $merek);
            $this->db->bind('jenis', $jenis);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function update3()
    {
        if (isset($_POST['kd'])) {
            $kd = intval(Security::xss_input($_POST['kd']));
            $merek = Security::xss_input($_POST['merek']);
            $series = Security::xss_input($_POST['series']);
            $status = Security::xss_input($_POST['status']);

            $query = "update $this->table3 set
        series  = :series,
        kd_merek = :merek,
        status_series = :status
        where kd_series = :kd";

            $this->db->query($query);
            $this->db->bind('kd', $kd);
            $this->db->bind('merek', $merek);
            $this->db->bind('series', $series);
            $this->db->bind('status', $status);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function update4()
    {
        if (isset($_POST['kd'])) {
            $kd = intval(Security::xss_input($_POST['kd']));
            $kategori = Security::xss_input($_POST['kategori']);
            $nama = Security::xss_input($_POST['nama']);
            $kontak = Security::xss_input($_POST['kontak']);
            $series = Security::xss_input($_POST['series']);
            $query = "update $this->table4 set
            kategori  = :kategori,
            kd_series  = :series,
            nama  = :nama,
            kontak  = :kontak
            where id_suplier = :kd";

            $this->db->query($query);
            $this->db->bind('kd', $kd);
            $this->db->bind('kategori', $kategori);
            $this->db->bind('series', $series);
            $this->db->bind('nama', $nama);
            $this->db->bind('kontak', $kontak);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }

    public function update5()
    {
        if (isset($_POST['kd'])) {
            $kd = intval(Security::xss_input($_POST['kd']));
            $harga = Security::xss_input($_POST['harga']);
            $status = Security::xss_input($_POST['status']);
            $series = Security::xss_input($_POST['series']);
            $query = "update $this->table5 set
            status_harga  = :status,
            kd_series  = :series,
            harga  = :harga

            where kd_harga = :kd";

            $this->db->query($query);
            $this->db->bind('kd', $kd);

            $this->db->bind('series', $series);
            $this->db->bind('harga', $harga);
            $this->db->bind('status', $status);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }
    // public function delete5($kd)
    // {
    //     if (!empty($kd)) {
    //         $kd = intval(Security::xss_input($kd));
    //         $this->db->query("select * from {$this->table5} where kd_harga = :kd");
    //         $this->db->bind('kd', $kd);
    //         $data = $this->db->single();

    //         $this->db->query('update ' . $this->table5 . ' set status_harga = 1 where kd_series = :kd  order by tanggal desc limit 1');
    //         $this->db->bind('kd', $data['kd_series']);
    //         $this->db->execute();

    //         $query = "delete from $this->table5 where kd_harga = :kd";
    //         $this->db->query($query);
    //         $this->db->bind('kd', $kd);
    //         $this->db->execute();

    //         return $this->db->rowCount();
    //     }
    // }
}
