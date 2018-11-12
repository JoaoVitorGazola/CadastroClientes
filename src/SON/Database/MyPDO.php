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
    private $cliente;
    public function persist(Cliente $clienteNovo){
        $this->cliente = $clienteNovo;
    }
    public function flush()
    {
        if ($this->cliente->getFisicooujuridico() == 1) {
            $sql = "INSERT INTO Clientes(nome, endereco, enderecoCobranca, cpfoucnpj, fisicooujuridico, importancia)
VALUES($this->cliente->getNome(), $this->cliente->getEndereco(), $this->cliente->getEnderecoCobranca(), $this->cliente->getCnpj(), $this->cliente->getFisicooujuridico(), $this->cliente->getImportancia())";
        }
        else if($this->cliente->getFisicooujuridico == 2){
            $sql = "INSERT INTO Clientes(nome, endereco, enderecoCobranca, cpfoucnpj, fisicooujuridico, importancia)
VALUES($this->cliente->getNome(), $this->cliente->getEndereco(), $this->cliente->getEnderecoCobranca(), $this->cliente->getCpf(), $this->cliente->getFisicooujuridico(), $this->cliente->getImportancia())";
        }
        $pdo = new PDO("mysql:host=$servername;dbname=cadastroClientes", $username, $password);
    }
}
