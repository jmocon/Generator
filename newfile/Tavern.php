<?php
require_once ("TavernModel.php");
$clsTavern = new Tavern();
class Tavern{

	private $table = "tavern";

	public function __construct(){}

	public function Add($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();
		$sql = "INSERT INTO `".$this->table."`
			(
				`Tavern_Name`,
				`Tavern_Description`,
				`Country_Id`,
				`Province_Id`,
				`City_Id`,
				`District_Id`,
				`Tavern_GoogleMap`
			) VALUES (
				'".$mdl->getsqlName()."',
				'".$mdl->getsqlDescription()."',
				'".$mdl->getsqlCountry_Id()."',
				'".$mdl->getsqlProvince_Id()."',
				'".$mdl->getsqlCity_Id()."',
				'".$mdl->getsqlDistrict_Id()."',
				'".$mdl->getsqlGoogleMap()."'
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
				 `Tavern_Name`='".$mdl->getsqlName()."',
				 `Tavern_Description`='".$mdl->getsqlDescription()."',
				 `Country_Id`='".$mdl->getsqlCountry_Id()."',
				 `Province_Id`='".$mdl->getsqlProvince_Id()."',
				 `City_Id`='".$mdl->getsqlCity_Id()."',
				 `District_Id`='".$mdl->getsqlDistrict_Id()."',
				 `Tavern_GoogleMap`='".$mdl->getsqlGoogleMap()."',
				 `Tavern_Status`='".$mdl->getsqlStatus()."'
		 WHERE `Tavern_Id`='".$mdl->getsqlId()."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		 mysqli_close($conn);
	}

	public function UpdateName($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Tavern_Name`='".$value."'
			WHERE `Tavern_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateDescription($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Tavern_Description`='".$value."'
			WHERE `Tavern_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateCountry_Id($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Country_Id`='".$value."'
			WHERE `Tavern_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateProvince_Id($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Province_Id`='".$value."'
			WHERE `Tavern_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateCity_Id($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`City_Id`='".$value."'
			WHERE `Tavern_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateDistrict_Id($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`District_Id`='".$value."'
			WHERE `Tavern_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateGoogleMap($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Tavern_GoogleMap`='".$value."'
			WHERE `Tavern_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateStatus($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Tavern_Status`='".$value."'
			WHERE `Tavern_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function Delete($id){

		$Database = new Database();
		$conn = $Database->GetConn();
		$id = mysqli_real_escape_string($conn,$id);
		$sql="DELETE FROM `".$this->table."`
			WHERE `Tavern_Id` = '".$id."'";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

			mysqli_close($conn);

	}

	public function IsExist($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();

		$val = false;
		$msg = "";

		// Tavern_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Tavern_Id` != '".$mdl->getsqlId()."' AND
			`Tavern_Id` = '".$mdl->getsqlId()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputId\")'>Id</a>: " . $mdl->getId() . "</p>";
			$val = true;
		}

		// Tavern_Name
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Tavern_Id` != '".$mdl->getsqlId()."' AND
			`Tavern_Name` = '".$mdl->getsqlName()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputName\")'>Name</a>: " . $mdl->getName() . "</p>";
			$val = true;
		}

		// Tavern_Description
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Tavern_Id` != '".$mdl->getsqlId()."' AND
			`Tavern_Description` = '".$mdl->getsqlDescription()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputDescription\")'>Description</a>: " . $mdl->getDescription() . "</p>";
			$val = true;
		}

		// Country_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Tavern_Id` != '".$mdl->getsqlId()."' AND
			`Country_Id` = '".$mdl->getsqlCountry_Id()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputCountry_Id\")'>Country_Id</a>: " . $mdl->getCountry_Id() . "</p>";
			$val = true;
		}

		// Province_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Tavern_Id` != '".$mdl->getsqlId()."' AND
			`Province_Id` = '".$mdl->getsqlProvince_Id()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputProvince_Id\")'>Province_Id</a>: " . $mdl->getProvince_Id() . "</p>";
			$val = true;
		}

		// City_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Tavern_Id` != '".$mdl->getsqlId()."' AND
			`City_Id` = '".$mdl->getsqlCity_Id()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputCity_Id\")'>City_Id</a>: " . $mdl->getCity_Id() . "</p>";
			$val = true;
		}

		// District_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Tavern_Id` != '".$mdl->getsqlId()."' AND
			`District_Id` = '".$mdl->getsqlDistrict_Id()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputDistrict_Id\")'>District_Id</a>: " . $mdl->getDistrict_Id() . "</p>";
			$val = true;
		}

		// Tavern_GoogleMap
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`Tavern_Id` != '".$mdl->getsqlId()."' AND
			`Tavern_GoogleMap` = '".$mdl->getsqlGoogleMap()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputGoogleMap\")'>GoogleMap</a>: " . $mdl->getGoogleMap() . "</p>";
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
			$sql .= "WHERE `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetNameById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Tavern_Name` FROM `".$this->table."`
			WHERE `Tavern_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Tavern_Name'];
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

		$sql = "SELECT `Tavern_Description` FROM `".$this->table."`
			WHERE `Tavern_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Tavern_Description'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetCountry_IdById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Country_Id` FROM `".$this->table."`
			WHERE `Tavern_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Country_Id'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetProvince_IdById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Province_Id` FROM `".$this->table."`
			WHERE `Tavern_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Province_Id'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetCity_IdById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `City_Id` FROM `".$this->table."`
			WHERE `Tavern_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['City_Id'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetDistrict_IdById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `District_Id` FROM `".$this->table."`
			WHERE `Tavern_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['District_Id'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetGoogleMapById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Tavern_GoogleMap` FROM `".$this->table."`
			WHERE `Tavern_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Tavern_GoogleMap'];
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

		$sql = "SELECT `Tavern_Status` FROM `".$this->table."`
			WHERE `Tavern_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Tavern_Status'];
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
			WHERE `Tavern_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ModelTransfer($result);
	}

	public function GetByName($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Tavern_Name` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
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
			WHERE `Tavern_Description` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByCountry_Id($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Country_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByProvince_Id($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Province_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByCity_Id($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `City_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByDistrict_Id($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `District_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByGoogleMap($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Tavern_GoogleMap` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
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
			WHERE `Tavern_DateCreated` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
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
			WHERE `Tavern_Status` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `Tavern_Status` = '".$status."'";
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

		$mdl = new TavernModel();
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
			$mdl = new TavernModel();
			$mdl = $this->ToModel($row);
			array_push($lst,$mdl);
		}
		return $lst;
	}

	public function ToModel($row){
		$mdl = new TavernModel();
		$mdl->setId((isset($row['Tavern_Id'])) ? $row['Tavern_Id'] : '');
		$mdl->setName((isset($row['Tavern_Name'])) ? $row['Tavern_Name'] : '');
		$mdl->setDescription((isset($row['Tavern_Description'])) ? $row['Tavern_Description'] : '');
		$mdl->setCountry_Id((isset($row['Country_Id'])) ? $row['Country_Id'] : '');
		$mdl->setProvince_Id((isset($row['Province_Id'])) ? $row['Province_Id'] : '');
		$mdl->setCity_Id((isset($row['City_Id'])) ? $row['City_Id'] : '');
		$mdl->setDistrict_Id((isset($row['District_Id'])) ? $row['District_Id'] : '');
		$mdl->setGoogleMap((isset($row['Tavern_GoogleMap'])) ? $row['Tavern_GoogleMap'] : '');
		$mdl->setDateCreated((isset($row['Tavern_DateCreated'])) ? $row['Tavern_DateCreated'] : '');
		$mdl->setStatus((isset($row['Tavern_Status'])) ? $row['Tavern_Status'] : '');
		return $mdl;
	}
}
