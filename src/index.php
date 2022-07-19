<?php

    //Toda classe tem o nome do objeto que queremos criar

    require_once 'Pessoa.php';


    $Pessoa1 = new Pessoa('Pedro', 14);

    //Setando valores de um objeto


    echo "<pre>";

    $Pessoa1->nome = 'Lucas';
    $Pessoa1->idade = 15;

    var_dump($Pessoa1);

    echo "</pre>";


    echo $Pessoa1->nome;