<?php
namespace SON\Cliente\Util;
/**
 * Created by PhpStorm.
 * User: joaov
 * Date: 11/1/2018
 * Time: 10:48 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_POST['nome'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="container container-fluid ">

<div>
    <table class="table table-striped table-condensed table-bordered table-responsive">
        <thead>
        <strong><?php echo $_POST['nome'] ?></strong>
        <tr>
            <th>Idade</th>
            <th>Endereço</th>
            <th>Endereço de Cobrança</th>
            <?php
            if(isset($_POST['cpf'])) {
                echo '<th>CPF</th>';
        }
            if(isset($_POST['cnpj'])) {
                echo '<th>CNPJ</th>';
        }
        ?>
            <th>Importancia:</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $_POST['idade']?></td>
            <td><?php echo $_POST['endereco']?></td>
            <td><?php echo $_POST['enderecoCobranca']?></td>
            <?php
            if(isset($_POST['cpf'])) {
                echo '<td>'.$_POST['cpf'].'</td>';
            }
                if(isset($_POST['cnpj'])) {
                echo '<td>'.$_POST['cnpj'].'</td>';
                }
                ?>
            <td><?php echo $_POST['importancia']?> estrelas</td>
        </tr>
        </tbody>
    </table>
</div>
<form action="lista.php?sort=<?php if(isset($_POST['get'])){echo $_POST['get'];}?>" method="post">
    <input type="submit" class="btn btn-info" value="Voltar para a lista">
</form>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
