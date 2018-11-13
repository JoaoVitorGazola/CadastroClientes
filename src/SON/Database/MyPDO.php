<?php
/**
 * Created by PhpStorm.
 * User: joaov
 * Date: 11/12/2018
 * Time: 10:39 AM
 */

namespace SON\Database;
use SON\Cliente\Cliente;
use SON\Cliente\Types\ClienteJuridico;
use SON\Cliente\Types\ClienteFisico;
use PDO;
class MyPDO extends \PDO
{

    public static function conectar($servername, $username, $password, $dbname){
        if(!isset($_SESSION['i']))
        {
            try{
                $pdo = new MyPDO("mysql:host=$servername;", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->query("CREATE DATABASE $dbname");
                $pdo->query("use $dbname");
                $pdo = null;
                $pdo = new MyPDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $table = "CREATE TABLE Clientes
        (
        id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, 
        nome VARCHAR(60) NOT NULL,
        idade INTEGER,
        endereco VARCHAR(100), 
        enderecoCobranca VARCHAR(100), 
        cpfoucnpj VARCHAR(20), 
        fisicooujuridico CHAR(1) NOT NULL, 
        importancia INTEGER, 
        created_at TIMESTAMP
        )";
                $pdo->query($table) or die(print_r($pdo->errorInfo(), true));
                $_SESSION['i'] = true;
                return $pdo;

            }catch (PDOException $PDOException){
                var_dump($PDOException);
            }
        }
    }
    public function persist(Cliente $clienteNovo){
        try {
            if ($clienteNovo->getFisicooujuridico() == 1) {
                $sql = $this->prepare("INSERT INTO Clientes(nome, idade, endereco, enderecoCobranca, fisicooujuridico, importancia)
VALUES(nome, idade, endereco, enderecoCobranca, fisicooujuridico, importancia)");
            } else if ($clienteNovo->getFisicooujuridico() == 2) {
                $sql = $this->prepare("INSERT INTO Clientes(nome, idade, endereco, enderecoCobranca, fisicooujuridico, importancia)
VALUES(nome, idade, endereco, enderecoCobranca, fisicooujuridico, importancia)");
            }
            $sql->bindValue("nome", $clienteNovo->getNome());
            $sql->bindValue("idade", $clienteNovo->getIdade());
            $sql->bindValue("endereco", $clienteNovo->getEndereco());
            $sql->bindValue("enderecoCobranca", $clienteNovo->getEnderecoCobranca());
            $sql->bindValue("fisicooujuridico", $clienteNovo->getFisicooujuridico());
            $sql->execute();

        }catch (\PDOException $PDOException){
            var_dump($PDOException);
        }
    }
    public function flush()
    {
        try{
        $sql = "FLUSH TABLES";
        $this->query($sql);
    }catch (\PDOException $PDOException){
            var_dump($PDOException);
        }
    }
}
