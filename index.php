<?php
/**
 * Created by PhpStorm.
 * User: joaov
 * Date: 11/6/2018
 * Time: 8:25 AM
 */

define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

use SON\Cliente\Types\ClienteFisico;
use SON\Cliente\Types\ClienteJuridico;
use SON\Database\MyPDO;
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbclientes";
$_SESSION['servername'] = $servername;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['dbname'] = $dbname;
    $pdo = MyPDO::conectar($servername, $username, $password, $dbname);
if(isset($_POST['novo'])) {
    if ($_POST['novo'] == 1) {
        $clienteJuridico = new ClienteJuridico($_POST['nome'], $_POST['idade'], $_POST['endereco'], $_POST['cpfoucnpj'], $_POST['importancia']);
        if (isset($_POST['enderecoCobranca']))
        {
            $clienteJuridico->setEnderecoCobranca($_POST['endereco2']);
        }
        else
        {
            $clienteJuridico->setEnderecoCobranca($_POST['endereco']);
        }
        $clienteNovo = $clienteJuridico;
    }
    if ($_POST['novo'] == 2)
    {
        $clienteFisico= new ClienteFisico($_POST['nome'], $_POST['idade'], $_POST['endereco'], $_POST['cpfoucnpj'], $_POST['importancia']);
        if (isset($_POST['enderecoCobranca']))
        {
            $clienteFisico->setEnderecoCobranca($_POST['endereco2']);
        }
        else
        {
            $clienteFisico->setEnderecoCobranca($_POST['endereco']);
        }
        $clienteNovo = $clienteFisico;
    }
    $pdo->persist($clienteNovo);
    header("location:/src/SON/Cliente/Util/lista.php");
}
?>
<form action="src/SON/Cliente/Util/lista.php" method="get">
    <input type="hidden" name="sort" value="cresc">
    <input type="submit" value="Ir para a Lista" class="btn btn-primary">
</form>
