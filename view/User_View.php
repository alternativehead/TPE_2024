<?php

use Smarty\Compile\Tag\Assign;
use Smarty\Smarty;

require_once '../smarty-master/libs/Smarty.class.php';

class UserView {
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function showLogin($error = ''){
        $this->smarty->assign ('error', $error);
        $this->smarty->display("./templates/Form_User.tpl");
    }

}
?>