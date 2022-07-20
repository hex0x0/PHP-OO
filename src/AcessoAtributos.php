<?php


    trait AcessoAtributos
    {
        //Métodos que vc quer compartilhar entre as classes

        public function __get(string $nomeAtributo)
        {
            $metodo = 'get' . ucfirst($nomeAtributo);

            return $this->$metodo();
        }

    }