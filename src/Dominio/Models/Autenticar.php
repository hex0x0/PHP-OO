<?php

    namespace Lucas\Comercial\Dominio\Models;
    interface Autenticar
    {
        public function login(string $nome, string $senha):void;

    }