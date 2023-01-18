<?php

class User_model
{
    private  $table = 'user';
    private  $table1 = 'akses';
    private  $table2 = 'sdm';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //session
    public function login()
    {
        if (isset($_POST['username'], $_POST['password'])) {
            $username = Security::xss_input($_POST['username']);
            $password = Security::xss_input($_POST['password']);


            $query = "select * from $this->table a  inner join $this->table2 b on a.id = b.id_user  where  a.username =:username  and a.status_akun = '1' ";
            $this->db->query($query);
            $this->db->bind("username", $username);
            $this->db->execute();

            $result =  $this->db->single();
            // var_dump($result)or die();

            if (is_array($result)) {
                $pass = Security::pass_verify($password, $result['password']);
                $data = $this->db->single();
                // var_dump($pass)or die();
                if ($pass == 1 && !empty($data['nama']))  return $data;
                else return false;
            } else return false;
        } else return false;
    }

    public function set_session(array $data)
    {

        $ip = self::get_client_ip();
        if ($ip != "UNKNOWN") {

            $query = "update $this->table set
        ip_address = :user 
        ,last_access = sysdate()
        ,session = :session
        where id = :id ";
            $this->db->query($query);
            $this->db->bind('session', $data['session']);
            $this->db->bind('id', $data['id']);
            $this->db->bind('user', $ip);
            $this->db->execute();
        }
    }

    public    function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function delete_session($data)
    {
        $query = "update $this->table AS a inner join $this->table2 as b  set ip_address ='', last_access = '', session ='' where a.session= :id and b.nama = :nama";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute();
    }

    public function session(array $data)
    {
        $ip = self::get_client_ip();
        if ($ip != "UNKNOWN") {
            # code...
            $this->db->query('SELECT * FROM ' . $this->table . " a inner join " . $this->table2 . "  b on a.id = b.id_user where a.ip_address = :ip and a.session=:session and b.nama=:nama and a.status_akun = '1' ");
            $this->db->bind('session', $data[0]);
            $this->db->bind('ip', $ip);
            $this->db->bind('nama', $data[1]);
            return $this->db->single();
        }
    }

    // penggunaan biasa model 
    public function get()
    {
        $this->db->query('SELECT id,username,status_akun,last_access,ip_address FROM ' . $this->table);
        // var_dump($this->db->resultSet()) or die;
        return $this->db->resultSet();
    }

    public function username()
    {
        $this->db->query('SELECT id, username FROM ' . $this->table . " where status_akun = '1'");
        // var_dump($this->db->resultSet()) or die;
        $data = $this->db->resultSet();
        foreach ($data as $key => $value) {
            $final[$value['username']] = $value['id'];
        }
        return $final;
    }
   
