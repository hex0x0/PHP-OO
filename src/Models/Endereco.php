<?php

    namespace Lucas\Comercial\Models;
    require_once 'AcessoAtributos.php';


    class Endereco
    {
        use AcessoAtributos; //nome da minha trait
        private string $uf;
        private string $cidade;
        private string $nomeLogradouro;
        private string $numero;
        private string $bairro;
        private string $cep;

        public function __construct(string $uf, string $cidade, string $nomeLogradouro, string $numero, string $bairro, string $cep)
        {
            $this->uf = $uf;
            $this->cidade = $cidade;
            $this->nomeLogradouro = $nomeLogradouro;
            $this->numero = $numero;
            $this->bairro = $bairro;
            $this->cep = $cep;
        }


        public function getUf()
        {
            return $this->uf;
        }

        public function setUf(string $uf)
        {
            $this->uf = $uf;
        }


        public function getCidade()
        {
            return $this->cidade;
        }

        public function setCidade(string $cidade)
        {
            $this->cidade = $cidade;
        }


        public function getNomeLogradouro()
        {
            return $this->nomeLogradouro;
        }

        public function setNomeLogradouro(string $nomeLogradouro)
        {
            $this->nomeLogradouro = $nomeLogradouro;
        }

        public function getNumero()
        {
            return $this->numero;
        }

        public function setNumero(string $numero)
        {
            $this->numero = $numero;
        }

        public function getBairro()
        {
            return $this->bairro;
        }

        public function setBairro(string $bairro){
            $this->bairro = $bairro;
        }

        public function getCep()
        {
            return $this->cep;
        }

        public function setCep(string $cep)
        {
            $this->cep = $cep;
        }


        
    }