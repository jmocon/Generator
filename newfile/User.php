<?php
require_once ("UserModel.php");
$clsUser = new User();
class User{

	private $table = "user";

	public function __construct(){}

	public function Add($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();
		$sql = "INSERT INTO `".$this->table."`
			(
				`User_FirstName`,
				`User_MiddleName`,
				`User_LastName`,
				`User_SuffixName`,
				`User_BirthDate`,
				`Gender_Id`,
				`Country_Id`,
				`Province_Id`,
				`City_Id`,
				`District_Id`,
				`User_ContactNumber`,
				`User_EmailAddress`,
				`User_Password`
			) VALUES (
				'".$mdl->getsqlFirstName()."',
				'".$mdl->getsqlMiddleName()."',
				'".$mdl->getsqlLastName()."',
				'".$mdl->getsqlSuffixName()."',
				'".$mdl->getsqlBirthDate()."',
				'".$mdl->getsqlGender_Id()."',
				'".$mdl->getsqlCountry_Id()."',
				'".$mdl->getsqlProvince_Id()."',
				'".$mdl->getsqlCity_Id()."',
				'".$mdl->getsqlDistrict_Id()."',
				'".$mdl->getsqlContactNumber()."',
				'".$mdl->getsqlEmailAddress()."',
				'".$mdl->getsqlPassword()."'
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
				 `User_FirstName`='".$mdl->getsqlFirstName()."',
				 `User_MiddleName`='".$mdl->getsqlMiddleName()."',
				 `User_LastName`='".$mdl->getsqlLastName()."',
				 `User_SuffixName`='".$mdl->getsqlSuffixName()."',
				 `User_BirthDate`='".$mdl->getsqlBirthDate()."',
				 `Gender_Id`='".$mdl->getsqlGender_Id()."',
				 `Country_Id`='".$mdl->getsqlCountry_Id()."',
				 `Province_Id`='".$mdl->getsqlProvince_Id()."',
				 `City_Id`='".$mdl->getsqlCity_Id()."',
				 `District_Id`='".$mdl->getsqlDistrict_Id()."',
				 `User_ContactNumber`='".$mdl->getsqlContactNumber()."',
				 `User_EmailAddress`='".$mdl->getsqlEmailAddress()."',
				 `User_Password`='".$mdl->getsqlPassword()."',
				 `User_Status`='".$mdl->getsqlStatus()."'
		 WHERE `User_Id`='".$mdl->getsqlId()."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		 mysqli_close($conn);
	}

	public function UpdateFirstName($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`User_FirstName`='".$value."'
			WHERE `User_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateMiddleName($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`User_MiddleName`='".$value."'
			WHERE `User_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateLastName($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`User_LastName`='".$value."'
			WHERE `User_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateSuffixName($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`User_SuffixName`='".$value."'
			WHERE `User_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateBirthDate($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`User_BirthDate`='".$value."'
			WHERE `User_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateGender_Id($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`Gender_Id`='".$value."'
			WHERE `User_Id` = '".$id."'";

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
			WHERE `User_Id` = '".$id."'";

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
			WHERE `User_Id` = '".$id."'";

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
			WHERE `User_Id` = '".$id."'";

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
			WHERE `User_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateContactNumber($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`User_ContactNumber`='".$value."'
			WHERE `User_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateEmailAddress($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`User_EmailAddress`='".$value."'
			WHERE `User_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdatePassword($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`User_Password`='".$value."'
			WHERE `User_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function UpdateStatus($id,$value){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$id = mysqli_real_escape_string($conn,$id);

		$sql="UPDATE `".$this->table."` SET
			`User_Status`='".$value."'
			WHERE `User_Id` = '".$id."'";

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);
	}

	public function Delete($id){

		$Database = new Database();
		$conn = $Database->GetConn();
		$id = mysqli_real_escape_string($conn,$id);
		$sql="DELETE FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

			mysqli_close($conn);

	}

	public function IsExist($mdl){

		$Database = new Database();
		$conn = $Database->GetConn();

		$val = false;
		$msg = "";

		// User_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
			`User_Id` = '".$mdl->getsqlId()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputId\")'>Id</a>: " . $mdl->getId() . "</p>";
			$val = true;
		}

		// User_FirstName
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
			`User_FirstName` = '".$mdl->getsqlFirstName()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputFirstName\")'>FirstName</a>: " . $mdl->getFirstName() . "</p>";
			$val = true;
		}

		// User_MiddleName
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
			`User_MiddleName` = '".$mdl->getsqlMiddleName()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputMiddleName\")'>MiddleName</a>: " . $mdl->getMiddleName() . "</p>";
			$val = true;
		}

		// User_LastName
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
			`User_LastName` = '".$mdl->getsqlLastName()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputLastName\")'>LastName</a>: " . $mdl->getLastName() . "</p>";
			$val = true;
		}

		// User_SuffixName
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
			`User_SuffixName` = '".$mdl->getsqlSuffixName()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputSuffixName\")'>SuffixName</a>: " . $mdl->getSuffixName() . "</p>";
			$val = true;
		}

		// User_BirthDate
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
			`User_BirthDate` = '".$mdl->getsqlBirthDate()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputBirthDate\")'>BirthDate</a>: " . $mdl->getBirthDate() . "</p>";
			$val = true;
		}

		// Gender_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
			`Gender_Id` = '".$mdl->getsqlGender_Id()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputGender_Id\")'>Gender_Id</a>: " . $mdl->getGender_Id() . "</p>";
			$val = true;
		}

		// Country_Id
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
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
			`User_Id` != '".$mdl->getsqlId()."' AND
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
			`User_Id` != '".$mdl->getsqlId()."' AND
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
			`User_Id` != '".$mdl->getsqlId()."' AND
			`District_Id` = '".$mdl->getsqlDistrict_Id()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputDistrict_Id\")'>District_Id</a>: " . $mdl->getDistrict_Id() . "</p>";
			$val = true;
		}

		// User_ContactNumber
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
			`User_ContactNumber` = '".$mdl->getsqlContactNumber()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputContactNumber\")'>ContactNumber</a>: " . $mdl->getContactNumber() . "</p>";
			$val = true;
		}

		// User_EmailAddress
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
			`User_EmailAddress` = '".$mdl->getsqlEmailAddress()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputEmailAddress\")'>EmailAddress</a>: " . $mdl->getEmailAddress() . "</p>";
			$val = true;
		}

		// User_Password
		$sql = "SELECT COUNT(*) FROM `".$this->table."`
			WHERE
			`User_Id` != '".$mdl->getsqlId()."' AND
			`User_Password` = '".$mdl->getsqlPassword()."'
		";
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$rows = mysqli_fetch_row($result);
		if($rows[0] > 0)
		{
			$msg .= "<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\"inputPassword\")'>Password</a>: " . $mdl->getPassword() . "</p>";
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
			$sql .= "WHERE `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetFirstNameById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `User_FirstName` FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['User_FirstName'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetMiddleNameById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `User_MiddleName` FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['User_MiddleName'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetLastNameById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `User_LastName` FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['User_LastName'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetSuffixNameById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `User_SuffixName` FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['User_SuffixName'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetBirthDateById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `User_BirthDate` FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['User_BirthDate'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetGender_IdById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `Gender_Id` FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['Gender_Id'];
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
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
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
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
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
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
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
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['District_Id'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetContactNumberById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `User_ContactNumber` FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['User_ContactNumber'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetEmailAddressById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `User_EmailAddress` FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['User_EmailAddress'];
		}

		mysqli_close($conn);

		return $value;
	}

	public function GetPasswordById($id,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = "";
		$id = mysqli_real_escape_string($conn,$id);
		$status = mysqli_real_escape_string($conn,$status);

		$sql = "SELECT `User_Password` FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['User_Password'];
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

		$sql = "SELECT `User_Status` FROM `".$this->table."`
			WHERE `User_Id` = '".$id."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($result))
		{
			$value = $row['User_Status'];
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
			WHERE `User_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ModelTransfer($result);
	}

	public function GetByFirstName($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `User_FirstName` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByMiddleName($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `User_MiddleName` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByLastName($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `User_LastName` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetBySuffixName($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `User_SuffixName` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByBirthDate($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `User_BirthDate` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByGender_Id($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `Gender_Id` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
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
			$sql .= "AND `User_Status` = '".$status."'";
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
			$sql .= "AND `User_Status` = '".$status."'";
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
			$sql .= "AND `User_Status` = '".$status."'";
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
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByContactNumber($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `User_ContactNumber` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByEmailAddress($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `User_EmailAddress` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
		}

		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		mysqli_close($conn);

		return $this->ListTransfer($result);
	}

	public function GetByPassword($value,$status=""){

		$Database = new Database();
		$conn = $Database->GetConn();

		$value = mysqli_real_escape_string($conn,$value);
		$status = mysqli_real_escape_string($conn,$status);

		$sql="SELECT * FROM `".$this->table."`
			WHERE `User_Password` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
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
			WHERE `User_DateCreated` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
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
			WHERE `User_Status` = '".$value."'";
		if ($status !== "") {
			$sql .= "AND `User_Status` = '".$status."'";
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

		$mdl = new UserModel();
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
			$mdl = new UserModel();
			$mdl = $this->ToModel($row);
			array_push($lst,$mdl);
		}
		return $lst;
	}

	public function ToModel($row){
		$mdl = new UserModel();
		$mdl->setId((isset($row['User_Id'])) ? $row['User_Id'] : '');
		$mdl->setFirstName((isset($row['User_FirstName'])) ? $row['User_FirstName'] : '');
		$mdl->setMiddleName((isset($row['User_MiddleName'])) ? $row['User_MiddleName'] : '');
		$mdl->setLastName((isset($row['User_LastName'])) ? $row['User_LastName'] : '');
		$mdl->setSuffixName((isset($row['User_SuffixName'])) ? $row['User_SuffixName'] : '');
		$mdl->setBirthDate((isset($row['User_BirthDate'])) ? $row['User_BirthDate'] : '');
		$mdl->setGender_Id((isset($row['Gender_Id'])) ? $row['Gender_Id'] : '');
		$mdl->setCountry_Id((isset($row['Country_Id'])) ? $row['Country_Id'] : '');
		$mdl->setProvince_Id((isset($row['Province_Id'])) ? $row['Province_Id'] : '');
		$mdl->setCity_Id((isset($row['City_Id'])) ? $row['City_Id'] : '');
		$mdl->setDistrict_Id((isset($row['District_Id'])) ? $row['District_Id'] : '');
		$mdl->setContactNumber((isset($row['User_ContactNumber'])) ? $row['User_ContactNumber'] : '');
		$mdl->setEmailAddress((isset($row['User_EmailAddress'])) ? $row['User_EmailAddress'] : '');
		$mdl->setPassword((isset($row['User_Password'])) ? $row['User_Password'] : '');
		$mdl->setDateCreated((isset($row['User_DateCreated'])) ? $row['User_DateCreated'] : '');
		$mdl->setStatus((isset($row['User_Status'])) ? $row['User_Status'] : '');
		return $mdl;
	}
}
