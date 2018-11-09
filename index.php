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

session_start();
    $_SESSION['clientesJuridicos'][0] = new ClienteJuridico('', '', '', '', '');
    $_SESSION['clientesFisicos'][0] = new ClienteFisico('', '', '', '', '');

if(isset($_POST['novo'])) {
    if ($_POST['novo'] == "juridico") {
        $clienteJuridico = new ClienteJuridico($_POST['nome'], $_POST['idade'], $_POST['endereco'], $_POST['cpfoucnpj'], $_POST['importancia']);
        if (isset($_POST['enderecoCobranca']))
        {
            $clienteJuridico->setEnderecoCobranca($_POST['endereco2']);
        }
        else
        {
            $clienteJuridico->setEnderecoCobranca($_POST['endereco']);
        }
        array_push($_SESSION['clientesJuridicos'], $clienteJuridico);
    }
    if ($_POST['novo'] == "fisico")
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
        array_push($_SESSION['clientesFisicos'], $clienteFisico);
    }
    header("location:/src/SON/Cliente/Util/lista.php");
}
?>
<form action="src/SON/Cliente/Util/lista.php" method="get">
    <input type="hidden" name="sort" value="cresc">
    <input type="submit" value="Ir para a Lista" class="btn btn-primary">
</form>
