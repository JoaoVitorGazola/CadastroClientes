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
        <th>Lista de Clientes</th>
        </tr>
    <tr>
        <th><form method="get">
                <input type="radio" name="sort" value="cresc" <?php if(isset($_GET['sort'])=="cresc"||!(isset($_GET['sort']))){echo 'checked';} ?>> Crescente<br>
                <input type="radio" name="sort" value="decr" <?php if(isset($_GET['sort'])=="decr"){echo 'checked';} ?>> Decrescente
                <input type="submit" class="btn btn-info" value="Aplicar">
            </form></th>
    </tr>
    </thead>
<tbody>
<?php
include "C:/Users/joaov/Documents/GitHub/CadastroClientes/Classes/Cliente.php";


$i = 0;
while($i<10) {
    $clientes[$i] = new Cliente('Cliente ' . $i, $i * 7, 'bairro ' . ($i * 3) . ' casa ' . $i * 9, '111.111.111.1' . $i%10);
    $i += 1;
}
usort($clientes, function ($first, $second) {
    return strtolower($first->nome) > strtolower($second->nome);
});
if(isset($_GET['sort'])) {
    if ($_GET['sort'] == "decr") {
        usort($clientes, function ($first, $second) {
            return strtolower($first->nome) < strtolower($second->nome);
        });

    }
    if ($_GET['sort'] == "cresc") {
        usort($clientes, function ($first, $second) {
            return strtolower($first->nome) > strtolower($second->nome);
        });
    }
}
foreach ($clientes as $cliente) {


?>
<tr>

        <td><form action="cliente.php" method="post">
                <input type="hidden" name="idade" value="<?php echo $cliente->idade ?>">
                <input type="hidden" name="endereco" value="<?php echo $cliente->endereco ?>">
                <input type="hidden" name="cpf" value="<?php echo $cliente->cpf ?>">
                <input type="hidden" name="get" value="<?php echo $_GET['sort']?>">
                <input type="submit" class="btn btn-info" name="nome" value="<?php echo $cliente->nome ?>">
            </form></td>
</tr>
<?php
$i += 1;
}
?>
</tbody>
</table>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>