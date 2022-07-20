<?php

    namespace Lucas\Comercial\Models;
    interface Autenticar
    {
        public function login(string $nome, string $senha):void;

    }