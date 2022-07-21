<?php


    namespace Lucas\Comercial\Infraestrutura\Repositorio;


    use Lucas\Comercial\Dominio\Models\Cliente;
    use Lucas\Comercial\Dominio\Repositorio\RepositorioClientes;
    use PDO;


    class PdoRepositorioClientes implements RepositorioClientes
    {

        private PDO $conexao;


        public function __construct(PDO $conexao)
        {
            $this->conexao = $conexao;
        }

        public function salvar(Cliente $cliente): bool
        {
            
        }

    }

