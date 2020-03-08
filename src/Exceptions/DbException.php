<?php
    namespace Exceptions;

    class DbException extends \Exception
    {
        private function __construct()
        {
            $dbOptions = (require __DIR__ . '/../settings.php')['db'];
            try {
            $this->pdo = new \PDO(
                'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );

            $this->pdo->exec('SET NAMES UTF8');
            } 
            catch (\PDOException $e) {
                throw new DbException('Ошибка при подключении к базе данных: ' . $e->getMessage());
            }
        }
    }
?>