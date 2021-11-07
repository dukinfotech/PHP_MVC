<?php
    namespace App\Controller;
    use Core\BaseController;
    use App\Model\User;

    class UserController extends BaseController
    {
        public function showRegister() {
            view('auth/register');
        }

        public function register() {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $user = new User();
            $isSuccess = $user->store([
                'name' => $name,
                'email' => $email,
                'password' => $password_hash
            ]);
            
            view('auth/login', ['isSuccess' => $isSuccess]);
        }

        public function showLogin() {
            view('auth/login');
        }

        public function login() {
            $isLogin = false;
            $email = $postData['email'];
            $password = $postData['password'];

            $user = new User();
            $fetchUser = $user->findOne(['email' => $email]);
            
            if ($fetchUser) {
                if (password_verify($password, $fetchUser['password'])) {
                    $isLogin = true;
                    $_SESSION['isLogin'] = true;
                }
            }

            return $isLogin;
        }
    }