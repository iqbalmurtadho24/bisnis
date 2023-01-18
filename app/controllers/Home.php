<?php
class Home extends Controller
{
  private $judul = "Home";
  public function index()
  {
    $data['judul'] = $this->judul;
    $this->view('home/index', $data);
  }

  public function login($pesan ="",$tipe = "")
  {
    $data['judul'] = $this->judul;
    if (!empty($pesan) && !empty($tipe) ) {        
      $data['pesan'] = flasher::setFlash($pesan, $tipe);
   }
    $this->view('home/login', $data);
  }

  public function do_login()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $login =  SessionManager::login();
      
      if ($login !== false ) {
        header("Location:" . BASEURL.$login[0]['akses']);
        exit(0);
      } else {
        self::login('Periksa Kembali Masukan Anda', 'error');
      }
    } else {
      self::login('gagal', 'error');
    }
  }

  public function logout()
  {
    SessionManager::logout();
  }
}
