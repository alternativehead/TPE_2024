<?php
require_once 'Model.php';
class AlbumsModel extends Model{

    public function getAll(){
        $query = $this->db->prepare('SELECT `b`.`banda`, `b`.`id_banda`, `a`.`id_album`, `a`.`album`,`a`.`anio_de_lanzamiento`, `a`.`genero`,`a`.`discografica`,`a`.`descripcion`, `a`.`imagen` FROM `albumes` AS a INNER JOIN `bandas` AS b ON `a`.`id_banda`=`b`.`id_banda`'); #asigno a a albumes y b a bandas, traigo todas las columnas de albumes y a id_banda y banda de bandas
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function getAlbum($id_album){
        $query = $this->db->prepare('SELECT * FROM albumes WHERE id_album = ?');
        $query->execute([$id_album]);
        $row = $query->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public function updateTables($array){
        $query = $this->db->prepare('UPDATE Albumes SET album = ?, anio_de_lanzamiento = ?, genero = ?, discografica = ?, descripcion = ?, imagen = ? ,id_banda = ? WHERE  id_album= ?');
        $query->execute([$array[0], $array[1], $array[2], $array[3], $array[4], $array[5], $array[6],$array[7]]);
        $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteAlbumRow($id_album){
        $query = $this->db->prepare("DELETE FROM `albumes` WHERE `albumes`.`id_album` = ?");
        $query->execute([$id_album]);
        $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function createAlbum($array){
        $query = $this->db->prepare('INSERT INTO albumes (album, anio_de_lanzamiento, genero, discografica, descripcion, imagen ,id_banda) VALUES (?,?,?,?,?,?,?)');
        $query->execute([$array[0],$array[1],$array[2],$array[3],$array[4],$array[5],$array[6]]);
        $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getDescription($id_album){
        $query = $this->db->prepare("SELECT descripcion FROM albumes WHERE id_album = ?");
        $query->execute([$id_album]);
        $description = $query->fetch(PDO::FETCH_OBJ);
        return $description;
    }

    public function getDiscography($id_band){
        $query = $this->db->prepare('SELECT * FROM albumes WHERE id_banda = ?');
        $query->execute([$id_band]);
        $discography = $query->fetchAll(PDO::FETCH_OBJ);
        return $discography;
    }
}
?>