<?php
require_once ("FoodModel.php");
$clsFood = new Food();
class Food{

	private $table = "food";

	public function __construct(){}

	public function Add($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();
		$sql = "INSERT INTO `".$this->table."`
			(
				`FoodCategory_Id`,
				`Food_Name`,
				`Food_Price`,
				`Food_Description`,
				`Food_Featured`,
				`Food_BestSeller`,
				`Food_Suggested`,
				`Food_NotAvailable`
			) VALUES (
				'".$mdl->getsqlFoodCategory_Id()."',
				'".$mdl->getsqlName()."',
				'".$mdl->getsqlPrice()."',
				'".$mdl->getsqlDescription()."',
				'".$mdl->getsqlFeatured()."',
				'".$mdl->getsqlBestSeller()."',
				'".$mdl->getsqlSuggested()."',
				'".$mdl->getsqlNotAvailable()."'
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
				 `FoodCategory_Id`='".$mdl->getsqlFoodCategory_Id()."',
				 `Food_Name`='".$mdl->getsqlName()."',
				 `Food_Price`='".$mdl->getsqlPrice()."',
				 `Food_Description`='".$mdl->getsqlDescription()."',
				 `Food_Featured`='".$mdl->getsqlFeatured()."',
				 `Food_BestSeller`='".$mdl->getsqlBestSeller()."',
				 `Food_Suggested`='".$mdl->getsqlSuggested()."',
				 `Food_NotAvailable`='".$mdl->getsqlNotAvailable()."',
				 `Food_Status`='".$mdl->getsqlStatus()."'
		 WHERE `Food_Id`='".$mdl->getsqlId()."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		 mysqli_close($conn);
	}

	public function UpdateFoodCategory_Id($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`FoodCategory_Id`='".$value."'
			WHERE `Food_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateName($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Food_Name`='".$value."'
			WHERE `Food_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdatePrice($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Food_Price`='".$value."'
			WHERE `Food_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateDescription($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Food_Description`='".$value."'
			WHERE `Food_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateFeatured($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Food_Featured`='".$value."'
			WHERE `Food_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateBestSeller($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Food_BestSeller`='".$value."'
			WHERE `Food_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateSuggested($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Food_Suggested`='".$value."'
			WHERE `Food_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateNotAvailable($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Food_NotAvailable`='".$value."'
			WHERE `Food_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateStatus($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Food_Status`='".$value."'
			WHERE `Food_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function Delete($id){

		$Database = new Database();
		$conn = $Database->GetConn();
		$id = mysqli_real_escape_string($conn,$id);
		$sql="DELETE FROM `".$this->table."`
			WHERE `Food_Id` = '".$id."'";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

			mysqli_close($conn);

	}

	public function IsExist($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();

		$val = false;
		$msg = "";

		// Food_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Food_Id` != '".$mdl->getsqlId()."' AND
			`Food_Id` = '".$mdl->getsqlId()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputId\")'>Id</a>: " . $mdl->getId() . "</p>";
			$val = true;
		}

		// FoodCategory_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Food_Id` != '".$mdl->getsqlId()."' AND
			`FoodCategory_Id` = '".$mdl->getsqlFoodCategory_Id()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputFoodCategory_Id\")'>FoodCategory_Id</a>: " . $mdl->getFoodCategory_Id() . "</p>";
			$val = true;
		}

