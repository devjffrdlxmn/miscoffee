<?php  
	class category
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
        
        public function categoryFunction(){
            $data=array();
            $sql = "SELECT * FROM tbl_category order by category_id asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }

        public function categoryduplicateFunction($name){
            $data=array();
            $sql = "SELECT category_name FROM tbl_category WHERE category_name=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$name]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0){
                return "1";
            }
            else{
                return "0"; 
            }
        }

        public function categorysaveFunction($name){

            $duplivar=$this->categoryduplicateFunction($name);
            if($duplivar==1){
                return "2";
                exit();
            }

            $data=[
                'namerec'=>$name,
            ];
            $sql = "INSERT INTO tbl_category(category_name) VALUES (:namerec)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($data);

            
			if($stmt){
                return "1";
            }
            else{
                return "0"; 
            }
        }
        
        public function categoryupdateFunction($id,$name){

            $duplivar=$this->categoryduplicateFunction($name);
            if($duplivar==1){
                return "2";
                exit();
            }
            
            $data=[
                'updateid'=>$id,
                'updatenamerec'=>$name
            ];
            $sql = "UPDATE tbl_category  SET category_name=:updatenamerec WHERE id=:updateid";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($data);
            if($stmt){
                return "1";
            }
            else{
                return "0"; 
            }
        }

        public function categorydeleteFunction($id){
            $sql = "DELETE FROM tbl_category WHERE category_id=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$id]);
			if($stmt){
                return "1";
            }
            else{
                return "0"; 
            }
        }

        
	}	
?>