<?php
require_once ("FoodTabModel.php");
$clsFoodTab = new FoodTab();
class FoodTab{

	private $table = "foodtab";

	public function __construct(){}

	public function Add($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();
		$sql = "INSERT INTO `".$this->table."`
			(
				`Tavern_Id`,
				`FoodTab_Name`
			) VALUES (
				'".$mdl->getsqlTavern_Id()."',
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
				 `Tavern_Id`='".$mdl->getsqlTavern_Id()."',
				 `FoodTab_Name`='".$mdl->getsqlName()."',
				 `FoodTab_Status`='".$mdl->getsqlStatus()."'
		 WHERE `FoodTab_Id`='".$mdl->getsqlId()."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		 mysqli_close($conn);
	}

	public function UpdateTavern_Id($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Tavern_Id`='".$value."'
			WHERE `FoodTab_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateName($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`FoodTab_Name`='".$value."'
			WHERE `FoodTab_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateStatus($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`FoodTab_Status`='".$value."'
			WHERE `FoodTab_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function Delete($id){

		$Database = new Database();
		$conn = $Database->GetConn();
		$id = mysqli_real_escape_string($conn,$id);
		$sql="DELETE FROM `".$this->table."`
			WHERE `FoodTab_Id` = '".$id."'";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

			mysqli_close($conn);

	}

	public function IsExist($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();

		$val = false;
		$msg = "";

		// FoodTab_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`FoodTab_Id` != '".$mdl->getsqlId()."' AND
			`FoodTab_Id` = '".$mdl->getsqlId()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputId\")'>Id</a>: " . $mdl->getId() . "</p>";
			$val = true;
		}

		// Tavern_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`FoodTab_Id` != '".$mdl->getsqlId()."' AND
			`Tavern_Id` = '".$mdl->getsqlTavern_Id()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputTavern_Id\")'>Tavern_Id</a>: " . $mdl->getTavern_Id() . "</p>";
			$val = true;
		}

		// FoodTab_Name
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`FoodTab_Id` != '".$mdl->getsqlId()."' AND
			`FoodTab_Name` = '".$mdl->getsqlName()."'
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
			$sql .= "WHERE `FoodTab_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetTavern_IdById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Tavern_Id` FROM `".$this->table."`
			WHERE `FoodTab_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `FoodTab_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Tavern_Id'];
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

		$sql = "SELECT `FoodTab_Name` FROM `".$this->table."`
			WHERE `FoodTab_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `FoodTab_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['FoodTab_Name'];
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

		$sql = "SELECT `FoodTab_Status` FROM `".$this->table."`
			WHERE `FoodTab_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `FoodTab_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['FoodTab_Status'];
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
			WHERE `FoodTab_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `FoodTab_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ModelTransfer($result);
	}

	public function GetByTavern_Id($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Tavern_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `FoodTab_Status` = '".$status."'";
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
			WHERE `FoodTab_Name` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `FoodTab_Status` = '".$status."'";
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
			WHERE `FoodTab_DateCreated` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `FoodTab_Status` = '".$status."'";
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
			WHERE `FoodTab_Status` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `FoodTab_Status` = '".$status."'";
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

		$mdl = new FoodTabModel();
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
			$mdl = new FoodTabModel();
			$mdl = $this->ToModel($row);
			array_push($lst,$mdl);
		}
		return $lst;
	}

	public function ToModel($row){
		$mdl = new FoodTabModel();
		$mdl->setId((isset($row['FoodTab_Id'])) ? $row['FoodTab_Id'] : '');
		$mdl->setTavern_Id((isset($row['Tavern_Id'])) ? $row['Tavern_Id'] : '');
		$mdl->setName((isset($row['FoodTab_Name'])) ? $row['FoodTab_Name'] : '');
		$mdl->setDateCreated((isset($row['FoodTab_DateCreated'])) ? $row['FoodTab_DateCreated'] : '');
		$mdl->setStatus((isset($row['FoodTab_Status'])) ? $row['FoodTab_Status'] : '');
		return $mdl;
	}
}
