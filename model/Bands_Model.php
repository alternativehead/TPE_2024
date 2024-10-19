<?php
require_once 'Model.php';

class BandsModel extends Model {

    public function getBands(){
        $query = $this->db->prepare('SELECT * FROM bandas');
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function createBand($array){
        $query = $this->db->prepare('INSERT INTO bandas (banda, lugar_origen, anio_origen, descripcion, estado, miembros) VALUES (?,?,?,?,?,?)');
        $query->execute([$array[0],$array[1],$array[2],$array[3],$array[4],$array[5]]);
        $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBandRow($id_band){
        $query = $this->db->prepare('SELECT * FROM bandas WHERE id_banda = ?');
        $query->execute([$id_band]);
        $row = $query->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public function updateBandTable($array){
        $query = $this->db->prepare('UPDATE bandas SET banda = ?, lugar_origen = ?, anio_origen = ?, descripcion = ?, estado = ? , miembros = ? WHERE  id_banda= ?');
        $query->execute([$array[1], $array[2], $array[3], $array[4], $array[5], $array[6],$array[0]]);
        $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteBand($id_band){
        $query = $this->db->prepare('DELETE FROM bandas WHERE bandas . id_banda = ?');
        $query->execute([$id_band]);
        $query->fetchAll(PDO::FETCH_OBJ);
    }
}
?>