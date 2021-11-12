<?php
    namespace App\Controller;
    use Core\BaseController;
    use App\Model\User;

    class UserController extends BaseController
    {
        public function showRegister() {
            if (isset($_SESSION['user'])) {
                header("Location: /");
            } else {
                view('auth/register');
            }
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
            if (isset($_SESSION['user'])) {
                header("Location: /");
            } else {
                view('auth/login');
            }
        }

        public function login() {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $fetchUser = $user->findOne(['email' => $email]);

            try {
                if (! $fetchUser) {
                    throw new \Exception();   
                }
                if (! password_verify($password, $fetchUser['password'])) {
                    throw new \Exception();
                }
                unset($fetchUser['password']);
                $_SESSION['user'] = $fetchUser;
                header("Location: /");
            } catch (\Exception $e) {
                $_SESSION['error_once'] = 'Email or password is incorrect!';
                header("Location: /login");
            }
        }

        public function logout() {
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
            }
            header("Location: /login");
        }
    }