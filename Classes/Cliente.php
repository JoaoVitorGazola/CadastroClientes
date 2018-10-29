<?php
/**
 * Created by PhpStorm.
 * User: joaov
 * Date: 10/29/2018
 * Time: 12:33 PM
 */

class Cliente
{
    public $nome;
    public $idade;
    public $endereco;
    public $cpf;

    public function __construct($nomeNovo, $idadeNovo, $enderecoNovo, $cpfNovo)
    {
        this.$nome = $nomeNovo;
        this.$idade = $idadeNovo;
        this.$endereco = $enderecoNovo;
        this.$cpf = $cpfNovo;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

}