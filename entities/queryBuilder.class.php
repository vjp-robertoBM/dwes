<?php
require_once 'entities/queryException.class.php';
require_once 'utils/const.php';
abstract class QueryBuilder
{
    private $connection;
    private $table;
    private $classEntity;

    public function __construct(string $table, string $classEntity)
    {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }

    public function findAll()
    {
        $sql = "SELECT * from $this->table";

        $pdoStatement = $this->connection->prepare($sql);

        if ($pdoStatement->execute() === false) {
            throw new QueryException(ERROR_STRINGS[ERROR_EXECUTE_STATEMENT]);
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    public function save(IEntity $entity): void {
        try{
            $parameters = $entity->toArray();

            $sql = sprintf('insert into %s (%s) values (%s)',$this->table, implode(', ',array_keys($parameters)),':' . implode(', :',array_keys($parameters)));

            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
        }
        catch (PDOException $exception) {
            throw new QueryException(ERROR_STRINGS[ERROR_INS_BD]);
        }
    }
}