    public function access()
    {
        $this->db->query('SELECT a.id,b.username,a.akses,
        a.updated_at ,a.status_akses FROM ' . $this->table1 . " a left  join 
        $this->table b on a.id_user = b.id ");   
        return $this->db->resultSet();
    }

    public function detail()
    {
        $this->db->query('SELECT a.id_user,b.username,a.nama,
        a.tgl_lahir ,a.nik,a.jalan,a.rt,a.rw,a.desa,a.kecamatan,a.kota_kabupaten,a.provinsi,a.kontak,a.email 
        FROM ' . $this->table2 . " a left  join $this->table b on a.id_user = b.id ");
        
        return $this->db->resultSet();
    }

    public function get1($id)
    {
        $id = Security::xss_input($id);

        $this->db->query('SELECT akses FROM ' . $this->table1 . " where id_user=:id and status_akses = '1'");
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function get_single($id)
    {
        $id = Security::xss_input($id);
        $this->db->query('SELECT id,username,status_akun FROM ' . $this->table . " where id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function get_single1($id)
    {
        $id = Security::xss_input($id);
        $this->db->query('SELECT a.id,a.id_user,b.username,a.akses,a.updated_at ,a.status_akses  FROM ' . $this->table1 . " a left join $this->table b on a.id_user=b.id where a.id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function get_single2($id)
    {
        $id = Security::xss_input($id);
        $this->db->query('SELECT a.id_user,b.username,a.nama,
        a.tgl_lahir ,a.nik,a.jalan,a.rt,a.rw,a.desa,a.kecamatan,a.kota_kabupaten,a.provinsi,a.kontak,a.email   
        FROM ' . $this->table2 . " a left join $this->table b on a.id_user=b.id where a.id_user=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

//insert
    public function tambah()
    {
        $username = Security::xss_input($_POST['username']);
        $query = "select * from $this->table where username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->execute();
        $us = $this->db->rowCount();

        if (isset($_POST['username']) && $us == 0) {
            $pass = Security::pass_hash('123');
            $query = "INSERT INTO $this->table 
            (id,username,password,status_akun) 
            values(null, :username, :password, '1');
            SET @a := (SELECT id FROM user where username = :username );
            INSert into $this->table2 (id_user) values(@a); ";

            $this->db->query($query);
            $this->db->bind('username', $username);
            $this->db->bind('password', $pass);
            $this->db->execute();
            return $this->db->rowCount();
        } else {
            return 0;
        }
    }

    public function tambah_akses()
    {
        if (isset($_POST['username'], $_POST['akses'])) {
            $username = Security::xss_input($_POST['username']);
            $akses = Security::xss_input($_POST['akses']);
            $query = "INSERT INTO $this->table1  values(null, :username,:akses,sysdate(),'1')";

            $this->db->query($query);
            $this->db->bind('username', $username);
            $this->db->bind('akses', $akses);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function tambah_detail()
    {
        if (isset($_POST['user'], $_POST['nama'])) {
            $id = intval(Security::xss_input($_POST['user']));
            $nama = Security::xss_input($_POST['nama']);
            $tgl_lahir = Security::xss_input($_POST['tgl_lahir']);
            $nik = Security::xss_input($_POST['nik']);
            $jalan = Security::xss_input($_POST['jalan']);
            $rt = Security::xss_input($_POST['rt']);
            $rw = Security::xss_input($_POST['rw']);
            $desa = Security::xss_input($_POST['desa']);
            $kecamatan = Security::xss_input($_POST['kecamatan']);
            $kota_kabupaten = Security::xss_input($_POST['kota_kabupaten']);
            $provinsi = Security::xss_input($_POST['provinsi']);
            $kontak = Security::xss_input($_POST['kontak']);
            $email = Security::xss_input($_POST['email']);

            $query = "INSERT INTO $this->table2  values
            (:id, :nama,:tgl_lahir,:nik,:jalan,:rt,:rw,:desa,:kecamatan,:kota_kabupaten,:provinsi,:kontak,:email)";

            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->bind('nama', $nama);
            $this->db->bind('tgl_lahir', $tgl_lahir);
            $this->db->bind('nik', $nik);
            $this->db->bind('jalan', $jalan);
            $this->db->bind('rt', $rt);
            $this->db->bind('rw', $rw);
            $this->db->bind('desa', $desa);
            $this->db->bind('kecamatan', $kecamatan);
            $this->db->bind('kota_kabupaten', $kota_kabupaten);
            $this->db->bind('provinsi', $provinsi);
            $this->db->bind('kontak', $kontak);
            $this->db->bind('email', $email);

            $this->db->execute();

            
            return $this->db->rowCount();
        }
    }

//update
    public function update()
    {
        $id = intval(Security::xss_input($_POST['user']));
        $username = Security::xss_input($_POST['username']);
        $status = Security::xss_input($_POST['status']);
        $pass = isset($_POST['reset_password']) ? $_POST['reset_password']  : "";

        $pass = $pass == 'reset' ? Security::pass_hash($username) : "";

        $password = !empty($pass)  ? ",password = :pass" : "";

        $query = "update $this->table set
            username = :username,
            status_akun = :status
            $password
            where id = :id

        ";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('username', $username);

        $this->db->bind('status', $status);
        // var_dump($this->db,$_POST) or die;
        if (!empty($password)) {
            $this->db->bind('pass', $pass);
        }

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update_akses()
    {
        $id = intval(Security::xss_input($_POST['user']));
        $username = Security::xss_input($_POST['username']);
        $akses = Security::xss_input($_POST['akses']);
        $status = Security::xss_input($_POST['status']);


        $query = "update $this->table1 set
        akses = :akses,
        id_user= :username,
            status_akses   = :status
            updated_at   = sysdate()
            where id = :id

        ";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('akses', $akses);
        $this->db->bind('username', $username);

        $this->db->bind('status', $status);


        $this->db->execute();

        return $this->db->rowCount();
    }

    
    public function update_detail()
    {
        $id = intval(Security::xss_input($_POST['user']));
        $nama = Security::xss_input($_POST['nama']);
        $tgl_lahir = Security::xss_input($_POST['tgl_lahir']);
        $nik = Security::xss_input($_POST['nik']);
        $jalan = Security::xss_input($_POST['jalan']);
        $rt = Security::xss_input($_POST['rt']);
        $rw = Security::xss_input($_POST['rw']);
        $desa = Security::xss_input($_POST['desa']);
        $kecamatan = Security::xss_input($_POST['kecamatan']);
        $kota_kabupaten = Security::xss_input($_POST['kota_kabupaten']);
        $provinsi = Security::xss_input($_POST['provinsi']);
        $kontak = Security::xss_input($_POST['kontak']);
        $email = Security::xss_input($_POST['email']);


        $query = "update $this->table2 set        
        nama = :nama,
        tgl_lahir =  :tgl_lahir,
        nik = :nik,
        jalan = :jalan,
        rt = :rt,
        rw = :rw,
        desa = :desa,
        kecamatan = :kecamatan,
        kota_kabupaten = :kota_kabupaten,
        provinsi = :provinsi,
        kontak = :kontak,
        email = :email
        where id_user = :id
        ";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('email', $email);
        $this->db->bind('kontak', $kontak);
        $this->db->bind('provinsi', $provinsi);
        $this->db->bind('kota_kabupaten', $kota_kabupaten);
        $this->db->bind('kecamatan', $kecamatan);
        $this->db->bind('desa', $desa);
        $this->db->bind('rw', $rw);
        $this->db->bind('rt', $rt);
        $this->db->bind('jalan', $jalan);
        $this->db->bind('nik', $nik);
        $this->db->bind('tgl_lahir', $tgl_lahir);
        $this->db->bind('nama', $nama);
        

        $this->db->execute();

        return $this->db->rowCount();
    }
}
