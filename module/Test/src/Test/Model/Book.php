<?php
namespace Test\Model;

use Test\Model\AlbumTable;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Zend\Feed\PubSubHubbub\Model\AbstractModel;
use Zend\Mvc\Controller\AbstractActionController;

use Checkondispatch\Custom\AbstractModelClass;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Adapter\DbSelect;

class Book {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }


    public function listBooks()
    {
        // $this->tableGateway = $this->initTableObject('albums');
        // $select = $this->tableGateway->select();

        $adapter = $this->tableGateway->getAdapter();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from('album');
        $select->where(array('id' => 2));

        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        return $results;
        // $selectBooks = new DbSelect($select, $this->tableGateway->getAdapter());
    }
    
}