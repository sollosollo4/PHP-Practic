<?php

namespace MyProject\Models;

use MyProject\Service\DateBase;

abstract class ActiveRecordEntity{

    /** @var int */
    protected $id;

    /**
     * @return int
     */
    public function getid(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    /**
     * @return static[]
     */
    public static function findAll(): array
    {
        $db = DateBase::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    abstract protected static function getTableName(): string;

    /**
     * @param int $id
     * @return static|null
     */
    public static function getById(int $id): ?self
    {
        $db = DateBase::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id',
            [':id' => $id],
            static::class
        );

        return $entities ? $entities[0] : null;
    }


    private function mapPropertiesToDoFormat(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }

        return $mappedProperties;
    }

    public function save(): void
    {
        
        $mappedProperties = $this->mapPropertiesToDoFormat();
        
        if($this->id !== null){
            $this->update($mappedProperties);
        }else{
            $this->insert($mappedProperties);
        }
    }

    private function update(array $mappedProperties): void
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;

        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index;
            $columns2params[] = $column . ' = ' . $param;
            $params2values[':param' . $index] = $value;
            $index++;
        }

        $sql = 'UPDATE `' . static::getTableName() . '` SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
        $db = DateBase::getInstance();
        $db->query($sql, $params2values, static::class);
    }

    private function insert(array $mappedProperties): void
    {

    }
}

?>