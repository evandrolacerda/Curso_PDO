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
        'protected'     => true
    ),
    'editar_post' => array(
        'route'         => '/editar_post',
        'controller'    => 'AlunoController',
        'action'        =>  'editarPost',
        'protected'     => true
    ),
    'exibir' => array(
        'route'         => '/exibir',
        'controller'    => 'AlunoController',
        'action'        =>  'exibir',        
    ),
    'excluir' => array(
        'route'         => '/excluir',
        'controller'    => 'AlunoController',
        'action'        =>  'deletar',
        'protected'     => true
    ),
    'excluir_post' => array(
        'route'         => '/excluir_post',
        'controller'    => 'AlunoController',
        'action'        =>  'deletarPost',
        'protected'     => true
    ),
    'inserir' => array(
        'route'         => '/inserir',
        'controller'    => 'AlunoController',
        'action'        =>  'inserir',
        'protected'     => true
    ),
    'inserir_post' => array(
        'route'         => '/inserir_post',
        'controller'    => 'AlunoController',
        'action'        =>  'inserirPost',
        'protected'     => true
    ),
    'logar' => array(
        'route'         => '/login/logar',
        'controller'    => 'LoginController',
        'action'        =>  'logar',
        
    ),
    'login' => array(
        'route'         => '/login',
        'controller'    => 'LoginController',
        'action'        =>  'doLogin',        
    ),
    'admin' => array(
        'route'         => '/admin',
        'controller'    => 'AlunoController',
        'action'        =>  'adminIndex',        
        'protected'     =>  true,        
    ),
    'busca' => array(
        'route'         => '/busca',
        'controller'    => 'AlunoController',
        'action'        =>  'busca',        
        'protected'     =>  true,        
    ),
    'logout' => array(
        'route'         => '/logout',
        'controller'    => 'LoginController',
        'action'        =>  'logout',        
        'protected'     =>  true,        
    ),
    'show' => array(
        'route'         => '/show',
        'controller'    => 'AlunoController',
        'action'        =>  'show',        
        'protected'     =>  true,        
    ),
    'showUsuario' => array(
        'route'         => '/showUsuario',
        'controller'    => 'UsuarioController',
        'action'        =>  'show',        
        'protected'     =>  true,        
    ),
    'indexUsuario' => array(
        'route'         => '/usuario',
        'controller'    => 'UsuarioController',
        'action'        =>  'index',        
        'protected'     =>  true,        
    ),        
    'excluirUsuario' => array(
        'route'         => '/excluirUsuario',
        'controller'    => 'UsuarioController',
        'action'        =>  'delete',        
        'protected'     =>  true,        
    ),
    'excluirUsuarioPost' => array(
        'route'          => '/excluirUsuarioPost',
        'controller'     => 'UsuarioController',
        'action'         =>  'deletePost',        
        'protected'      =>  true,        
    ),
    'editarUsuario' => array(
        'route'         => '/editarUsuario',
        'controller'    => 'UsuarioController',
        'action'        =>  'editar',        
        'protected'     =>  true,        
    ),
    'editarUsuarioPost' => array(
        'route'         => '/editarUsuarioPost',
        'controller'    => 'UsuarioController',
        'action'        =>  'editarPost',        
        'protected'     =>  true,        
    ),
    'inserirUsuario' => array(
        'route'         => '/inserirUsuario',
        'controller'    => 'UsuarioController',
        'action'        =>  'inserir',        
        'protected'     =>  true,        
    ),
    'inserirUsuarioPost' => array(
        'route'         => '/inserirUsuarioPost',
        'controller'    => 'UsuarioController',
        'action'        =>  'inserirPost',        
        'protected'     =>  true,        
    ),
    'senhaUsuario' => array(
        'route'         => '/senhaUsuario',
        'controller'    => 'UsuarioController',
        'action'        =>  'senha',        
        'protected'     =>  true,        
    ),
    'senhaUsuarioPost' => array(
        'route'         => '/senhaUsuarioPost',
        'controller'    => 'UsuarioController',
        'action'        =>  'senhaPost',        
        'protected'     =>  true,        
    ),
        
);

