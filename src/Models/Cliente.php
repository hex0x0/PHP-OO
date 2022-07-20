<?php

    namespace Lucas\Comercial\Models;
    class Cliente extends Pessoa
    {

        private string $dataNascimento;
        private float $renda;

        public function __construct(string $nome, int $idade, Endereco $endereco, string $dataNascimento, float $renda)
        {
            parent::__construct($nome, $idade, $endereco);
            $this->dataNascimento = $dataNascimento;
            $this->renda = $renda;            
        }

        public function getDataNascimento()
        {
            return $this->dataNascimento;
        }

        public function setDataNascimento(string $dataNascimento)
        {
            $this->dataNascimento = $dataNascimento;
        }

        public function getRenda()
        {
            return $this->renda;
        }        

        public function setRenda(float $renda)
        {
            $this->renda = $renda;
        }

        public function setDesconto():void{
            $this->desconto = 0.05;
        }

        public function __toString()
        {
            return "<p>" . $this->nome . "</p>";
        }

    }