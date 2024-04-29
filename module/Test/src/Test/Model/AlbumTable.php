<?php

namespace Test\Model;
use Zend\Db\TableGateway\TableGateway;

class AlbumTable 
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($paginated = false)
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
}