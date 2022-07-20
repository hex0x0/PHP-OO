<?php

   class Funcionario extends Pessoa
   {
        private string $cargo;
        private float $salario;
        public function __construct(string $nome, int $idade, Endereco $endereco, string $cargo, float $salario)
        {
            //Pessoa tem atributos e métodos atrelados a ela
            parent::__construct($nome, $idade, $endereco);
            $this->cargo = $cargo;
            $this->salario = $salario;    
        }

        public function getCargo()
        {
            return $this->cargo;
        }

        public function setCargo(string $cargo)
        {
            $this->cargo = $cargo;
        }

        public function getSalario()
        {
            return $this->salario;
        }

        public function setSalario(float $salario)
        {
            $this->salario = $salario;
        }

        public function setDesconto():void{
            $this->desconto = 0.10;
        }


        public function __toString(): string
        {
            return "<p>" . $this->nome . "</p>";
        }
   }
