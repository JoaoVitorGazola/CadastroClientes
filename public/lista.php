<?php

require "C:/Users/joaov/Documents/GitHub/CadastroClientes/Classes/Cliente.php";
require "C:/Users/joaov/Documents/GitHub/CadastroClientes/Classes/ClienteJuridico.php";
require "C:/Users/joaov/Documents/GitHub/CadastroClientes/Classes/ClienteFisico.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="container container-fluid ">

<table class="table table-striped table-condensed table-bordered table-responsive">
    <thead><tr>
        <th><p class="m-2 float-left">Lista de Clientes</p>
        <a href="adicionar.php" class="float-right m-2">Adicionar cliente</a> </th>
        </tr>
    <tr>
        <th><form method="get">
                <input type="radio" name="sort" value="cresc" <?php if(isset($_GET['sort'])){if ($_GET['sort']=="cresc"){echo 'checked';}} ?>> Crescente
                <input type="radio" name="sort" value="decr" <?php if(isset($_GET['sort'])){if ($_GET['sort']=="decr"){echo 'checked';}} ?>> Decrescente<br>
                <input type="submit" class="btn btn-info" value="Aplicar">
            </form></th>
    </tr>
    </thead>
<tbody>

<?php
$clientesFisicos = array_slice($_SESSION['clientesFisicos'], 1);
$clientesJuridicos = array_slice($_SESSION['clientesJuridicos'], 1);


if (isset($_GET['sort'])) {
        if ($_GET['sort'] == "decr") {
            usort($clientesFisicos, function ($first, $second) {
                return strtolower($first->getNome()) < strtolower($second->getNome());
            });
            usort($clientesJuridicos, function ($first, $second) {
                return strtolower($first->getNome()) < strtolower($second->getNome());
            });
        }
        if ($_GET['sort'] == "cresc") {
            usort($clientesFisicos, function ($first, $second) {
                return strtolower($first->getNome()) > strtolower($second->getNome());
            });
            usort($clientesJuridicos, function ($first, $second) {
                return strtolower($first->getNome()) > strtolower($second->getNome());
            });
        }
    }    ?>

        <tr>
            <td class="m-2">Fisicos</td>
            <?php     foreach ($clientesFisicos as $cliente) {
                ?>
            <td class=" float-left m-2">
                <form action="cliente.php" method="post">
                    <input type="hidden" name="get" value="<?php echo $_GET['sort']?>">
                    <input type="hidden" name="idade" value="<?php echo $cliente->getIdade()?>">
                    <input type="hidden" name="endereco" value="<?php echo $cliente->getEndereco()?>">
                    <input type="hidden" name="enderecoCobranca" value="<?php echo $cliente->getEnderecoCobranca()?>">
                    <input type="hidden" name="cpf" value="<?php echo $cliente->getCpf()?>">
                    <input type="hidden" name="tipo" value="<?php echo $cliente->getTipo()?>">
                    <input type="submit" class="btn btn-info" name="nome" value="<?php echo $cliente->getNome()?>">
                </form>
            </td>

                <?php
                }
                ?>
        </tr>
<tr>
    <td class="m-2">Jurídicos:</td>
    <?php                 foreach ($clientesJuridicos as $cliente) {
            ?>
                        <td  class="float-left m-2">
                <form action="cliente.php" method="post">
                    <input type="hidden" name="get" value="<?php echo $_GET['sort']?>">
                    <input type="hidden" name="idade" value="<?php echo $cliente->getIdade()?>">
                    <input type="hidden" name="endereco" value="<?php echo $cliente->getEndereco()?>">
                    <input type="hidden" name="enderecoCobranca" value="<?php echo $cliente->getEnderecoCobranca()?>">
                    <input type="hidden" name="cnpj" value="<?php echo $cliente->getCnpj()?>">
                    <input type="hidden" name="tipo" value="<?php echo $cliente->getTipo()?>">
                    <input type="submit" class="btn btn-info" name="nome" value="<?php echo $cliente->getNome()?>">
                </form>
            </td>
                <?php
            }
            ?>
        </tr>

</tbody>
</table>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>