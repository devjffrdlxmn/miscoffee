<?php  
	class Product
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

        function getProductInfo()
        {
			$sqlProduct = "SELECT tbl_product.id,tbl_product.name,tbl_product.price,tbl_product.stocks,
            tbl_category.category_name,tbl_type.type_name FROM tbl_product 
            INNER JOIN tbl_category ON tbl_category.category_id  = tbl_product.category_id 
            INNER JOIN tbl_type ON tbl_type.type_id = tbl_product.type_id ";

            $stmt = $this->db->prepare($sqlProduct);
            $stmt->execute();
            $products = $stmt->fetchAll();
			return $products;
        }
      
        
	

		
	}	
	

?>
