<?php

class Alamat_model
{
    private  $table = 'ind_desa';
    private  $table1 = 'ind_kecamatan';
    private  $table2 = 'ind_kabupaten';
    private  $table3 = 'ind_provinsi';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // penggunaan biasa model 

    public function provinsi()
    {
        $this->db->query('SELECT * FROM '.$this->table3);

        $data = $this->db->resultSet();
        $final = [];
        foreach ($data as  $value) {
            $final[$value['nama'] ] = $value['nama'];
        }

        return $final;
    }

    public function kabupaten()
    {
        $id = Security::xss_input($_POST['id']);
        // var_dump($id) or die;
        $this->db->query('SELECT a.id_kab,a.nama FROM '.$this->table2.' a inner join '.$this->table3.' b on a.id_prov = b.id_prov   where  b.nama = :id');
        $this->db->bind('id',$id);
        $data = $this->db->resultSet();
        $final = '<option>---Pilih Kabupaten---</option>';
        foreach ($data as  $value) {
            $final .= "<option value='{$value['nama']}'>{$value['nama']} </option>";
        }

        return $final;
    }

    public function kecamatan()
    {
        $id = Security::xss_input($_POST['id']);
        
        $this->db->query('SELECT a.id_kab,a.nama FROM '.$this->table1.' a inner join '.$this->table2.' b on a.id_kab = b.id_kab   where  b.nama = :id');
        $this->db->bind('id',$id);
        $data = $this->db->resultSet();
        $final = '<option>---Pilih kecamatan---</option>';
        foreach ($data as  $value) {
            $final .= "<option value='{$value['nama']}'>{$value['nama']} </option>";
        }
        return $final;
    }

    public function kelurahan()
    {
        $id = Security::xss_input($_POST['id']);
        $this->db->query('SELECT a.nama FROM '.$this->table.' a inner join '.$this->table1.' b on a.id_kec = b.id_kec   where  b.nama = :id    ');
        $this->db->bind('id',$id);
        $data = $this->db->resultSet();
        $final = '<option>---Pilih desa---</option>';
        foreach ($data as  $value) {
            $final .= "<option value='{$value['nama']}'>{$value['nama']} </option>";
        }

        return $final;
    }

}
