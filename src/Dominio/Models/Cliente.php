<?php

    namespace Lucas\Comercial\Dominio\Models;

    use DateTimeInterface;

    class Cliente extends Pessoa
    {

        //private string $dataNascimento;
        
        protected ?int $id;
        private float $renda;

        public function __construct(?int $id, string $nome, DateTimeInterface $dataNascimento, Endereco $endereco, float $renda)
        {
            parent::__construct($id, $nome, $dataNascimento, $endereco);
            //$this->dataNascimento = $dataNascimento;
            $this->renda = $renda;            
        }

        // public function getDataNascimento()
        // {
        //     return $this->dataNascimento;
        // }

        // public function setDataNascimento(string $dataNascimento)
        // {
        //     $this->dataNascimento = $dataNascimento;
        // }

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
            return "<p>" . $this->nome . "</p>" . "<p>" . $this->renda . "</p>";

        }

    }