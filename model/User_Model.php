<?php
require_once 'Model.php';
class UserModel extends Model {

    public function getUser($email){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email= ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}
?>