<?php

namespace App\Entity;

use \App\Db\Database;

use \PDO;

class Dev
{
    public $nome;
    public $email;
    public $devweb;
    public $senioridade;
    public $id;

    public function cadastrar()
    {
        $objDatabase = new Database();

        $this->id = $objDatabase->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'habilidade' => $this->devweb,
            'senioridade' => $this->senioridade

        ]);
    }

    public static function getDevs($where = null, $order = null, $limit = null){
        
        return (new Database())->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }
};
