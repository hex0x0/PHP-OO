<?php


    namespace Lucas\Comercial\Dominio\Repositorio;

    use Lucas\Comercial\Models\Produto;

    interface RepositorioProdutos
    {
        public function todosProdutos():array;
        
    }