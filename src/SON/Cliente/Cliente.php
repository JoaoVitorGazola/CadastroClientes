<?php
/**
 * Created by PhpStorm.
 * User: joaov
 * Date: 10/29/2018
 * Time: 12:33 PM
 */
 namespace SON\Cliente;
class Cliente
{
    private $nome;
    private $idade;
    private $endereco;
    private $enderecoCobranca;
    private $importancia;

    public function __construct($nomeNovo, $idadeNovo, $enderecoNovo, $importanciaNovo)
    {
        $this->setNome($nomeNovo);
        $this->setIdade($idadeNovo);
        $this->setEndereco($enderecoNovo);
        $this->setImportancia($importanciaNovo);
    }
    public function setNome($nomeNovo){
        $this->nome = $nomeNovo;
    }
    public function setIdade($idadeNovo){
        $this->idade = $idadeNovo;
    }
    public function setEndereco($enderecoNovo){
        $this->endereco = $enderecoNovo;
    }
    public function setEnderecoCobranca($enderecoCobranca)
    {
        $this->enderecoCobranca = $enderecoCobranca;
    }
    public function setImportancia($importancia)
    {
            $this->importancia = $importancia;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getIdade()
    {
        return $this->idade;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function getEnderecoCobranca()
    {
        return $this->enderecoCobranca;
    }
    public function getImportancia()
    {
        return $this->importancia;
    }
}