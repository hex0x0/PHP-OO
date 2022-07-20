<?php


    namespace Lucas\Comercial\infraestrutura\persistencia;

    use PDO;
    use PDOException;
   

    class CriadorConexao
    {
        public static function criarConexao():PDO
        {
            try
            {
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=bd_comercial', 'root', 'admin123');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            }catch(PDOException $excecao)
            {
                echo "ERRO" .$excecao->getMessage();
            }

        }
    }