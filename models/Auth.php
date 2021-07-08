<?php

    require_once 'dao/UserDaoMySql.php';    

    class Auth {
        private $pdo;
        private $base;

        public function __construct(PDO $driver, $base) {
            $this->pdo = $driver;
            $this->base = $base;
        }

        public function checkToken() {
            if(!empty($_SESSION['token'])){

                $token = $_SESSION['token'];

                $userDao = new UserDaoMySql($this->pdo);
                $user = $userDao->findByToken($token);

                if($user){

                    return $user;

                }


            }

            header("Location:".$this->base."login.php");
            exit;

        }

        public function validadeLogin($email, $password) {
            $userDao = new UserDaoMySql($this->pdo);
            $user = $userDao->findByEmail($email);
             
            if($user) {
                
                if(password_verify($password, $user->password)) {
                    echo 'Cheguei aqui!!!';
                    exit;
                    
                    $token = md5(time().rand(0,9999));

                    $_SESSION['token'] = $token;
                    $user->token = $token;
                    $userDao->update($user);
                    

                    return true;
                    
                }
            }

            return false;
        }

        public function emailExists($email) {
            $userDao = new UserDaoMySql($this->pdo);
            
            if($userDao->findByEmail($email)){
                return true;
            } else {
                return false;
            }

        }

        public function registerUser($name, $email, $password, $birthdate){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $token = md5(time().rand(0,9999));

            $userDao = new UserDaoMySql($this->pdo);
            $newUser = new User();
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = $hash;
            $newUser->birthdate = $birthdate;
            $newUser->token = $token;

            $userDao->insert($newUser);

            $_SESSION['token'] = $token;
        }

    }