<?php
namespace App\Controller;

use App\Views\ViewRenderer;
/**
 * Description of BasicController
 *
 * @author Evandro Lacerda <evandroplacerda@gmail.com>
 */
class BasicController
{
    protected $view;
    
    
    public function __construct()
    {
        $this->view = new ViewRenderer();
    }
}
