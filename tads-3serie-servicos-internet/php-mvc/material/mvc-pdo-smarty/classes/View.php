<?php

namespace App;

use Smarty;

class View extends Smarty
{

    private static $instancia;

    /**
     * 
     * @return View
     */
    public static function getInstance() {
        if (null === self::$instancia) {
            self::$instancia = new View();
        }
        return self::$instancia;
    }
    
    public function __construct()
    {
        parent::__construct();
        
        $this->setTemplateDir(PATH . '/tpl');
        $this->setCompileDir(PATH . '/cache/smarty/compile');
        
        $this->assign('msgAviso', array());
        $this->assign('msgOk', array());
    }
}
