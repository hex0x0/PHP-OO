<?php


    namespace Lucas\Comercial\Dominio\Models;
    use DateTimeInterface;

   require_once('autoload.php');

   class Funcionario extends Pessoa implements Autenticar
   {
        protected ?int $id;
        private string $cargo;
        private float $salario;
        private string $senha;
        public function __construct(?int $id, string $nome, DateTimeInterface $dataNascimento, Endereco $endereco, string $cargo, float $salario)
        {
            //Pessoa tem atributos e métodos atrelados a ela
            parent::__construct($id, $nome, $dataNascimento, $endereco);
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
            return "<br>Data de nascimento:" . $this->getDataNascimento()->format('d/m/Y') . 
            "<br>Nome:" . $this->nome . "<br> End: " . $this->endereco->getNomeLogradouro() . "<br>";
        }


        public function login(string $nome, string $senha):void
        {
            if($this->nome === $nome && $this->senha === $senha)
            {
                echo "<p>[Login autorizado]</p>";
            }else{
                echo "<p>[Usuário não autenticado]</p>";
            }
        }

        public function setSenha(string $senha){
            $this->senha = $senha;
        }

   }
