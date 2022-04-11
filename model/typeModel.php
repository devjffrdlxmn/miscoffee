<?php  
	class Type
	{
		private $host = 'localhost';
		private $username = "root";
		private $dbname = "miscoffee";
		private $password = "";
		private $connect;
			
		public function __construct(){
			if(!isset($this->db)){
				// Connect to the database
				try{
					$connect = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
					$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$this->db = $connect;
				}catch(PDOException $e){
					die("Failed to connect with MySQL: " . $e->getMessage());
				}
			}
		}
        

		function checkTypeExist($typeName)
		{
			$data=array();
            $sql = "SELECT `type_name` FROM tbl_type WHERE `type_name`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$typeName]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}


        public function fetch(){
            $data=array();
            $sql = "SELECT * FROM tbl_type order by `type_id` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }

		function save($typeName){
			$addData=[];
			$addData=[
				'typeName'=>$typeName,
			];
            $sql = "INSERT INTO tbl_type(`type_name`) 
			VALUES (:typeName)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($typeId,$typeName){
			$updateData=[];
			$updateData=[
				'typeId'=>$typeId,
				'typeName'=>$typeName
			];
			$sql = "UPDATE tbl_type SET `type_name`=:typeName
			WHERE `type_id`=:typeId";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
		}

		function delete($id)
		{
			$sql = "DELETE FROM tbl_type WHERE `type_id`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$id]);
			if($stmt) return 1;
			else return 0;
		}
        
	}	
?>