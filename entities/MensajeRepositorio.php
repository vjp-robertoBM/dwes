<?php
// require_once 'entities/queryBuilder.class.php';
namespace proyecto\entities;

class MensajeRepositorio extends QueryBuilder
{
    public function __construct(string $table = 'mensajes', string $classEntity = 'Mensaje')
    {
        parent::__construct($table, $classEntity);
    }

}