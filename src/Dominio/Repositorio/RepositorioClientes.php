<?php

    namespace Lucas\Comercial\Dominio\Repositorio;

    use Lucas\Comercial\Dominio\Models\Cliente;

    interface RepositorioClientes
    {
        public function todosClientes():array;
        public function salvar(Cliente $cliente):bool;
        public function criar(Cliente $cliente):bool;
        public function ler(Cliente $cliente):bool;
        public function atualizar(Cliente $cliente):bool;
        public function deletar(Cliente $cliente):bool;
    }