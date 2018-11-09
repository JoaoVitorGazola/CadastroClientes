<?php
/**
 * Created by PhpStorm.
 * User: joaov
 * Date: 11/6/2018
 * Time: 8:27 AM
 */
namespace SON\Cliente\Types;
use SON\Cliente\Cliente;

class ClienteFisico extends Cliente
{
    private $cpf;
    private $tipo = "Fisico";
    public function __construct($nomeNovo, $idadeNovo, $enderecoNovo, $cpfNovo, $importanciaNovo)
    {
        $this->setCpf($cpfNovo);
        parent::__construct($nomeNovo, $idadeNovo, $enderecoNovo, $importanciaNovo);
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