<?php

return array(
    'home' => array(
        'route' => '/',
        'controller' => 'AlunoController',
        'action'     =>  'listarAction',
    ),
    'editar' => array(
        'route'         => '/editar',
        'controller'    => 'AlunoController',
        'action'        =>  'editar',
    ),
    'editar_post' => array(
        'route'         => '/editar_post',
        'controller'    => 'AlunoController',
        'action'        =>  'editarPost',
    ),
    'exibir' => array(
        'route'         => '/exibir',
        'controller'    => 'AlunoController',
        'action'        =>  'show',
    ),
    'excluir' => array(
        'route'         => '/excluir',
        'controller'    => 'AlunoController',
        'action'        =>  'deletar',
    ),
    'excluir_post' => array(
        'route'         => '/excluir_post',
        'controller'    => 'AlunoController',
        'action'        =>  'deletarPost',
    ),
    'inserir' => array(
        'route'         => '/inserir',
        'controller'    => 'AlunoController',
        'action'        =>  'inserir',
    ),
    'inserir_post' => array(
        'route'         => '/inserir_post',
        'controller'    => 'AlunoController',
        'action'        =>  'inserirPost',
    ),
    
);

