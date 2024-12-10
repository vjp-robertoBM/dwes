<?php
// require_once 'entities/queryBuilder.class.php';

namespace proyecto\entities;

class AsociadoRepositorio extends QueryBuilder
{
    public function __construct(string $table = 'asociados', string $classEntity = 'Asociado')
    {
        parent::__construct($table, $classEntity);
    }

}