<?php

class Database {

    private $db = null;
    public $error = false;

   public function __construct($host, $username, $pass, $db) {
        try {
            $this->db = new mysqli($host, $username, $pass, $db);
            $this->db->set_charset("utf8");
        } catch (Exception $exc) {
            $this->error = true;
            echo '<p>Az adatbázis nem elérhető!</p>';
            exit();
        }
    }
        public function osszesAuto() {
        $result = $this->db->query("SELECT * FROM `jarmuvek`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
        public function getAuto($id) {
        $result = $this->db->query("SELECT * FROM `jarmuvek` WHERE id = ".$id);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
        public function getKiemeltAjanlatok(){
            $result = $this->db->query("SELECT * FROM `jarmuvek`");
            return $result->fetch_all(MYSQL_ASSOC);
        }
}
