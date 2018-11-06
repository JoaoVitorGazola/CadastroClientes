<?php
/**
 * Created by PhpStorm.
 * User: joaov
 * Date: 11/6/2018
 * Time: 8:27 AM
 */

class ClienteJuridico extends Cliente
{
    private $cnpj;
    private $tipo = "Juridico";
    public function __construct($nomeNovo, $idadeNovo, $enderecoNovo, $cnpjNovo)
    {
        $this->setCnpj($cnpjNovo);
        parent::__construct($nomeNovo, $idadeNovo, $enderecoNovo);
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
}