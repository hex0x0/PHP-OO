<?php


    namespace Lucas\Comercial\Infraestrutura\Repositorio;

    use DateTimeImmutable;
    use Lucas\Comercial\Dominio\Models\Cliente;
    use Lucas\Comercial\Dominio\Models\Endereco;
    use Lucas\Comercial\Dominio\Repositorio\RepositorioClientes;
    use PDO;
    use PDOStatement;

    class PdoRepositorioClientes implements RepositorioClientes
    {

        private PDO $conexao;


        public function __construct(PDO $conexao)
        {
            $this->conexao = $conexao;
        }

        public function todosClientes(): array
        {
            $sql = "SELECT * FROM cliente";

            $stmt = $this->conexao->query($sql);

            //return $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $this->hidratarCliente($stmt);
        }

        public function todosClientesComEndereco():array
        {
            $sql_consulta = "SELECT * FROM cliente JOIN endereco ON id  = idCliente";
            $stmt = $this->conexao->query($sql_consulta);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $lista_cliente = [];


            foreach($resultado as $linha){
                if(!array_key_exists($linha['id'], $lista_cliente)){
                    $lista_cliente[$linha['id']] = new Cliente(


                        $linha['id'],
                        $linha['nome'],
                        new DateTimeImmutable($linha['dataNascimento']),
                        new Endereco(NULL, "", "", "", "", "", "", NULL),
                        $linha['renda']
                    );
                }

                $endereco = new Endereco(

                    $linha['idendereco'],
                    $linha['uf'],
                    $linha['cidade'],
                    $linha['nomeLogradouro'],
                    $linha['numero'],
                    $linha['bairro'],
                    $linha['cep'],
                    $linha['idCliente']);

                    $lista_cliente[$linha['id']]->setEndereco($endereco);
            }


            return $lista_cliente;
        }


        public function salvar(Cliente $cliente): bool
        {
            if($cliente->getId() === NULL){
                return $this->criar($cliente);
            }

            $this->atualizar($cliente);
        }

        public function criar(Cliente $cliente): bool
        {
            $sql_insert = "INSERT INTO cliente (nome, dataNascimento, renda) values (:nome, :dataNascimento, :renda)";
            $stmt = $this->conexao->prepare($sql_insert);

            $stmt->bindValue(':nome', $cliente->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':dataNascimento', $cliente->getDataNascimento()->format('Y/m/d'));
            $stmt->bindValue(':renda', $cliente->getRenda(), PDO::PARAM_STR);

            $sucesso = $stmt->execute();

            if($sucesso){
                $cliente->setId($this->conexao->lastInsertId());
                //Aqui vai a função para criação do endereço

                //$this->criaEndereco($cliente->getEndereco(), $cliente);

            }

            return $sucesso;

        }

        public function ler(Cliente $cliente): array
        {
            $sql = "SELECT * FROM cliente where id = :id";

            $stmt = $this->conexao->prepare($sql);

            $stmt->bindValue(':id', $cliente->getId(), PDO::PARAM_INT);

            $stmt->execute();

            return $this->hidratarCliente($stmt);
        }

        public function atualizar(Cliente $cliente): bool
        {
            $sql_update = "UPDATE cliente SET nome = :nome, dataNascimento = :dataNascimento, renda = :renda WHERE id = :id";

            $stmt = $this->conexao->prepare($sql_update);

            $stmt->bindValue(':nome', $cliente->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':dataNascimento', $cliente->getDataNascimento()->format('Y/m/d'));
            $stmt->bindValue('renda', $cliente->getRenda(), PDO::PARAM_STR);

            $stmt->bindValue(':id', $cliente->getId(), PDO::PARAM_INT);

            return $stmt->execute();


        }

        public function deletar(Cliente $cliente): bool
        {
            $stmt = $this->conexao->prepare("DELETE FROM cliente where id = :id");

            $stmt->bindValue(':id', $cliente->getId(), PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function preencheEndereco(Cliente $cliente)
        {
            $sql = "SELECT * FROM endereco WHERE idendereco = ?";

            $stmt = $this->conexao->prepare($sql);

            $stmt->bindValue(1, $cliente->getId(), PDO::PARAM_INT);
            

            $stmt->execute();


            $lista_enderecos = $stmt->fetchAll();

            foreach($lista_enderecos as $endereco){
                $endereco = new Endereco(
                    $endereco['idendereco'],
                    $endereco['uf'],
                    $endereco['cidade'],
                    $endereco['nomeLogradouro'],
                    $endereco['numero'],
                    $endereco['bairro'],
                    $endereco['cep'],
                    $endereco['idCliente']
                );
            }
        }


        public function hidratarCliente(PDOStatement $stmt):array
        {
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);


            $array_clientes = [];
            
            // echo "<table>";
            foreach($clientes as $cli){

                $cliente = new Cliente(
                    

                    $cli['id'],
                    $cli['nome'],
                    new DateTimeImmutable($cli['dataNascimento']),
                    new Endereco(NULL, "", "", "", "", "", "", NULL),
                    $cli['renda']


                );


                $this->preencheEndereco($cliente);
                
                // echo "
                
                //     <tr>
                //         <td width='20'>
                //             {$cli['id']}
                //         <td>
                //         <td width='150'>
                //             {$cli['nome']}
                //         </td>
                //         <td align='right'>
                //             {$cli['renda']}
                //         </td>
                //     </tr>

                
                
                // ";
                
                $array_clientes[] = $cliente;



            }

            return $array_clientes;

        }

    }