		// Food_Name
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Food_Id` != '".$mdl->getsqlId()."' AND
			`Food_Name` = '".$mdl->getsqlName()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputName\")'>Name</a>: " . $mdl->getName() . "</p>";
			$val = true;
		}

		// Food_Price
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Food_Id` != '".$mdl->getsqlId()."' AND
			`Food_Price` = '".$mdl->getsqlPrice()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputPrice\")'>Price</a>: " . $mdl->getPrice() . "</p>";
			$val = true;
		}

		// Food_Description
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Food_Id` != '".$mdl->getsqlId()."' AND
			`Food_Description` = '".$mdl->getsqlDescription()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputDescription\")'>Description</a>: " . $mdl->getDescription() . "</p>";
			$val = true;
		}

		// Food_Featured
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Food_Id` != '".$mdl->getsqlId()."' AND
			`Food_Featured` = '".$mdl->getsqlFeatured()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputFeatured\")'>Featured</a>: " . $mdl->getFeatured() . "</p>";
			$val = true;
		}

		// Food_BestSeller
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Food_Id` != '".$mdl->getsqlId()."' AND
			`Food_BestSeller` = '".$mdl->getsqlBestSeller()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputBestSeller\")'>BestSeller</a>: " . $mdl->getBestSeller() . "</p>";
			$val = true;
		}

		// Food_Suggested
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Food_Id` != '".$mdl->getsqlId()."' AND
			`Food_Suggested` = '".$mdl->getsqlSuggested()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputSuggested\")'>Suggested</a>: " . $mdl->getSuggested() . "</p>";
			$val = true;
		}

		// Food_NotAvailable
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Food_Id` != '".$mdl->getsqlId()."' AND
			`Food_NotAvailable` = '".$mdl->getsqlNotAvailable()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputNotAvailable\")'>NotAvailable</a>: " . $mdl->getNotAvailable() . "</p>";
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
			$sql .= "WHERE `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetFoodCategory_IdById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `FoodCategory_Id` FROM `".$this->table."`
			WHERE `Food_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['FoodCategory_Id'];
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

		$sql = "SELECT `Food_Name` FROM `".$this->table."`
			WHERE `Food_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Food_Name'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetPriceById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Food_Price` FROM `".$this->table."`
			WHERE `Food_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Food_Price'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetDescriptionById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Food_Description` FROM `".$this->table."`
			WHERE `Food_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Food_Description'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetFeaturedById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Food_Featured` FROM `".$this->table."`
			WHERE `Food_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Food_Featured'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetBestSellerById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Food_BestSeller` FROM `".$this->table."`
			WHERE `Food_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Food_BestSeller'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetSuggestedById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Food_Suggested` FROM `".$this->table."`
			WHERE `Food_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Food_Suggested'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetNotAvailableById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Food_NotAvailable` FROM `".$this->table."`
			WHERE `Food_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Food_NotAvailable'];
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

		$sql = "SELECT `Food_Status` FROM `".$this->table."`
			WHERE `Food_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Food_Status'];
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
			WHERE `Food_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ModelTransfer($result);
	}

	public function GetByFoodCategory_Id($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `FoodCategory_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
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
			WHERE `Food_Name` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByPrice($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Food_Price` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByDescription($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Food_Description` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByFeatured($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Food_Featured` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByBestSeller($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Food_BestSeller` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetBySuggested($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Food_Suggested` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByNotAvailable($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Food_NotAvailable` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
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
			WHERE `Food_DateCreated` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
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
			WHERE `Food_Status` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Food_Status` = '".$status."'";
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

		$mdl = new FoodModel();
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
			$mdl = new FoodModel();
			$mdl = $this->ToModel($row);
			array_push($lst,$mdl);
		}
		return $lst;
	}

	public function ToModel($row){
		$mdl = new FoodModel();
		$mdl->setId((isset($row['Food_Id'])) ? $row['Food_Id'] : '');
		$mdl->setFoodCategory_Id((isset($row['FoodCategory_Id'])) ? $row['FoodCategory_Id'] : '');
		$mdl->setName((isset($row['Food_Name'])) ? $row['Food_Name'] : '');
		$mdl->setPrice((isset($row['Food_Price'])) ? $row['Food_Price'] : '');
		$mdl->setDescription((isset($row['Food_Description'])) ? $row['Food_Description'] : '');
		$mdl->setFeatured((isset($row['Food_Featured'])) ? $row['Food_Featured'] : '');
		$mdl->setBestSeller((isset($row['Food_BestSeller'])) ? $row['Food_BestSeller'] : '');
		$mdl->setSuggested((isset($row['Food_Suggested'])) ? $row['Food_Suggested'] : '');
		$mdl->setNotAvailable((isset($row['Food_NotAvailable'])) ? $row['Food_NotAvailable'] : '');
		$mdl->setDateCreated((isset($row['Food_DateCreated'])) ? $row['Food_DateCreated'] : '');
		$mdl->setStatus((isset($row['Food_Status'])) ? $row['Food_Status'] : '');
		return $mdl;
	}
}
