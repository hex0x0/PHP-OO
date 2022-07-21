<?php

    spl_autoload_register(function(string $nomeDaClasse){

        $caminho_completo = str_replace('Lucas\\Comercial', 'src', $nomeDaClasse);
        $caminho_arquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminho_completo);

        $caminho_arquivo .= '.php';

        if(file_exists($caminho_arquivo)){
            require_once $caminho_arquivo;
        }

    });