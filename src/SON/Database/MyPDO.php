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

            }catch (PDOException $PDOException){
                var_dump($PDOException);
            }
        }
    }
    public function persistir(Cliente $clienteNovo){
        try {
            $sql = $this;
            $nome = $clienteNovo->getNome();
            $endereco = $clienteNovo->getEndereco();
            $enderecoCobranca = $clienteNovo->getEnderecoCobranca();
            $idade = $clienteNovo->getIdade();
            $importancia = $clienteNovo->getImportancia();
            $cpfouCnpj = $clienteNovo->getCpfouCnpj();
            $fisicoouJuridico = $clienteNovo->getFisicooujuridico();
            $pdoResult = $sql->prepare("INSERT INTO clientes(`id`, `nome`, `idade`, `endereco`, `enderecoCobranca`, `cpfoucnpj`, `fisicooujuridico`, `importancia`, `created_at`) VALUES ( NULL, :nome, :idade, :endereco, :enderecoCobranca, :cpfouCnpj, :fisicoouJuridico, :importancia, CURRENT_TIMESTAMP)");

            $pdoExec = $pdoResult->execute(array(":nome"=>$nome,":idade"=>$idade,":endereco"=>$endereco, ":enderecoCobranca"=>$enderecoCobranca, ":cpfouCnpj"=>$cpfouCnpj, ":fisicoouJuridico"=>$fisicoouJuridico, ":importancia"=>$importancia));

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
