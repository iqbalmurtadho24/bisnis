<?php

class SessionManager extends Controller
{

    private  static  string   $SECRET_KEY =
    "4D635166546A576E5A7234753778217A25432A462D4A614E645267556B58703273357638792F423F4428472B4B6250655368566D597133743677397A244326462948404D635166546A576E5A7234753778214125442A472D4B614E645267556B58703273357638792F423F4528482B4D6251655368566D597133743677397A24432646294A404E635266556A576E5A7234753778214125442A472D4B6150645367566B59703273357638792F423F4528482B4D6251655468576D5A7134743677397A24432646294A404E635266556A586E3272357538782F4125442A472D4B6150645367566B59703373367639792442264528482B4D6251655468576D5A7134743777217A25432A462D4A404E635266556A586E3272357538782F413F4428472B4B6250645367566B5970337336763979244226452948404D6351665468576D5A7134743777217A25432A462D4A614E645267556B586E3272357538782F413F4428472B4B6250655368566D5971337336763979244226452948404D635166546A576E5A7234753777217A25432A462D4A614E645267556B58703273357638792F413F4428472B4B6250655368566D597133743677397A244326452948404D635166546A576E5A7234753778214125442A472D4A614E645267556B58703273357638792F423F4528482B4D6250655368566D597133743677397A24432646294A";


    private static $cookie_name = 'X-PZN-SESSION';
    private static $cookie_expired = 9999 ; 
    // 5 * 60*2000000000000;



    public static function login()
    {

        $data = new Controller;
        $hasil = $data->model('User_model')->login();

        if (is_array($hasil)) {


            $hasil['session'] = Security::pass_hash(bin2hex(random_bytes(255)));

            $data->model('User_model')->set_session($hasil);
            $jwt = self::jwt_encode($hasil, $hasil['session']);
            self::set_cookies($jwt);
            $access = $data->model('User_model')->get1($hasil['id']);

            return $access;
        } else {
            return false;
        }
    }


    public static function getCurrentUser()
    {
        if (isset($_COOKIE[self::$cookie_name])) {


            try {

                $payload = self::jwt_decode();
                $data = new Controller;
                $hasil = $data->model('User_model')->session([$payload['id'], $payload['nama']]);

                if ($hasil) {

                    $expired = (strtotime($hasil['last_access'] . " +" . self::$cookie_expired . " second"));

                    $now = strtotime("Y-m-d H:i:s");
                    if ($now < $expired) {

                        $jwt =  self::jwt_encode($payload, $payload['id']);
                        self::set_cookies($jwt);
                        $data->model('User_model')->set_session($hasil);

                        $access = self::access($hasil['id']);
                        $class = self::class();

                        if (!empty($access) && in_array($class[0], $access)) {
                            return ['id'=>$hasil['id'],'nama' => $hasil['nama'], 'akses' =>  $access];
                        } else {
                            header("location:" . BASEURL);
                            exit();
                        }
                    } else {
                        header("location:" . BASEURL);
                        exit();
                    }
                }else{
                    
                header("location:" . BASEURL);
                exit();
                }
            } catch (Exception  $exception) {

                header("location:" . BASEURL);
                exit();
            }
        } else {
            header("location:" . BASEURL);
            exit();
        }
    }

    
    private static function access(int $access)
    {
        $data = new Controller;

        $akses = $data->model('User_model')->get1($access);

        if (!empty($akses)) {
            $a = [];

            foreach ($akses as  $value) {

                array_push($a, $value['akses']);
            }

            return $a;
        } else {
            return [];
        }
    }
    public static function logout()
    {
        if (isset($_COOKIE[self::$cookie_name])) {
            $url = self::url();
            $option = [
                'expires' => 1,
                'path' => '/',
                'domain' => $url[2],
                'secure' => true,
                'httponly' => true,
                'samesite' => 'strict'
            ];
            $data = new Controller;
            $payload = self::jwt_decode();
            $data->model('User_model')->delete_session($payload);
            setcookie(self::$cookie_name, '', $option);
        }

        try {
            header("Location:" . BASEURL);
        } catch (exception $exception) {
            header("Location:" . BASEURL . "home/logout");
        }
    }

    private static function set_cookies(string $value)
    {
        $url = self::url();
        $option = [
            'expires' => time() + self::$cookie_expired,
            'path' => '/',
            'domain' => $url[2],
            'secure' => true,
            'httponly' => true,
            'samesite' => 'strict'
        ];
        setcookie(self::$cookie_name, $value, $option);
    }


    private static function class()
    {
        if (isset($_GET) && !empty($_GET)) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            return [0];
        }
    }


    private static function url()
    {
        return explode("/", BASEURL);
    }

    private static function jwt_encode(array $hasil, $id)
    {
        require_once "../app/libraries/vendor/autoload.php";

        $payload = [
            "id" => $id,
            "nama" => $hasil['nama'],
        ];
        $jwt = \Firebase\JWT\JWT::encode($payload, self::$SECRET_KEY, 'HS256');
        return $jwt;
    }

    private static function jwt_decode()
    {
        require_once "../app/libraries/vendor/autoload.php";
        $jwt = $_COOKIE[self::$cookie_name];

        $payload =  \Firebase\JWT\JWT::decode($jwt, SessionManager::$SECRET_KEY, ['HS256']);
        return (array) $payload;
    }
}
