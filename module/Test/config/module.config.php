<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Test\Controller\Test' => 'Test\Controller\TestController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'test' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/test',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Test\Controller\Test',
                        'action' => 'index'
                    ),
                ),
            ),
            'list' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/list',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Test\Controller\Test',
                        'action' => 'list'
                    ),
                ),
            ),
            'paginator' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/paginator[/page/:page]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'page' => '[0-9]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Test\Controller\Test',
                        'action' => 'index'
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'test' => __DIR__ . '/../view',
        ),
    ),
);