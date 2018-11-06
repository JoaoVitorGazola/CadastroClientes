<?php
/**
 * Created by PhpStorm.
 * User: joaov
 * Date: 11/6/2018
 * Time: 8:27 AM
 */

class ClienteFisico extends Cliente
{
    private $cpf;
    private $tipo = "Fisico";
    public function __construct($nomeNovo, $idadeNovo, $enderecoNovo, $cpfNovo)
    {
        $this->setCpf($cpfNovo);
        parent::__construct($nomeNovo, $idadeNovo, $enderecoNovo);
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getTipo()
    {
        return $this->tipo;
    }

}