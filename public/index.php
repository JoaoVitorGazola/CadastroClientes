<?php
/**
 * Created by PhpStorm.
 * User: joaov
 * Date: 11/6/2018
 * Time: 8:25 AM
 */
require "C:/Users/joaov/Documents/GitHub/CadastroClientes/Classes/Cliente.php";
require "C:/Users/joaov/Documents/GitHub/CadastroClientes/Classes/ClienteJuridico.php";
require "C:/Users/joaov/Documents/GitHub/CadastroClientes/Classes/ClienteFisico.php";
session_start();
    $_SESSION['clientesJuridicos'][0] = new ClienteJuridico('', '', '', '');
    $_SESSION['clientesFisicos'][0] = new ClienteFisico('', '', '', '');

if(isset($_POST['novo'])) {
    if ($_POST['novo'] == "juridico") {
        $clienteJuridico = new ClienteJuridico($_POST['nome'], $_POST['idade'], $_POST['endereco'], $_POST['cpfoucnpj']);
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
        $clienteFisico= new ClienteFisico($_POST['nome'], $_POST['idade'], $_POST['endereco'], $_POST['cpfoucnpj']);
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
    header("location:/lista.php");
}

?>
<form action="lista.php" method="get">
    <input type="hidden" name="sort" value="cresc">
    <input type="submit" value="Ir para a Lista" class="btn btn-primary">
</form>
