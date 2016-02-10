<?php
namespace App\Views;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View Renderer
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class ViewRenderer
{
    private $attributes;
    protected $layoutFullPath;
    protected $viewTemplate;
    
    public function __construct()
    {
        $this->attributes = array();
        
        $this->layoutFullPath = VIEWS_PATH . '/layouts/default.phtml';
    }
    
    public function setLayout( $layoutName )
    {
        $this->layoutFullPath = VIEWS_PATH . '/layouts/'. $layoutName .'.phtml';
    }
    
    public function render( $view, $layout = true){
     
        $viewFullPath = VIEWS_PATH . $view . '.php';
        $this->viewTemplate = $viewFullPath;
        
        if( $layout){
            include_once $this->layoutFullPath;
        }else{
            $this->content();
        }
        
    }
    
    public function content()
    {
        if(file_exists( $this->viewTemplate)){
            include_once $this->viewTemplate;
        }
    }
    
    public function addAttribute( $attribute, $value )
    {
        $this->attributes[$attribute] = $value ;
    }
    
    public function addAttributes( $attributes )
    {
        $this->attributes = array_merge( $this->attributes, $attributes );
    }
    
    public function __get( $name ){
        if( array_key_exists($name , $this->attributes)){
            return $this->attributes[$name];
        }
    }
    
}
