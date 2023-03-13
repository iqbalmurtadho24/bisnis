<?php

final class Security  extends Controller
{

   public static string $img_santri = "img/santri/"; 
   public function __construct()
   {
      $data = new Controller;
      
      unset($data);                
      $this->xss_protection();
      $this->same_origin();
   }

   private function same_origin()
   {
      header('Access-Control-Allow-Origin:'.BASEURL);
   }

   private function xss_protection()
   {
      header("X-XSS-Protection: 1; mode=block");
   }

   // public  static function csrf_time()
   // {
   //    $expired = (strtotime($hasil['last_access']." +".self::$cookie_expired." second") );
   //    $now = strtotime("Y-m-d H:i:s");             

   // }


   // public static function csrf_token()
   // {
   //    if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST)) {
   //       if ($_POST['token'] == $_SESSION['token']) {
   //          return 1;
   //       } else {
   //          session_destroy();
   //          return 0;
   //       }
   //    }
   //    return 0;
   // }

   // public static function token_validasi($value): bool
   // {
   //    return $_SESSION['token'] == $value ?: false;
   // }

   public static function  xss_input($value)
   {
      
         return  htmlspecialchars(strip_tags($value, '<b><i>'), ENT_IGNORE | ENT_HTML401 | ENT_QUOTES | ENT_SUBSTITUTE);

   }

   public static function max_file(int $val,int $max)
   {
       return $val > $max ;
   }

   public static function ex_file(string $location)
   {
       return pathinfo($location, PATHINFO_EXTENSION) ;
   }

   public static function remove_img(string $file )
   {
      // chmod("../public/".self::$img_santri.$file.".jpg", 0777);
 
      unlink( "../public/".self::$img_santri.$file.".jpg");
   }
   public static function random($int)
   {
       return  bin2hex(random_bytes($int));
   }

   public static function pass_hash($value)
   {
      return password_hash($value, PASSWORD_BCRYPT);
   }
   
   public static function pass_verify($value, $hash): bool
   {
      return password_verify($value, $hash);
   }  


}
