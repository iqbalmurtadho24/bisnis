<?php



class Alamat extends Controller
{

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
    


}
