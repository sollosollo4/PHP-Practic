<?php

namespace Services;

class Db
{
    private static $instancesCount = 0;

    private static $instance;

    /** @var \PDO */
    private $pdo;

    private function __construct()
    {
        self::$instancesCount++;
        $dbOptions = (require __DIR__.'/../settings.php')['db'];
        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'], $dbOptions['password'] 
        );
        $this->pdo ->exec('SET NAMES UTF8');
        
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    public static function getInstancesCount(): int
    {
        return self::$instancesCount;
    }

    public static function getInstance(): self 
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getLastInsertId(): int
    {
        return (int) $this->pdo->lastInsertId();
    }
}

?>