<?php
$clsFee = new Fee();
class Fee
{
	private $table = "fee";

	public function __construct()
	{
	}

	public function Add($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "INSERT INTO `" . $this->table . "`
			(
				`Loan_Id`,
				`Amount`,
				`Status`
			) VALUES (
				'" . $db->Escape($mdl->Loan_Id) . "',
				'" . $db->Escape($mdl->Amount) . "',
				'" . $db->Escape($mdl->Status) . "'
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
						`Loan_Id`='" . $db->Escape($mdl->Loan_Id) . "',
						`Amount`='" . $db->Escape($mdl->Amount) . "',
						`Status`='" . $db->Escape($mdl->Status) . "'
						WHERE `Fee_Id`='" . $db->Escape($mdl->Fee_Id) . "'";
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
							WHERE `Fee_Id` = '" . $db->Escape($id) . "';";
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

	public function GetLoan_IdByFee_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Loan_Id` FROM `" . $this->table . "`
							WHERE `Fee_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Loan_Id;
	}

	public function GetAmountByFee_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Amount` FROM `" . $this->table . "`
							WHERE `Fee_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Amount;
	}

	public function GetStatusByFee_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Status` FROM `" . $this->table . "`
							WHERE `Fee_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Status;
	}

	public function GetByFee_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Fee_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByLoan_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Loan_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByAmount($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT * FROM `" . $this->table . "`
							WHERE `Amount` = '" . $db->Escape($value) . "'";
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

	public function IsExistFee_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Fee_Id` = '" . $db->Escape($value) . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistLoan_Id($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Loan_Id` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `Fee_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistAmount($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Amount` = '" . $db->Escape($value) . "'";
		if ($id != "") {
			$query .= " AND `Fee_Id` != '" . $db->Escape($id) . "'";
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
			$query .= " AND `Fee_Id` != '" . $db->Escape($id) . "'";
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
			$query .= " AND `Fee_Id` != '" . $db->Escape($id) . "'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

}
