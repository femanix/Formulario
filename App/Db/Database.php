<?php


namespace App\Db;

use \PDO;
use \PDOException;



class Database
{
    const HOST = 'localhost';
    const DBNAME = 'desenvolvedores';
    const DBUSER = 'root';
    const PASS = '';

    private $table = 'devs';
    private $con;

  

    /*
     * conecta com o banco de dados
     */

    public function __construct()
    {
        try {
            $this->con = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME, self::DBUSER, self::PASS);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function execute($query, $parametros = [])
    {
        try {
            $status = $this->con->prepare($query);
            $status->execute($parametros);

            return $status;

        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        };
    }

    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . '(' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $this->execute($query, array_values($values));

        return $this->con->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'WHERE '.$limit : '';

        $query = 'SELECT ' .$fields. ' FROM '.$this->table.' '.$where.' '.$order. ' '.$limit;

        return $this->execute($query);

    }
};
