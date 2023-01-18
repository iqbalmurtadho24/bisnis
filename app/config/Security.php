<?php

final class Security  extends Controller
{
   private static $max_time_token = 60; //s

   // private   static string  $FORM = 
   // "6250655368566D5970337336763979244226452948404D635166546A576E5A7234743777217A25432A462D4A614E645267556B58703273357638782F413F4428472B4B6250655368566D597133743677397A244226452948404D635166546A576E5A7234753778214125442A462D4A614E645267556B58703273357638792F423F4528482B4B6250655368566D597133743677397A24432646294A404E635166546A576E5A7234753778214125442A472D4B6150645367556B58703273357638792F423F4528482B4D6251655468576D597133743677397A24432646294A404E635266556A586E327234753778214125442A472D4B6150645367566B59703373367638792F423F4528482B4D6251655468576D5A7134743777217A24432646294A404E635266556A586E3272357538782F413F442A472D4B6150645367566B59703373367639792442264529482B4D6251655468576D5A7134743777217A25432A462D4A614E635266556A586E3272357538782F413F4428472B4B6250655368566B5970337336763979244226452948404D635166546A576E5A7134743777217A25432A462D4A614E645267556B58703273357538782F413F4428472B4B6250655368566D5971337436773979244226452948404D635166546A576E5A7234753778214125432A462D4A614E645267556B58703273357638792F423F4528472B";

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

   public static function pass_hash($value)
   {
      return password_hash($value, PASSWORD_BCRYPT);
   }
   
   public static function pass_verify($value, $hash): bool
   {
      return password_verify($value, $hash);
   }  


}
