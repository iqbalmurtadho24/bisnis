<?php

class Marketing_model
{
    private  $table = 'iklan';
    private  $table1 = 'konten';
    private  $table2 = 'user';

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
         $data = SessionManager::getCurrentUser();
        $this->db->query("select 
        a.kd_konten, c.username,
        concat(d.series,'-',e.merek)  produk , a.jenis_konten, 
        sum(b.biaya),sum(b.pajak),
        sum(b.budget),sum(b.rv),
        (b.lpv),sum(b.slp),
        sum(b.atc)    from {$this->table1} a inner join {$this->table} b on a.kd_konten = b.kd_konten 
        inner join {$this->table3} d on a.produk_konten = d.kd_series 
        inner join {$this->table4} e on d.kd_merek = e.kd_merek
        inner join {$this->table2} c on b.id_user = c.id
        where a.status_produksi ='dipublikasi' && a.id_user = {$data['id']}  
        GROUP by b.id_user, b.kd_konten; ");
        return $this->db->resultSet();
    }

    public function get1()
    {
            $this->db->query("SELECT 
            a.waktu_progres ,concat(d.series,'-',e.merek)  produk ,
            c.jenis_konten ,sum(a.biaya),
            sum(a.pajak),sum(a.budget),
            sum(a.rv),sum(a.lpv),
            sum(a.slp),sum(a.atc)  
            FROM {$this->table} a inner join {$this->table1} c on a.kd_konten = c.kd_konten 
            inner join {$this->table2} b on a.id_user = b.id
            inner join {$this->table3} d on c.produk_konten = d.kd_series 
            inner join {$this->table4} e on d.kd_merek = e.kd_merek
            group by a.waktu_progres");
        return $this->db->resultSet();
    }

    public function get2()
    {
            $this->db->query("SELECT 
            a.waktu_progres ,concat(d.series,'-',e.merek)  produk ,
            c.jenis_konten ,sum(a.biaya),
            sum(a.pajak),sum(a.budget),
            sum(a.rv),sum(a.lpv),
            sum(a.slp),sum(a.atc)  
            FROM {$this->table} a inner join {$this->table1} c on a.kd_konten = c.kd_konten 
            inner join {$this->table2} b on a.id_user = b.id
            inner join {$this->table3} d on c.produk_konten = d.kd_series 
            inner join {$this->table4} e on d.kd_merek = e.kd_merek
            group by a.waktu_progres");
        return $this->db->resultSet();
    }

    public function multiple($date, $id)
    {

        $date = date("Y-m-d", strtotime($date . "+1 day"));
        $last = flasher::last_date($date);

        $m = date('m', strtotime($date));
        $y = date('Y', strtotime($date));
        $last = intval(date("d", strtotime($last)));
        $now = intval(date("d", strtotime($date)));

        $date = '<input type="hidden" name="konten" value= "' . $id . '" >';
        $int = 1;
        for ($i = $now; $i <= $last; $i++) {
            if ($i < 10) {
                $a = "0" . $i;
            } else {
                $a = $i;
            }
            $date .= '<tr><td>' . $int++ . ' </td>
            <td><input type="date" name="tanggal[]" class="form-control" readonly  value="' . $y . '-' . $m . '-' . $a . '" ></td>
            <td><input type="number" name="biaya[]" class="form-control" ></td>            
            <td><input type="number" name="rv[]" class="form-control" ></td>
            <td><input type="number" name="lpv[]" class="form-control" ></td>
            <td><input type="number" name="slp[]" class="form-control" ></td>
            <td><input type="number" name="atc[]" class="form-control" ></td></tr>';
        }
        return $date;
    }

    public function last($id)
    {
        $this->db->query("SELECT * from {$this->table} where kd_konten = :id order by waktu_progres desc limit 1");
        $this->db->bind('id', $id);
        if ($this->db->single()) {
            return $this->db->single();
        } else {
            return ['waktu_progres' => date("Y-m-d")];
        }
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



    //insert
    public function tambah()
    {
        if (isset($_POST['tanggal'], $_POST['biaya'], $_POST['rv'], $_POST['lpv'], $_POST['slp'], $_POST['atc'], $_POST['konten'])) {
            $count = count($_POST['tanggal']);
            $effect = 0;
            $user = SessionManager::getCurrentUser();
            $konten = Security::xss_input($_POST['konten']);
            for ($i = 0; $i < $count; $i++) {

                $tanggal = Security::xss_input($_POST['tanggal'][$i]);

                $biaya = Security::xss_input($_POST['biaya'][$i]);
                $rv = Security::xss_input($_POST['rv'][$i]);
                $lpv = Security::xss_input($_POST['lpv'][$i]);
                $slp = Security::xss_input($_POST['slp'][$i]);
                $atc = Security::xss_input($_POST['atc'][$i]);
                # code...

                $biaya = intval($biaya);
                $pajak = (11 / 100) * $biaya;
                $budget = $biaya + $pajak;

                if (empty($tanggal) || empty($biaya) || empty($rv) || empty($lpv)  || empty($slp) || empty($atc)) {
                    # code...
                } else {
                    $query = "INSERT INTO $this->table  
                    values(null,:user,:konten, :tanggal,:biaya,:pajak,:budget,:rv,
                    :lpv,:slp,:atc)";

                    $this->db->query($query);
                    $this->db->bind('tanggal', $tanggal);
                    $this->db->bind('konten', $konten, 'int');
                    $this->db->bind('biaya', $biaya);
                    $this->db->bind('pajak', $pajak);
                    $this->db->bind('budget', $budget);
                    $this->db->bind('biaya', $biaya);
                    $this->db->bind('rv', $rv);
                    $this->db->bind('lpv', $lpv);
                    $this->db->bind('slp', $slp);
                    $this->db->bind('atc', $atc);
                    $this->db->bind('user', $user['id'], "int");
                    $this->db->execute();
                    $effect += $this->db->rowCount();
                }
            }

            if ($effect == $count) {
                return $count;
            } else {
                return "hanya-menambah-$effect-baris";
            }
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
