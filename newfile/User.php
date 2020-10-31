<?php
$clsUser = new User();
class User
{
	private $table = "user";

	public function __construct()
	{
	}

	public function Add($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "INSERT INTO `" . $this->table . "`
			(
				`IDNumber`,
				`Password`,
				`FirstName`,
				`MiddleName`,
				`LastName`,
				`SuffixName`,
				`HomeAddress`,
				`ContactNumber`,
				`EmailAddress`,
				`CardExpiration`,
				`Status`,
				`UserType`
			) VALUES (
				'" . $db->Escape($mdl->IDNumber) . "',
				'" . $db->Escape($mdl->Password) . "',
				'" . $db->Escape($mdl->FirstName) . "',
				'" . $db->Escape($mdl->MiddleName) . "',
				'" . $db->Escape($mdl->LastName) . "',
				'" . $db->Escape($mdl->SuffixName) . "',
				'" . $db->Escape($mdl->HomeAddress) . "',
				'" . $db->Escape($mdl->ContactNumber) . "',
				'" . $db->Escape($mdl->EmailAddress) . "',
				'" . $db->Escape($mdl->CardExpiration) . "',
				'" . $db->Escape($mdl->Status) . "',
				'" . $db->Escape($mdl->UserType) . "'
			)";
		$mysqli->query($query);
		$id = $mysqli->insert_id;
		$mysqli->close();
		return $id;
	}

	public function Update($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "UPDATE `" . $this->table . "` SET
						`IDNumber`='" . $db->Escape($mdl->IDNumber) . "',
						`Password`='" . $db->Escape($mdl->Password) . "',
						`FirstName`='" . $db->Escape($mdl->FirstName) . "',
						`MiddleName`='" . $db->Escape($mdl->MiddleName) . "',
						`LastName`='" . $db->Escape($mdl->LastName) . "',
						`SuffixName`='" . $db->Escape($mdl->SuffixName) . "',
						`HomeAddress`='" . $db->Escape($mdl->HomeAddress) . "',
						`ContactNumber`='" . $db->Escape($mdl->ContactNumber) . "',
						`EmailAddress`='" . $db->Escape($mdl->EmailAddress) . "',
						`CardExpiration`='" . $db->Escape($mdl->CardExpiration) . "',
						`Status`='" . $db->Escape($mdl->Status) . "',
						`UserType`='" . $db->Escape($mdl->UserType) . "'
						WHERE `User_Id`='" . $db->Escape($mdl->User_Id) . "'";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function Delete($id)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "DELETE FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($id) . "';";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function Get()
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`";
		$result = $mysqli->query($query);
		$mysqli->close();
		while ($obj = $result->fetch_object()) {
			$lst[] = $obj;
		}
		return $lst;
	}

	public function GetIDNumberByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `IDNumber` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->IDNumber;
	}

	public function GetPasswordByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Password` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Password;
	}

	public function GetFirstNameByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `FirstName` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->FirstName;
	}

	public function GetMiddleNameByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `MiddleName` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->MiddleName;
	}

	public function GetLastNameByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `LastName` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->LastName;
	}

	public function GetSuffixNameByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `SuffixName` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->SuffixName;
	}

	public function GetHomeAddressByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `HomeAddress` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->HomeAddress;
	}

	public function GetContactNumberByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `ContactNumber` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->ContactNumber;
	}

	public function GetEmailAddressByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `EmailAddress` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->EmailAddress;
	}

	public function GetCardExpirationByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `CardExpiration` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->CardExpiration;
	}

	public function GetStatusByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Status` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Status;
	}

	public function GetUserTypeByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `UserType` FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->UserType;
	}

	public function GetByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByIDNumber($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `IDNumber` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByPassword($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Password` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByFirstName($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `FirstName` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByMiddleName($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `MiddleName` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByLastName($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `LastName` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetBySuffixName($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `SuffixName` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByHomeAddress($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `HomeAddress` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByContactNumber($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `ContactNumber` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByEmailAddress($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `EmailAddress` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByCardExpiration($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `CardExpiration` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByStatus($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Status` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByUserType($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `UserType` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByX_DateCreated($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `X_DateCreated` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function IsExistUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistIDNumber($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `IDNumber` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistPassword($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Password` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistFirstName($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `FirstName` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistMiddleName($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `MiddleName` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistLastName($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `LastName` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistSuffixName($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `SuffixName` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistHomeAddress($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `HomeAddress` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistContactNumber($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `ContactNumber` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistEmailAddress($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `EmailAddress` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistCardExpiration($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `CardExpiration` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistStatus($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Status` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistUserType($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `UserType` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistX_DateCreated($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `X_DateCreated` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `User_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

}
