<?php
session_start();
$base = 'http://localhost/devsbookoo/';

class Conexao {

	private $host = 'localhost';
	private $dbname = 'devsbook';
	private $user = 'root';
	private $pass = '';

	public function conectar(){

		try {
            $conexao = new PDO( 
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );
            return $conexao;

        } catch (PDOException $e) {
            echo '<p> O erro é: '.$e.'</p>';
        }
	

	}
}

$conn = new Conexao;
$pdo = $conn->conectar();