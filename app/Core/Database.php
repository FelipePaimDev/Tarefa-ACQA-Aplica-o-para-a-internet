<?php

namespace App\Core;

use PDO;
use PDOException;

/**
 * DESIGN PATTERN: Singleton
 *
 * Garante que exista, em todo o ciclo de vida da requisição, apenas UMA
 * instância de conexão PDO com o banco de dados — evitando abrir múltiplas
 * conexões desnecessárias e centralizando o acesso ao banco em um único ponto.
 */
class Database
{
    private static ?Database $instance = null;
    private PDO $connection;

    /**
     * Construtor privado: impede que a classe seja instanciada
     * diretamente de fora (com "new Database()").
     */
    private function __construct()
    {
        $config = require __DIR__ . '/../Config/config.php';

        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8mb4',
            $config['db_host'],
            $config['db_name']
        );

        try {
            $this->connection = new PDO($dsn, $config['db_user'], $config['db_pass'], [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            die('Erro de conexão com o banco de dados: ' . $e->getMessage());
        }
    }

    /** Impede a clonagem da instância única. */
    private function __clone(): void
    {
    }

    /** Impede a desserialização da instância única. */
    public function __wakeup(): void
    {
        throw new \Exception('Não é permitido desserializar um Singleton.');
    }

    /**
     * Ponto único de acesso à instância da classe.
     * Cria a conexão apenas na primeira chamada (lazy loading).
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
