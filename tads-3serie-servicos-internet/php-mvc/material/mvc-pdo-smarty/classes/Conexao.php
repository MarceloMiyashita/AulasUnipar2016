<?php

namespace App;

use PDO;
use PDOException;

/**
 * Classe de Conexao
 *
 * @author alisson
 */
class Conexao extends PDO {

    private $dsn;
    private $user;
    private $password;
    private static $instancia;

    public function __construct() {
		$this->dsn = 'sqlite:' . PATH . '/banco/blog.sqlite.db';

        try {
            parent::__construct($this->dsn, $this->user, $this->password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->query('SET NAMES UTF8'); // UTF-8 Mysql
        } catch (PDOException $e) {
            echo "Conexão falhou. Erro: " . $e->getMessage();
            exit;
        }
    }

    /**
     * 
     * @return Conexao
     */
    public static function getInstance() {
        if (null === self::$instancia) {
            self::$instancia = new Conexao();
        }
        return self::$instancia;
    }

}
