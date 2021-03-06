<?php
/**
 * Created by PhpStorm.
 * User: joaov
 * Date: 11/6/2018
 * Time: 8:27 AM
 */
namespace SON\Cliente\Types;

use SON\Cliente\Cliente;

class ClienteJuridico extends Cliente
{
    private $tipo = "Juridico";
    public function __construct($nomeNovo, $idadeNovo, $enderecoNovo, $cnpjNovo, $importanciaNovo)
    {
        $this->setCnpj($cnpjNovo);
        parent::__construct($nomeNovo, $idadeNovo, $enderecoNovo, $importanciaNovo, 1);
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function setCnpj($cnpj)
    {
        parent::setCpfouCnpj($cnpj);
    }
    public function getTipo()
    {
        return $this->tipo;
    }
}