<?php
$clsSaveSearch = new SaveSearch();
class SaveSearch
{
	private $table = "savesearch";

	public function __construct()
	{
	}

	public function Add($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "INSERT INTO `" . $this->table . "`
			(
				`User_Id`,
				`Keyword`,
				`Type`,
				`Query`
			) VALUES (
				'" . $db->Escape($mdl->User_Id) . "',
				'" . $db->Escape($mdl->Keyword) . "',
				'" . $db->Escape($mdl->Type) . "',
				'" . $db->Escape($mdl->Query) . "'
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
						`User_Id`='" . $db->Escape($mdl->User_Id) . "',
						`Keyword`='" . $db->Escape($mdl->Keyword) . "',
						`Type`='" . $db->Escape($mdl->Type) . "',
						`Query`='" . $db->Escape($mdl->Query) . "'
						WHERE `SaveSearch_Id`='" . $db->Escape($mdl->SaveSearch_Id) . "'";
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
							WHERE `SaveSearch_Id` = '" . $db->Escape($id) . "';";
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

	public function GetUser_IdBySaveSearch_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `User_Id` FROM `" . $this->table . "`
							WHERE `SaveSearch_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->User_Id;
	}

	public function GetKeywordBySaveSearch_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Keyword` FROM `" . $this->table . "`
							WHERE `SaveSearch_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Keyword;
	}

	public function GetTypeBySaveSearch_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Type` FROM `" . $this->table . "`
							WHERE `SaveSearch_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Type;
	}

	public function GetQueryBySaveSearch_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Query` FROM `" . $this->table . "`
							WHERE `SaveSearch_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Query;
	}

	public function GetBySaveSearch_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `SaveSearch_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
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

	public function GetByKeyword($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Keyword` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByType($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Type` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByQuery($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Query` = '" . $db->Escape($value) . "'";
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

	public function IsExistSaveSearch_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `SaveSearch_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistUser_Id($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `SaveSearch_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistKeyword($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Keyword` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `SaveSearch_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistType($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Type` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `SaveSearch_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistQuery($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Query` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `SaveSearch_Id` != '" . $db->Escape($id) . "'";
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
			$query .= " AND `SaveSearch_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

}
