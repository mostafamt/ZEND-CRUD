<?php

namespace Album\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Helper\ViewModel;

class TestController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

}