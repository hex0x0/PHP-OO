<?php

    namespace Lucas\Comercial\Infraestrutura\Repositorio;


    use Lucas\Comercial\Dominio\Models\Produto;
    use Lucas\Comercial\Dominio\Repositorio\RepositorioProdutos;
    use Lucas\Comercial\Infraestrutura\Persistencia;
    use PDO;

    class PdoRepositorioProduto implements RepositorioProdutos
    {
        //Implementar métodos da interface

        private PDO $conexao;

        //Injeção de dependência
        public function __construct(PDO $conexao)
        {
            $this->conexao = $conexao;
        }

        public function todosProdutos(): array
        {
            $sql = "SELECT * FROM produto";

            $stmt = $this->conexao->query($sql);

            return $this->hidratarListaProdutos($stmt);
        }

        public function salvar(Produto $produto): bool
        {
            if($produto->getIdProduto() === NULL){
                return $this->criarProduto($produto);
            }

            return $this->atualizarProduto($produto);
        }

        public function criarProduto(Produto $produto): bool
        {
            $sql = "INSERT INTO (nomeProduto, preco) VALUES (:nome, :preco);";
            //Prepare usado para evitar injeção de sql
            $stmt = $this->conexao->prepare($sql);
            //execute considera todos os valores passados como PARAM_STR
            $stmt->bindValue(':nome', $produto->getNomeProduto());
            $stmt->bindValue(':preco', $produto->getPreco());

            $sucesso = $stmt->execute();
            if($sucesso){
                $produto->setIdProduto($this->conexao->lastInsertId());
            }

            return $sucesso;
        }

        public function lerProduto(Produto $produto): array
        {
            $sql = "SELECT * FROM produto WHERE idProduto = :id";

            $stmt = $this->conexao->prepare($sql);

            $stmt->bindValue(':id', $produto->getIdProduto(), PDO::PARAM_INT);
            $stmt->execute();
            return $this->hidratarListaProdutos($stmt);
        }

        public function atualizarProduto(Produto $produto): bool
        {
            $sql = "UPDATE produto SET nomeProduto = :nomeProduto, preco = :preco WHERE idProduto = :id";

            $stmt = $this->conexao->prepare($sql);

            $stmt->bindValue(':nomeProduto', $produto->getNomeProduto(), PDO::PARAM_STR);
            $stmt->bindValue(':preco', $produto->getPreco(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $produto->getIdProduto(), PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function deletarProduto(Produto $produto): bool
        {
            $stmt = $this->conexao->prepare("DELETE FROM produto WHERE idProduto = ?");
            $stmt->bindValue(1, $produto->getIdProduto(), PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function hidratarListaProdutos(\PDOStatement $stmt):array{
            $listaProdutos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $lista_prod = [];

            echo "<table>";
            
            foreach($listaProdutos as $pro){
                $lista_prod[] = new Produto(

                    $pro['idProduto'], 
                    $pro['nomeProduto'],
                    $pro['preco'],

                );

                echo "
                
                    <tr>
                        <td width='20'>
                            {$pro['idProduto']}
                        <td>
                        <td width='150'>
                        {$pro['nomeProduto']}
                        </td>
                        <td align='right'>
                         " . number_format($pro['preco'], 2, '.'. ',') . "
                        </td>
                    </tr>

                
                
                ";
            }

            echo "</table>";

            return $lista_prod;
        }

    }