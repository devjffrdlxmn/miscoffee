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


		function checkProductExist($productName)
		{
			$data=array();
            $sql = "SELECT `name` FROM tbl_product WHERE `name`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$productName]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}

        function fetch()
        {
			$sqlProduct = "SELECT tbl_product.id,tbl_product.name,tbl_product.price,tbl_product.stocks,
             tbl_category.category_id,tbl_category.category_name,tbl_type.type_id,tbl_type.type_name FROM tbl_product 
            INNER JOIN tbl_category ON tbl_category.category_id  = tbl_product.category_id 
            INNER JOIN tbl_type ON tbl_type.type_id = tbl_product.type_id ";

            $stmt = $this->db->prepare($sqlProduct);
            $stmt->execute();
            $products = $stmt->fetchAll();
			return $products;
        }

			
		function save($productName,$productPrice,$productStocks,
		$productCategory,$productType){
			$addData=[];
			$addData=[
				'productName'=>$productName,
				'productPrice'=>$productPrice,
				'productStocks'=>$productStocks,
				'productCategory'=>$productCategory,
				'productType'=>$productType
			];
            $sql = "INSERT INTO tbl_product(`name`,price,stocks,category_id,`type_id`) 
			VALUES (:productName, :productPrice, :productStocks, :productCategory, :productType)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			
			if($stmt) return 1;
			else return 0;
			

		}

		function update($productId,$productName,$productPrice,$productStocks,
		$productCategory,$productType){
			$updateData=[];
			$updateData=[
				'productId'=>$productId,
				'productName'=>$productName,
				'productPrice'=>$productPrice,
				'productStocks'=>$productStocks,
				'productCategory'=>$productCategory,
				'productType'=>$productType
			];
			
			$sql = "UPDATE tbl_product SET `name`=:productName, price=:productPrice, stocks=:productStocks
			,category_id=:productCategory, `type_id`=:productType WHERE id=:productId";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
			

		}
		function delete($id)
		{
			$sql = "DELETE FROM tbl_product WHERE id=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$id]);
			if($stmt) return 1;
			else return 0;
		}
		
	}	
	

?>
