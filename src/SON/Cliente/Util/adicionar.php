<?php

namespace SON\Cliente\Util;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="container container-fluid ">
<h1>
    Insira os dados do novo cliente:
</h1>
<div>
<form action="../../../../index.php" method="post">
    <label name="nome">Nome</label>
    <input type="text" name="nome" class="form-control">
    <label name="idade">Idade</label>
    <input type="text" name="idade" class="form-control">
    <label name="endereco">Endereço</label>
    <input type="text" name="endereco" class="form-control">
    <input type="checkbox" name="enderecoCobranca"> Endereço diferente para Cobrança?<br>
    <label name="cpf">Endereço para cobrança:</label>
    <input type="text" name="endereco2" class="form-control" placeholder="Preencher apenas se a caixa acima for marcada">
    <label name="importancia">Importancia:</label>
    <input type="radio" name="importancia" value="1">1
    <input type="radio" name="importancia" value="2">2
    <input type="radio" name="importancia" value="3">3
    <input type="radio" name="importancia" value="4">4
    <input type="radio" name="importancia" value="5">5<br>
    <input type="radio" name="novo" value="fisico" checked> Pessoa Fisica
    <input type="radio" name="novo" value="juridico"> Pessoa Juridica<br>
    <label name="cpf">CPF ou CNPJ</label>
    <input type="text" name="cpfoucnpj" class="form-control">
    <input type="submit" name="salvar" value="Salvar" class="btn btn-info m-2">
</form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>