<?php

    //Toda classe tem o nome do objeto que queremos criar

    // require_once 'src/Models/Pessoa.php';
    // require_once 'src/Models/Endereco.php';
    // require_once 'src/Models/Funcionario.php';
    // require_once 'src/Models/Cliente.php';


    require_once 'autoload.php';

    use Lucas\Comercial\Infraestrutura\Persistencia\CriadorConexao;
    use Lucas\Comercial\Dominio\Models\Pessoa;
    use Lucas\Comercial\Dominio\Models\Endereco;
    use Lucas\Comercial\Dominio\Models\Funcionario;
    use Lucas\Comercial\Dominio\Models\Cliente;
    use Lucas\Comercial\Dominio\Models\Produto;
    use Lucas\Comercial\Dominio\Repositorio\RepositorioProdutos;
    use Lucas\Comercial\Infraestrutura\Repositorio\PdoRepositorioProduto;

    $Endereco1 = new Endereco('DF', 'Brasília', 'Estrutural', '05', 'Quadra 05 conj. 19', '71256245');

    // $Pessoa1 = new Pessoa('Pedro', 14, $Endereco1);
    // $Pessoa2 = new Pessoa('Ana', 15, $Endereco1);
    // $Pessoa3 = new Pessoa('Fabio', 111, $Endereco1);

    //função uset serve para tirar a referência de uma variável


    //unset($Pessoa3);

    // //Setando valores de um objeto


    // echo "<pre>";

    // $Pessoa1->nome = 'Lucas';
    // $Pessoa1->idade = 15;

    // var_dump($Pessoa1);

    // echo "</pre>";


    // echo $Pessoa1->nome;


    //$Pessoa1->setNome('Ana');

    // echo "Nome: {$Pessoa1->getNome()}" . "<br>";

    // echo "Numero de pessoas cadastradas: " . Pessoa::getNumDePessoas() . "<br>";

    //Você não pode instaciar novos objetos a partir de uma classe abstrata
    //Uma classe genérica é criada e nela atributos comuns a outras classes são criados
    //Polimorfisco - Classes do tipo Pessoa (Cliente e Funcionário) implementam os mesmos métodos abstratos mas gerando
    //comportamentos distintos
    //Sobrecarga -> declaração do mesmo métdo mudando apenas o número de parâmetros (assinatura)




    // $funcionario = new Funcionario("lucas", 23, $Endereco1, "adm", 23.3);

    // //var_dump($funcionario);

    // echo "Funcionario: " .  $funcionario->__toString();

    // $funcionario->setSenha("123");

    // $funcionario->login("lucas", "123");

    // echo $Endereco1->bairro;


    // $conexao = CriadorConexao::criarConexao();


    // $produto1 = new Produto(null, 'lucas', 39);
    // var_dump($produto1);


    // var_dump($conexao);


    $repositorio = new PdoRepositorioProduto(CriadorConexao::criarConexao());

    var_dump($repositorio);

    $produto1 = new Produto(NULL, 'Sabao', 2);
    $produto2 = new Produto(NULL, 'Manteiga', 8);
    $produto3 = new Produto(NULL, 'Café', 22);

    
    //$repositorio->salvar($produto1);
    // $repositorio->salvar($produto2);
    // $repositorio->salvar($produto3);

    //$repositorio->todosProdutos();

    
    //DateTimeImmutable(y/m/d) -> padrão ano, mês e dia
    //Aqui seguimos o padrão entity em que as classes representam tabelas no banco
    $funca = new Funcionario(NULL, 'lucas', new DateTimeImmutable('1995/02/25'), $Endereco1, 'AUX.ALMOXARIFE', 1.200);

    echo $funca;





    
    


    
