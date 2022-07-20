<?php


    namespace Lucas\Comercial\Models;
    require_once 'autoload.php';
    class Produto
    {

        private ?int $idProduto;
        private string $nomeProduto;
        private float $preco;

        public function __construct(?int $idProduto, string $nomeProduto, float $preco)
        {
            $this->idProduto = $idProduto;
            $this->nomeProduto = $nomeProduto;
            $this->preco = $preco;
        }

        public function getIdProduto(): ?int
        {
            return $this->idProduto;
        }

        public function setIdProduto(int $idProduto): void
        {
            $this->idProduto = $idProduto;
        }

        public function getNomeProduto(): string
        {
            return $this->nomeProduto;
        }

        public function setNomeProduto(string $nomeProduto): void
        {
            $this->nomeProduto = $nomeProduto;
        }

        public function getPreco():float
        {
            return $this->preco;
        }

        public function setPreco(float $preco)
        {
            $this->preco = $preco;
        }


    }