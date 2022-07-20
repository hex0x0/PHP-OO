<?php

    namespace Lucas\Comercial\Models;
    trait AcessoAtributos

    //namespace user\firm\Models
    {
        //Métodos que vc quer compartilhar entre as classes

        public function __get(string $nomeAtributo)
        {
            $metodo = 'get' . ucfirst($nomeAtributo);

            return $this->$metodo();
        }

    }