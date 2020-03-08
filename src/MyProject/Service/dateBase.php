<?php

namespace MyProject\Service;

class DateBase{

    private static $instance;

    /** @var PDO */
    private $PDO;

    private function __construct(){
        

        $dbOptions = (require __DIR__.'/../../setting.php')['db'];
        $this->PDO = new \PDO(
            'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->PDO->exec("set names utf8");

    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        
        $sth = $this->PDO->prepare($sql);
        $result = $sth->execute($params);

        if(false === $result){

            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }


    public static function getInstance(): self
    {
        if(self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getLastInsertId(): int
    {
        return (int) $this->PDO->lastInsertId();
    }
}

?>