<?php
$clsInventory = new Inventory();
class Inventory
{
	private $table = "inventory";

	public function __construct()
	{
	}

	public function Add($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "INSERT INTO `" . $this->table . "`
			(
				`Branch_Id`,
				`Book_Id`,
				`DateAcquired`
			) VALUES (
				'" . $db->Escape($mdl->Branch_Id) . "',
				'" . $db->Escape($mdl->Book_Id) . "',
				'" . $db->Escape($mdl->DateAcquired) . "'
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
						`Branch_Id`='" . $db->Escape($mdl->Branch_Id) . "',
						`Book_Id`='" . $db->Escape($mdl->Book_Id) . "',
						`DateAcquired`='" . $db->Escape($mdl->DateAcquired) . "'
						WHERE `Inventory_Id`='" . $db->Escape($mdl->Inventory_Id) . "'";
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
							WHERE `Inventory_Id` = '" . $db->Escape($id) . "';";
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

	public function GetBranch_IdByInventory_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Branch_Id` FROM `" . $this->table . "`
							WHERE `Inventory_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Branch_Id;
	}

	public function GetBook_IdByInventory_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Book_Id` FROM `" . $this->table . "`
							WHERE `Inventory_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Book_Id;
	}

	public function GetDateAcquiredByInventory_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `DateAcquired` FROM `" . $this->table . "`
							WHERE `Inventory_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->DateAcquired;
	}

	public function GetByInventory_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Inventory_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByBranch_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Branch_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByBook_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Book_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByDateAcquired($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `DateAcquired` = '" . $db->Escape($value) . "'";
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

	public function IsExistInventory_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Inventory_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistBranch_Id($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Branch_Id` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `Inventory_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistBook_Id($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Book_Id` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `Inventory_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistDateAcquired($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `DateAcquired` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `Inventory_Id` != '" . $db->Escape($id) . "'";
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
			$query .= " AND `Inventory_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

}
