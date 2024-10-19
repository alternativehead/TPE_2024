<?php
function UserMiddleware($res) {
    session_start();
    if(isset($_SESSION['ID_USER'])){
        $res->user = new stdClass();
        $res->user->id_user = $_SESSION['ID_USER'];
        $res->user->email = $_SESSION['EMAIL_USER'];
        return;
    }
}

?>