<?php

use Smarty\Compile\Tag\Assign;
use Smarty\Smarty;
require_once '../smarty-master/libs/Smarty.class.php';

class BandsView {
    private $user = null;
    private $smarty;

    public function __construct($user){
        $this->user = $user;
        $this->smarty = new Smarty();
    }

    public function showBands($bands){
        $this->smarty->assign('bands', $bands);
        $this->smarty->assign('user', $this->user);
        $this->smarty->display('./templates/Show_Bands.tpl');
    }

    public function showCreateBand($error = ''){
        $this->smarty->assign('error', $error);
        $this->smarty->display("./templates/Form_Create_Band.tpl");
    }

    public function showEditBand($band, $error = ''){
        $this->smarty->assign('band',$band);
        $this->smarty->assign('error',$error);
        $this->smarty->display('./templates/Form_Edit_Band.tpl');
    }

    public function showConfirmDelete($id_band, $caution, $confirm){
        $this->smarty->assign('caution', $caution);
        $this->smarty->assign('id_band', $id_band);
        $this->smarty->assign('confirm', $confirm);
        $this->smarty->display('./templates/Confirm_Delete_Band.tpl');
    }
}
?>