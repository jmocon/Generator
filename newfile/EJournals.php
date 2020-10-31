<?php
$clsEJournals = new EJournals();
class EJournals
{
	private $table = "ejournals";

	public function __construct()
	{
	}

	public function Add($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "INSERT INTO `" . $this->table . "`
			(
				`Name`,
				`Link`,
				`Description`
			) VALUES (
				'" . $db->Escape($mdl->Name) . "',
				'" . $db->Escape($mdl->Link) . "',
				'" . $db->Escape($mdl->Description) . "'
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
						`Name`='" . $db->Escape($mdl->Name) . "',
						`Link`='" . $db->Escape($mdl->Link) . "',
						`Description`='" . $db->Escape($mdl->Description) . "'
						WHERE `EJournals_Id`='" . $db->Escape($mdl->EJournals_Id) . "'";
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
							WHERE `EJournals_Id` = '" . $db->Escape($id) . "';";
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

	public function GetNameByEJournals_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Name` FROM `" . $this->table . "`
							WHERE `EJournals_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Name;
	}

	public function GetLinkByEJournals_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Link` FROM `" . $this->table . "`
							WHERE `EJournals_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Link;
	}

	public function GetDescriptionByEJournals_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Description` FROM `" . $this->table . "`
							WHERE `EJournals_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Description;
	}

	public function GetByEJournals_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `EJournals_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByName($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Name` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByLink($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Link` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByDescription($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Description` = '" . $db->Escape($value) . "'";
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

	public function IsExistEJournals_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `EJournals_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistName($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Name` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `EJournals_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistLink($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Link` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `EJournals_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistDescription($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Description` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `EJournals_Id` != '" . $db->Escape($id) . "'";
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
			$query .= " AND `EJournals_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

}
