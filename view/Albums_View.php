<?php

use Smarty\Compile\Tag\Assign;
use Smarty\Smarty;
//require_once './route.php';
require_once '../smarty-master/libs/Smarty.class.php';

class AlbumsView {
    private $user = null;
    private $smarty;

    public function __construct($user){
        $this->user = $user;
        $this->smarty = new Smarty();
    }

    public function showHome($albums_bands){
        $this->smarty->assign('albums_bands', $albums_bands); #se crea el nombre para smarty de la variable y la variable de referencia
        $this->smarty->assign('user', $this->user);
        $this->smarty->display('./templates/Home.tpl');
    }

    public function showEdit($row_album,$bands, $error = ''){
        $this->smarty->assign('error', $error);
        $this->smarty->assign('row_album', $row_album);
        $this->smarty->assign('bands', $bands);
        $this->smarty->display('./templates/Form_Edit_Album.tpl');
    }

    public function showCreateAlbum($bands, $error = ''){
        $this->smarty->assign('bands', $bands);
        $this->smarty->assign('error', $error);
        $this->smarty->display('./templates/Form_Create_Album.tpl');
    }

    public function showDescription($description){
        $this->smarty->assign( "description", $description);
        $this->smarty->display('./templates/Show_Description_Album.tpl');
    }

    public function showDiscography($discography){
        $this->smarty->assign('discography', $discography);
        $this->smarty->display('./templates/Show_Discography.tpl');
    }
}
?>