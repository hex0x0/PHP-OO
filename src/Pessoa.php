<?php

    //palavra reservada class
    //atributos e comportamentos

    class Pessoa
    {

        public string $nome;
        public int $idade;

        //Método construtor -> usado automaticamente quando instaciamos um objeto

        //visibilidade e encapsulamento

        public function __construct(string $nome, int $idade)
        {   
            $this->nome = $nome;
            $this->idade = $idade;
        }

        //além do método construtor, existe o destrutor

        //Métodos acessores dão acesso aos dados

        public function getNome()
        {
           return $this->nome;
        }

        public function setNome(string $nome)
        {
            $this->nome = $nome;
        }

        public function getIdade(){
            return $this->idade;
        }

        public function setIdade(int $idade){
            $this->idade = $idade;
        }



    }