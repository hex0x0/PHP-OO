<?php

    class Endereco
    {
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

        
        
    }