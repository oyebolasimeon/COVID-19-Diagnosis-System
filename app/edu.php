 <?php
 $db_connect = new mysqli("localhost", "root", "", "dcigcomn_covid");
      if ($db_connect->connect_error) {
        die("Could not connect to the databse: ". $conn->connect_error);
        }
        $conn = new db_connect;
        $this

        public function getallcolleges() {
        	$sql = "SELECT * FROM $this->location";
        	$stmt = $this->conn->prepare($sql);
        	$stmt = execute();
        	return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
?>