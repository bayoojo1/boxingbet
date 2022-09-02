<?php
class database{

   public $db;


    // get the database connection
    public function getConnection() {

        $this->db = null;
        
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=boxingbet;**charset=utf8**', 'root', 'wifi1234');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch ( \Exception $e ) {
            echo 'Error connecting to the Database: ' . $e->getMessage();
            exit;
        }

        return $this->db;
    }
}
$database = new database();
$db = $database->getConnection();
?>