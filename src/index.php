<?php

    //Toda classe tem o nome do objeto que queremos criar

    require_once 'Pessoa.php';


    $Pessoa1 = new Pessoa('Pedro', 14);
    $Pessoa2 = new Pessoa('Ana', 15);
    $Pessoa3 = new Pessoa('Fabio', 111);

    //função uset serve para tirar a referência de uma variável


    unset($Pessoa3);

    // //Setando valores de um objeto


    // echo "<pre>";

    // $Pessoa1->nome = 'Lucas';
    // $Pessoa1->idade = 15;

    // var_dump($Pessoa1);

    // echo "</pre>";


    // echo $Pessoa1->nome;


    //$Pessoa1->setNome('Ana');

    echo "Nome: {$Pessoa1->getNome()}" . "<br>";

    echo "Numero de pessoas cadastradas: " . Pessoa::getNumDePessoas() . "<br>";

    


    
