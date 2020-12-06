<?php
$clsSubject = new Subject();
class Subject
{
	private $table = "subject";

	public function __construct()
	{
	}

	public function Add($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "INSERT INTO `{$this->table}`
			(
				`Name`,
				`LoanPeriod`,
				`Penalty`,
				`Overdue`
			) VALUES (
				'{$db->Escape($mdl->Name)}',
				'{$db->Escape($mdl->LoanPeriod)}',
				'{$db->Escape($mdl->Penalty)}',
				'{$db->Escape($mdl->Overdue)}'
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
		$query = "UPDATE `{$this->table}` SET
						`Name`='{$db->Escape($mdl->Name)}',
						`LoanPeriod`='{$db->Escape($mdl->LoanPeriod)}',
						`Penalty`='{$db->Escape($mdl->Penalty)}'
						`Overdue`='{$db->Escape($mdl->Overdue)}'
						WHERE `Subject_Id`='{$db->Escape($mdl->Subject_Id)}'";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function Delete($id)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "DELETE FROM `{$this->table}`
							WHERE `Subject_Id` = '{$db->Escape($id)}';";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function Get()
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`";
		$result = $mysqli->query($query);
		$mysqli->close();
		while ($obj = $result->fetch_object()) {
			$lst[] = $obj;
		}
		return $lst;
	}

	public function GetNameBySubject_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Name` FROM `{$this->table}`
							WHERE `Subject_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Name;
	}

	public function GetLoanPeriodBySubject_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `LoanPeriod` FROM `{$this->table}`
							WHERE `Subject_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->LoanPeriod;
	}

	public function GetPenaltyBySubject_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Penalty` FROM `{$this->table}`
							WHERE `Subject_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Penalty;
	}

	public function GetOverdueBySubject_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Overdue` FROM `{$this->table}`
							WHERE `Subject_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Overdue;
	}

	public function GetBySubject_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Subject_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByName($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Name` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByLoanPeriod($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `LoanPeriod` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByPenalty($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Penalty` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByOverdue($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Overdue` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function IsExistSubject_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Subject_Id` = '{$db->Escape($value)}'";
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
							FROM `{$this->table}`
							WHERE `Name` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Subject_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistLoanPeriod($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `LoanPeriod` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Subject_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistPenalty($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Penalty` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Subject_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistOverdue($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Overdue` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Subject_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

}
