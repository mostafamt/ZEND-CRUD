<?php
namespace Test\Controller;

use Test\Model\Book;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TestController extends AbstractActionController
{
    private $usersTable;

    public function indexAction()
    {
        // I) Without pagination
		// return new ViewModel(array('rowset' => $this->getUsersTable()->select()));
		
		// II) Pagination
		// 1) ArrayAdapter. You first retireve all result turn them to array and after paginate. Not a very good solution.
//		$resulySet = $this->getUsersTable()->select();
//		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($resulySet->toArray()));

		// 2) Zend\Paginator\Adapter\DbTableGateway. The best.
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\DbTableGateway($this->getUsersTable()));

		$page = 1;
		if ($this->params()->fromRoute('page')) $page = $this->params()->fromRoute('page');
		$paginator->setCurrentPageNumber((int)$page);
		$paginator->setItemCountPerPage(5);
		return new ViewModel(array('paginator' => $paginator));
    }

    public function listAction()
    {
        return new ViewModel();
    }

    public function getUsersTable()
	{
		if (!$this->usersTable) {
			$this->usersTable = new TableGateway(
				'album', 
				$this->getServiceLocator()->get('Zend\Db\Adapter\Adapter')
			);
		}
		return $this->usersTable;
	}

}
