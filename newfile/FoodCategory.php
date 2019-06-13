<?php
require_once ("FoodCategoryModel.php");
$clsFoodCategory = new FoodCategory();
class FoodCategory{

	private $table = "foodcategory";

	public function __construct(){}

	public function Add($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();
		$sql = "INSERT INTO `".$this->table."`
			(
				`FoodTab_Id`,
				`FoodCategory_Name`
			) VALUES (
				'".$mdl->getsqlFoodTab_Id()."',
				'".$mdl->getsqlName()."'
			)";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$id = mysqli_insert_id($conn);

		mysqli_close($conn);
		return $id;
	}

	public function Update($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();
		$sql="UPDATE `".$this->table."` SET
				 `FoodTab_Id`='".$mdl->getsqlFoodTab_Id()."',
				 `FoodCategory_Name`='".$mdl->getsqlName()."',
				 `FoodCategory_Status`='".$mdl->getsqlStatus()."'
		 WHERE `FoodCategory_Id`='".$mdl->getsqlId()."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		 mysqli_close($conn);
	}

	public function UpdateFoodTab_Id($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`FoodTab_Id`='".$value."'
			WHERE `FoodCategory_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateName($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`FoodCategory_Name`='".$value."'
			WHERE `FoodCategory_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateStatus($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`FoodCategory_Status`='".$value."'
			WHERE `FoodCategory_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function Delete($id){

		$Database = new Database();
		$conn = $Database->GetConn();
		$id = mysqli_real_escape_string($conn,$id);
		$sql="DELETE FROM `".$this->table."`
			WHERE `FoodCategory_Id` = '".$id."'";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

			mysqli_close($conn);

	}

	public function IsExist($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();

		$val = false;
		$msg = "";

		// FoodCategory_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`FoodCategory_Id` != '".$mdl->getsqlId()."' AND
			`FoodCategory_Id` = '".$mdl->getsqlId()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputId\")'>Id</a>: " . $mdl->getId() . "</p>";
			$val = true;
		}

		// FoodTab_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`FoodCategory_Id` != '".$mdl->getsqlId()."' AND
			`FoodTab_Id` = '".$mdl->getsqlFoodTab_Id()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputFoodTab_Id\")'>FoodTab_Id</a>: " . $mdl->getFoodTab_Id() . "</p>";
			$val = true;
		}

		// FoodCategory_Name
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`FoodCategory_Id` != '".$mdl->getsqlId()."' AND
			`FoodCategory_Name` = '".$mdl->getsqlName()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputName\")'>Name</a>: " . $mdl->getName() . "</p>";
			$val = true;
		}

		mysqli_close($conn);

		return array("val"=>"$val","msg"=>"$msg");

	}

	public function Get($status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$sql = "SELECT * FROM `".$this->table."`";
		if ($status !== "") {
			$sql .= "WHERE `FoodCategory_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetFoodTab_IdById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `FoodTab_Id` FROM `".$this->table."`
			WHERE `FoodCategory_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `FoodCategory_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['FoodTab_Id'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetNameById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `FoodCategory_Name` FROM `".$this->table."`
			WHERE `FoodCategory_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `FoodCategory_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['FoodCategory_Name'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetStatusById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `FoodCategory_Status` FROM `".$this->table."`
			WHERE `FoodCategory_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `FoodCategory_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['FoodCategory_Status'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetById($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `FoodCategory_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `FoodCategory_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ModelTransfer($result);
	}

	public function GetByFoodTab_Id($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `FoodTab_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `FoodCategory_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByName($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `FoodCategory_Name` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `FoodCategory_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByDateCreated($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `FoodCategory_DateCreated` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `FoodCategory_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByStatus($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `FoodCategory_Status` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `FoodCategory_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function SetImage($image,$id){

		$val = true;
		$msg = "";
		$clsImage = new Image();
		if(isset($image["name"]) && ($image["name"]!=""))
		{
			$result = $clsImage->Upload($image,$this->table,$id);
			if($result[0] != ""){
				$msg = $result[0];
			}
		}
		return array("val"=>$val,"msg"=>$msg);
	}

	public function ModelTransfer($result){

		$mdl = new FoodCategoryModel();
		while($row = mysqli_fetch_array($result))
		{
			$mdl = $this->ToModel($row);
		}
		return $mdl;
	}

	public function ListTransfer($result){
		$lst = array();
		while($row = mysqli_fetch_array($result))
		{
			$mdl = new FoodCategoryModel();
			$mdl = $this->ToModel($row);
			array_push($lst,$mdl);
		}
		return $lst;
	}

	public function ToModel($row){
		$mdl = new FoodCategoryModel();
		$mdl->setId((isset($row['FoodCategory_Id'])) ? $row['FoodCategory_Id'] : '');
		$mdl->setFoodTab_Id((isset($row['FoodTab_Id'])) ? $row['FoodTab_Id'] : '');
		$mdl->setName((isset($row['FoodCategory_Name'])) ? $row['FoodCategory_Name'] : '');
		$mdl->setDateCreated((isset($row['FoodCategory_DateCreated'])) ? $row['FoodCategory_DateCreated'] : '');
		$mdl->setStatus((isset($row['FoodCategory_Status'])) ? $row['FoodCategory_Status'] : '');
		return $mdl;
	}
}
