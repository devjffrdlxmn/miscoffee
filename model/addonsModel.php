<?php  
	class addOns
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
        
        public function addonsFunction(){
            $data=array();
            $sql = "SELECT * FROM tbl_addons order by id asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }

        public function addonsduplicateFunction($name){
            $data=array();
            $sql = "SELECT addons_name FROM tbl_addons WHERE addons_name=?";
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

        public function addonssaveFunction($name,$price,$stock){

            $duplivar=$this->addonsduplicateFunction($name);
            if($duplivar==1){
                return "2";
                exit();
            }

            $data=[
                'namerec'=>$name,
                'price'=>$price,
                'stock'=>$stock
            ];
            $sql = "INSERT INTO tbl_addons(addons_name,price,stocks) VALUES (:namerec, :price, :stock)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($data);

            
			if($stmt){
                return "1";
            }
            else{
                return "0"; 
            }
        }
        
        public function addonsupdateFunction($id,$name,$price,$stock){

            $duplivar=$this->addonsduplicateFunction($name);
            if($duplivar==1){
                return "2";
                exit();
            }
            
            $data=[
                'updateid'=>$id,
                'updatenamerec'=>$name,
                'updateprice'=>$price,
                'updatestock'=>$stock
            ];
            $sql = "UPDATE tbl_addons  SET addons_name=:updatenamerec, price=:updateprice, stocks=:updatestock WHERE id=:updateid";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($data);
            if($stmt){
                return "1";
            }
            else{
                return "0"; 
            }
        }

        public function addonsdeleteFunction($id){
            $sql = "DELETE FROM tbl_addons WHERE id=?";
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