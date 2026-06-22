<?php

namespace App\Core;

use PDO;

/**
 * Model base.
 * Todo Model concreto (User, Task...) herda a conexão com o banco
 * obtida através do Singleton Database, sem precisar saber como
 * essa conexão é criada internamente.
 */
abstract class Model
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
}
