<?php
namespace SON\Cliente\Util;
define('CLASS_DIR', '../../../../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

use SON\Cliente\Cliente;
use SON\Cliente\Types\ClienteJuridico;
use SON\Cliente\Types\ClienteFisico;
use PDO;
use SON\Database\MyPDO;

session_start();
$servername = $_SESSION['servername'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$dbname = $_SESSION['dbname'];
$pdo = new MyPDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
        <form action="adicionar.php" method="post">
        <input type="hidden" name="get" value="<?php if(isset($_GET['sort'])){echo $_GET['sort'];}else{echo 'cresc';}?>">
            <input type="submit" class="btn btn-info" value="Adicionar cliente">
        </form>
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
$clientesFisicos = $pdo->query("SELECT * FROM clientes WHERE fisicooujuridico=2 ORDER BY nome");
$clientesJuridicos = $pdo->query("SELECT * FROM clientes WHERE fisicooujuridico=1 ORDER BY nome");

if (isset($_GET['sort'])) {
        if ($_GET['sort'] == "decr") {
            $clientesFisicos = $pdo->query("SELECT * FROM clientes WHERE fisicooujuridico=2 ORDER BY nome DESC");
            $clientesJuridicos = $pdo->query("SELECT * FROM clientes WHERE fisicooujuridico=1 ORDER BY nome DESC");
        }
        if ($_GET['sort'] == "cresc") {
            $clientesFisicos = $pdo->query("SELECT * FROM clientes WHERE fisicooujuridico=2 ORDER BY nome");
            $clientesJuridicos = $pdo->query("SELECT * FROM clientes WHERE fisicooujuridico=1 ORDER BY nome");
        }
    }    ?>

        <tr>
            <td class="m-2">Fisicos</td>
            <?php     foreach ($clientesFisicos as $cliente) {
                ?>
            <td class=" float-left m-2">
                <form action="cliente.php" method="post">
                    <input type="hidden" name="get" value="<?php echo $_GET['sort']?>">
                    <input type="hidden" name="idade" value="<?php echo $cliente['idade']?>">
                    <input type="hidden" name="endereco" value="<?php echo $cliente['endereco']?>">
                    <input type="hidden" name="enderecoCobranca" value="<?php echo $cliente['enderecoCobranca']?>">
                    <input type="hidden" name="cpf" value="<?php echo $cliente['cpfoucnpj']?>">
                    <input type="hidden" name="importancia" value="<?php echo $cliente['importancia']?>">
                    <input type="submit" class="btn btn-info" name="nome" value="<?php echo $cliente['nome']?>">
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
                    <input type="hidden" name="idade" value="<?php echo $cliente['idade']?>">
                    <input type="hidden" name="endereco" value="<?php echo $cliente['endereco']?>">
                    <input type="hidden" name="enderecoCobranca" value="<?php echo $cliente['enderecoCobranca']?>">
                    <input type="hidden" name="cnpj" value="<?php echo $cliente['cpfoucnpj']?>">
                    <input type="hidden" name="importancia" value="<?php echo $cliente['importancia']?>">
                    <input type="submit" class="btn btn-info" name="nome" value="<?php echo $cliente['nome']?>">
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