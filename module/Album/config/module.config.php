<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of module
 *
 * @author Breno Grillo
 */

return [
    'controllers' => [
        'invokables' => [
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
        ],
    ],
    
   'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
    
    'router' => [
        'routes' => [
            'album' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/album[/:action][/:id]',
                    'contraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Album\Controller\Album',
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
];
