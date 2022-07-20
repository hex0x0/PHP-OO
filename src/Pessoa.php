<?php

    //palavra reservada class
    //atributos e comportamentos

    abstract class Pessoa
    {

        // public string $nome;
        // public int $idade;

        protected string $nome;
        protected int $idade;
        protected Endereco $endereco;
        //protected - compartilhado entre as classes filhas

        protected float $desconto;
        private static $qtde_pessoas;

        //Método construtor -> usado automaticamente quando instaciamos um objeto

        //visibilidade e encapsulamento

        public function __construct(string $nome, int $idade, Endereco $endereco)
        {   
            $this->nome = $nome;
            $this->idade =$idade;
            $this->endereco = $endereco;
            $this->setDesconto();   //define o desconto 
            $this->validaIdade($idade);

            //:: faz referência a um atributo estático
            //Nome da minha classe:: 
            //Método mais moderno - self
            self::$qtde_pessoas++;
           
        }

        //destrutor

        //É executado quando um objetivo deixa de existir

        public function __destruct()
        {
            self::$qtde_pessoas--;

        }


        //além do método construtor, existe o destrutor

        //Métodos acessores dão acesso aos dados

        public function getNome():string
        {
           return $this->nome;
        }

        public function setNome(string $nome):void
        {
            $this->nome = $nome;
        }

        public function getIdade(){
            return $this->idade;
        }

        public function setIdade(int $idade)
        {
            $this->idade = $idade;
        }

        public static function getNumDePessoas()
        {
            return self::$qtde_pessoas;
        }

        //método específico

        private function validaIdade($idade)
        {
            if($this->idade >= 0 AND $this->idade < 120){
                $this->idade = $idade;
            }else{
                echo 'Idade invalida';
                exit;
            }
        }


        protected abstract function setDesconto():void;

        public function getDesconto()
        {
            return $this->desconto;
        }

        public abstract function __toString():string;
    }