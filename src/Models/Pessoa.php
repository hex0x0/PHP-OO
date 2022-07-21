<?php

    //palavra reservada class
    //atributos e comportamentos

    namespace Lucas\Comercial\Models;

    use DateTimeInterface;

    require_once 'autoload.php';

    abstract class Pessoa
    {

        // public string $nome;
        // public int $idade;

        protected string $nome;
        //protected int $idade;
        protected DateTimeInterface $dataNascimento;
        protected Endereco $endereco;
        //protected - compartilhado entre as classes filhas

        protected float $desconto;
        private static $qtde_pessoas;

        //Método construtor -> usado automaticamente quando instaciamos um objeto

        //visibilidade e encapsulamento

        public function __construct(string $nome, DateTimeInterface $dataNascimento, Endereco $endereco)
        {   
            $this->nome = $nome;
            $this->dataNascimento =$dataNascimento;
            $this->endereco = $endereco;
            $this->setDesconto();   //define o desconto 
            //$this->validaIdade($idade);

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

        public function getDataNascimento():DateTimeInterface{
            return $this->dataNascimento;
        }

        public function setDataNascimento(DateTimeInterface $dataNascimento)
        {
            $this->dataNascimento = $dataNascimento;
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

        public function idade()
        {
            return $this->dataNascimento->diff(new \DateTimeImmutable())->y;
        }


        protected abstract function setDesconto():void;

        public function getDesconto()
        {
            return $this->desconto;
        }

        public abstract function __toString():string;
    }